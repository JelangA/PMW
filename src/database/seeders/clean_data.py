import os
import re

# Cetak direktori kerja saat ini
print("Current Working Directory:", os.getcwd())

# Path ke file SQL
file_path = 'src/database/seeders/students-copy.sql'

# Cek apakah file ada
if not os.path.exists(file_path):
    print(f"File '{file_path}' tidak ditemukan di direktori kerja saat ini.")
    exit(1)

# Baca file SQL
with open(file_path, 'r') as file:
    lines = file.readlines()

# Proses setiap baris
new_lines = []
for line in lines:
    if line.startswith("INSERT INTO students"):
        # Hapus kolom username dan password serta nilai-nilainya
        line = re.sub(r",\s*username,\s*password", "", line)
        line = re.sub(r",\s*'[^']*',\s*'[^']*'", "", line, count=2)
    new_lines.append(line)

# Tulis kembali ke file baru
output_file_path = 'students_updated.sql'
with open(output_file_path, 'w') as file:
    file.writelines(new_lines)

print(f"File telah diproses dan disimpan sebagai '{output_file_path}'.")