<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                color: #000 !important;
            }

            table {
                border-collapse:separate;
                border-spacing: 0 1em;
            }

            tr {
                margin-bottom: 20px;
                padding-bottom: 20px;
            }

            p {
                margin-top: 0px;
                margin-bottom: 7px;
                color: #000000;
                font-size: 14.2px;
            }

            .title {
                padding-right: 40px;
                color: #000000;
                font-size: 14.2px;
                font-weight: 700;
            }

            .value {
                width: 300px;
                border: 1px solid rgba(0, 0, 0, 0.2);
                padding: 10px 11px;
                color: #000000;
                font-size: 14.2px;
            }
        </style>
    </head>
    <body>
        <p>Akun ini digunakan untuk dosen pendamping melakukan validasi terhadap tim yang didampinginya.</p>
        <p>Informasi Login: <a href="http://pkm.kemahasiswaan.polban.ac.id/">http://pmw.kemahasiswaan.polban.ac.id/</a></p>
        <table>
            <tr>
                <td class="title">Nama Bisnis</td>
                <td class="value">{{ $details['nama_bisnis'] }}</td>
            </tr>
            <tr>
                <td class="title">Nama Ketua</td>
                <td class="value">{{ $details['ketua'] }}</td>
            </tr>
            <tr>
                <td class="title">NIP</td>
                <td class="value">{{ $details['nip'] }}</td>
            </tr>
            <tr>
                <td class="title">NIDN</td>
                <td class="value">{{ $details['nidn'] }}</td>
            </tr>
            <tr>
                <td class="title">Program Studi</td>
                <td class="value">{{ $details['prodi'] }}</td>
            </tr>
            <tr>
                <td class="title">Email</td>
                <td class="value">{{ $details['email'] }}</td>
            </tr>
            <tr>
                <td class="title">Password</td>
                <td class="value">{{ $details['password'] }}</td>
            </tr>
        </table>
        <p>
            --
        </p>
        <p>
            --
        </p>
        <p style="color: #741B47;">
            <i>Best Regards,</i>
        </p>
        <p style="color: #741B47;">
            <b>Pengadministrasi Kemahasiswaan</b>
        </p>
        <p style="color: #741B47;">
            <b>Program Mahasiswa Wirausaha</b>
        </p>
        <p style="color: #741B47;">
            Politeknik Negeri Bandung
        </p>
        <p>
            <a href="mailto:kemahasiswaan@polban.ac.id">kemahasiswaan@polban.ac.id</a> / <a href="mailto:pmw@polban.ac.id ">pmw@polban.ac.id</a>
        </p>
        <p style="color: #741B47;">
            Bandung
        </p>
    </body>
</html>
