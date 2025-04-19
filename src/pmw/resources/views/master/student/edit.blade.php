@extends('layouts.master')

@foreach($Data as $SR)
    @section('section-head')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
                <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
                <li class="breadcrumb-item active"><a style="color: black;" href="{{ route('student.index') }}">Mahasiswa</a></li>
                <li class="breadcrumb-item active"><a href="#">{{ old('name') ?? $SR->name }}</a></li>
                <li class="breadcrumb-item active"><a href="#">Edit Data</a></li>
            </ol>
        </nav>
    @endsection

    @section('section-body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Edit Data Mahasiswa</p>
                    </div>
                    <form action="{{ route('student.update', $SR->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('NIM') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" value="{{ old('nim') ?? $SR->nim }}" id="nim" name="nim" class="form-control" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Nama Lengkap') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ old('name') ?? $SR->name }}" id="name" name="name" class="form-control" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Jurusan') }}</label>
                                <div class="col-sm-9">
                                    <select id="major" name="major" class="form-control select2">
                                        <option value="Teknik Sipil" {{ $SR->major == 'Teknik Sipil' ? 'selected' : '' }}>{{ __('Teknik Sipil') }}</option>
                                        <option value="Teknik Kimia" {{ $SR->major == 'Teknik Kimia' ? 'selected' : '' }}>{{ __('Teknik Kimia') }}</option>
                                        <option value="Teknik Mesin" {{ $SR->major == 'Teknik Mesin' ? 'selected' : '' }}>{{ __('Teknik Mesin') }}</option>
                                        <option value="Teknik Refrigerasi dan Tata Udara" {{ $SR->major == 'Teknik Refrigerasi dan Tata Udara' ? 'selected' : '' }}>{{ __('Teknik Refrigerasi dan Tata Udara') }}</option>
                                        <option value="Teknik Komputer dan Informatika" {{ $SR->major == 'Teknik Komputer dan Informatika' ? 'selected' : '' }}>{{ __('Teknik Komputer dan Informatika') }}</option>
                                        <option value="Teknik Elektro" {{ $SR->major == 'Teknik Elektro' ? 'selected' : '' }}>{{ __('Teknik Elektro') }}</option>
                                        <option value="Teknik Konversi Energi" {{ $SR->major == 'Teknik Konversi Energi' ? 'selected' : '' }}>{{ __('Teknik Konversi Energi') }}</option>
                                        <option value="Akuntansi" {{ $SR->major == 'Akuntansi' ? 'selected' : '' }}>{{ __('Akuntansi') }}</option>
                                        <option value="Administrasi Niaga" {{ $SR->major == 'Administrasi Niaga' ? 'selected' : '' }}>{{ __('Administrasi Niaga') }}</option>
                                        <option value="Bahasa Inggris" {{ $SR->major == 'Bahasa Inggris' ? 'selected' : '' }}>{{ __('Bahasa Inggris') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Program Studi') }}</label>
                                <div class="col-sm-9">
                                    <select id="study_program" name="study_program" class="form-control select2">
                                        <option value="D3 - Teknik Kontruksi Gedung" {{ $SR->study_program == 'D3 - Teknik Kontruksi Gedung' ? 'selected' : '' }}>{{ __('D3 - Teknik Kontruksi Gedung') }}</option>
                                        <option value="D3 - Teknik Kontruksi Sipil" {{ $SR->study_program == 'D3 - Teknik Kontruksi Sipil' ? 'selected' : '' }}>{{ __('D3 - Teknik Kontruksi Sipil') }}</option>
                                        <option value="D4 - Teknik Perancangan Jalan dan Jembatan" {{ $SR->study_program == 'D4 - Teknik Perancangan Jalan dan Jembatan' ? 'selected' : '' }}>{{ __('D4 - Teknik Perancangan Jalan dan Jembatan') }}</option>
                                        <option value="D4 - Teknik Perawatan dan Perbaikan Gedung" {{ $SR->study_program == 'D4 - Teknik Perawatan dan Perbaikan Gedung' ? 'selected' : '' }}>{{ __('D4 - Teknik Perawatan dan Perbaikan Gedung') }}</option>
                                        <option value="D3 - Teknik Kimia" {{ $SR->study_program == 'D3 - Teknik Kimia' ? 'selected' : '' }}>{{ __('D3 - Teknik Kimia') }}</option>
                                        <option value="D3 - Analis Kimia" {{ $SR->study_program == 'D3 - Analis Kimia' ? 'selected' : '' }}>{{ __('D3 - Analis Kimia') }}</option>
                                        <option value="D4 - Teknik Kimia Produksi Bersih" {{ $SR->study_program == 'D4 - Teknik Kimia Produksi Bersih' ? 'selected' : '' }}>{{ __('D4 - Teknik Kimia Produksi Bersih') }}</option>
                                        <option value="D3 - Teknik Mesin" {{ $SR->study_program == 'D3 - Teknik Mesin' ? 'selected' : '' }}>{{ __('D3 - Teknik Mesin') }}</option>
                                        <option value="D3 - Teknik Aeronautika" {{ $SR->study_program == 'D3 - Teknik Aeronautika' ? 'selected' : '' }}>{{ __('D3 - Teknik Aeronautika') }}</option>
                                        <option value="D4 - Teknik Perancangan dan Kontruksi Mesin" {{ $SR->study_program == 'D4 - Teknik Perancangan dan Kontruksi Mesin' ? 'selected' : '' }}>{{ __('D4 - Teknik Perancangan dan Kontruksi Mesin') }}</option>
                                        <option value="D4 - Proses Manufaktur" {{ $SR->study_program == 'D4 - Proses Manufaktur' ? 'selected' : '' }}>{{ __('D4 - Proses Manufaktur') }}</option>
                                        <option value="D3 - Teknik Pendinginan dan Tata Udara" {{ $SR->study_program == 'D3 - Teknik Pendinginan dan Tata Udara' ? 'selected' : '' }}>{{ __('D3 - Teknik Pendinginan dan Tata Udara') }}</option>
                                        <option value="D4 - Teknik Pendinginan dan Tata Udara" {{ $SR->study_program == 'D4 - Teknik Pendinginan dan Tata Udara' ? 'selected' : '' }}>{{ __('D4 - Teknik Pendinginan dan Tata Udara') }}</option>
                                        <option value="D3 - Teknik Informatika" {{ $SR->study_program == 'D3 - Teknik Informatika' ? 'selected' : '' }}>{{ __('D3 - Teknik Informatika') }}</option>
                                        <option value="D4 - Teknik Informatika" {{ $SR->study_program == 'D4 - Teknik Informatika' ? 'selected' : '' }}>{{ __('D4 - Teknik Informatika') }}</option>
                                        <option value="D3 - Teknik Elektronika" {{ $SR->study_program == 'D3 - Teknik Elektronika' ? 'selected' : '' }}>{{ __('D3 - Teknik Elektronika') }}</option>
                                        <option value="D3 - Teknik Listrik" {{ $SR->study_program == 'D3 - Teknik Listrik' ? 'selected' : '' }}>{{ __('D3 - Teknik Listrik') }}</option>
                                        <option value="D3 - Teknik Telekomunikasi" {{ $SR->study_program == 'D3 - Teknik Telekomunikasi' ? 'selected' : '' }}>{{ __('D3 - Teknik Telekomunikasi') }}</option>
                                        <option value="D4 - Teknik Elektronika" {{ $SR->study_program == 'D4 - Teknik Elektronika' ? 'selected' : '' }}>{{ __('D4 - Teknik Elektronika') }}</option>
                                        <option value="D4 - Teknik Telekomunikasi" {{ $SR->study_program == 'D4 - Teknik Telekomunikasi' ? 'selected' : '' }}>{{ __('D4 - Teknik Telekomunikasi') }}</option>
                                        <option value="D4 - Teknik Otomasi Industri" {{ $SR->study_program == 'D4 - Teknik Otomasi Industri' ? 'selected' : '' }}>{{ __('D4 - Teknik Otomasi Industri') }}</option>
                                        <option value="D3 - Teknik Konversi Energi" {{ $SR->study_program == 'D3 - Teknik Konversi Energi' ? 'selected' : '' }}>{{ __('D3 - Teknik Konversi Energi') }}</option>
                                        <option value="D4 - Teknik Pembangkit Tenaga Listrik" {{ $SR->study_program == 'D4 - Teknik Pembangkit Tenaga Listrik' ? 'selected' : '' }}>{{ __('D4 - Teknik Pembangkit Tenaga Listrik') }}</option>
                                        <option value="D4 - Teknik Konservasi Energi" {{ $SR->study_program == 'D4 - Teknik Konservasi Energi' ? 'selected' : '' }}>{{ __('D4 - Teknik Konservasi Energi') }}</option>
                                        <option value="D3 - Akuntansi" {{ $SR->study_program == 'D3 - Akuntansi' ? 'selected' : '' }}>{{ __('D3 - Akuntansi') }}</option>
                                        <option value="D3 - Keuangan dan Perbankan" {{ $SR->study_program == 'D3 - Keuangan dan Perbankan' ? 'selected' : '' }}>{{ __('D3 - Keuangan dan Perbankan') }}</option>
                                        <option value="D4 - Akuntansi Manajemen Pemerintahan" {{ $SR->study_program == 'D4 - Akuntansi Manajemen Pemerintahan' ? 'selected' : '' }}>{{ __('D4 - Akuntansi Manajemen Pemerintahan') }}</option>
                                        <option value="D4 - Keuangan Syariah" {{ $SR->study_program == 'D4 - Keuangan Syariah' ? 'selected' : '' }}>{{ __('D4 - Keuangan Syariah') }}</option>
                                        <option value="D4 - Akuntansi" {{ $SR->study_program == 'D4 - Akuntansi' ? 'selected' : '' }}>{{ __('D4 - Akuntansi') }}</option>
                                        <option value="D3 - Administrasi Bisnis" {{ $SR->study_program == 'D3 - Administrasi Bisnis' ? 'selected' : '' }}>{{ __('D3 - Administrasi Bisnis') }}</option>
                                        <option value="D3 - Manajemen Pemasaran" {{ $SR->study_program == 'D3 - Manajemen Pemasaran' ? 'selected' : '' }}>{{ __('D3 - Manajemen Pemasaran') }}</option>
                                        <option value="D3 - Usaha Perjalanan Wisata" {{ $SR->study_program == 'D3 - Usaha Perjalanan Wisata' ? 'selected' : '' }}>{{ __('D3 - Usaha Perjalanan Wisata') }}</option>
                                        <option value="D4 - Manajemen Pemasaran" {{ $SR->study_program == 'D4 - Manajemen Pemasaran' ? 'selected' : '' }}>{{ __('D4 - Manajemen Pemasaran') }}</option>
                                        <option value="D4 - Administrasi Bisnis" {{ $SR->study_program == 'D4 - Administrasi Bisnis' ? 'selected' : '' }}>{{ __('D4 - Administrasi Bisnis') }}</option>
                                        <option value="D4 - Manajemen Aset" {{ $SR->study_program == 'D4 - Manajemen Aset' ? 'selected' : '' }}>{{ __('D4 - Manajemen Aset') }}</option>
                                        <option value="D3 - Bahasa Inggris" {{ $SR->study_program == 'D3 - Bahasa Inggris' ? 'selected' : '' }}>{{ __('D3 - Bahasa Inggris') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Angkatan Tahun') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" value="{{ old('email') ?? $SR->year }}" id="year" name="year" class="form-control" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-9">
                                    <input type="email" value="{{ old('email') ?? $SR->email }}" id="email" name="email" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Simpan Perubahan') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
@endforeach
