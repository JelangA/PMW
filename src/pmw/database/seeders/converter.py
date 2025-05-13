#!/usr/bin/env python3
import csv
from datetime import datetime

input_csv = 'Data_dosen.csv'
output_sql = 'output.sql'

seen_nip = set()
rows = []

with open(input_csv, newline='', encoding='utf-8') as csvfile:
    reader = csv.DictReader(csvfile)
    for idx, row in enumerate(reader, start=1):
        nip = row['NIP'].strip()
        if not nip:
            print(f"[Baris {idx}] Dilewati: NIP kosong")
            continue
        if nip in seen_nip:
            print(f"[Baris {idx}] Dilewati: NIP duplikat ({nip})")
            continue

        seen_nip.add(nip)

        # ✅ Ganti format tanggal ke '%Y-%m-%d'
        try:
            join_date = datetime.strptime(row['TGL'].strip(), "%Y-%m-%d").date()
        except ValueError:
            print(f"[Baris {idx}] Dilewati: Format tanggal salah ({row['TGL']})")
            continue

        rows.append({
            'nip': nip.replace("'", "\\'"),
            'nidn': row['NIDN'].strip().replace("'", "\\'"),
            'name': row['NAMA'].strip().replace("'", "\\'"),
            'degree': row['GELAR'].strip().replace("'", "\\'"),
            'academic_position': row['JAPUNG'].strip().replace("'", "\\'"),
            'education': row['PENDIDIKAN'].strip().replace("'", "\\'"),
            'homebase': row['HOMEBASE'].strip().replace("'", "\\'"),
            'join_date': join_date.isoformat()
        })

# Tulis file SQL
with open(output_sql, 'w', encoding='utf-8') as f:
    for r in rows:
        f.write(
            f"INSERT INTO lectures (nip, nidn, name, degree, academic_position, education, homebase, join_date, user_id, created_at, updated_at) "
            f"VALUES ('{r['nip']}', '{r['nidn']}', '{r['name']}', '{r['degree']}', '{r['academic_position']}', "
            f"'{r['education']}', '{r['homebase']}', '{r['join_date']}', NULL, NOW(), NOW());\n"
        )

print(f"Selesai! {len(rows)} baris valid ditulis ke: {output_sql}")

