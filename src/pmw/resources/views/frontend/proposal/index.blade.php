<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>{{ config('app.name', 'Program Mahasiswa Wirausaha POLBAN') }} | {{ __('Registrasi Peserta Kompetisi') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('logo/pmwpolban-2.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo/pmwpolban-2.png') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/select2/dist/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/css/components.css') }}">

    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>

</head>
<body>
    @include('sweetalert::alert')

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="login-brand">
                            <img src="{{ asset('logo/pmwpolban-1.png') }}" alt="logo" width="200">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header"><h4>{{ __('Registrasi Peserta Kompetisi') }}</h4></div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register.store') }}" class="needs-validation">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('Ketua Kelompok*') }}</label>
                                                <select value="{{ old('NIMKetua') }}" id="NIMKetua" name="NIMKetua" class="form-control select2">
                                                    <option hidden selected value="">-- Pilih Nama Ketua --</option>
                                                    @foreach($Student as $S)
                                                        <option value="{{ $S->nim }}">{{ $S->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Nama Produk*</label>
                                                <input type="text" id="ProductName" name="ProductName" class="form-control" placeholder="Masukkan Nama Produk ...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Nomor WhatsApp*</label>
                                                <input type="number" id="WhatsAppNumber" name="WhatsAppNumber" class="form-control" placeholder="Masukkan Nomor WhatsApp ...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('Jenis Kompetisi*') }}</label>
                                                <select id="Scheme" name="Scheme" class="form-control select2">
                                                    <option hidden selected value="">-- Pilih Jenis Kompetisi --</option>
                                                    @foreach($Scheme as $SC)
                                                        <option value="{{ $SC->id }}">{{ $SC->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('Bidang Kompetisi*') }}</label>
                                                <select id="SchemaType" name="SchemaType" class="form-control select2">

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('Anggota 1*') }}</label>
                                                <select value="{{ old('NIMAnggota1') }}" id="NIMAnggota1" name="NIMAnggota1" class="form-control select2">
                                                    <option hidden selected value="">-- Pilih Nama Anggota 1 --</option>
                                                    @foreach($Student as $S)
                                                        <option value="{{ $S->nim }}">{{ $S->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('Anggota 2*') }}</label>
                                                <select value="{{ old('NIMAnggota2') }}" id="NIMAnggota2" name="NIMAnggota2" class="form-control select2">
                                                    <option hidden selected value="">-- Pilih Nama Anggota 2 --</option>
                                                    @foreach($Student as $S)
                                                        <option value="{{ $S->nim }}">{{ $S->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('Anggota 3') }}</label>
                                                <select value="{{ old('NIMAnggota3') }}" id="NIMAnggota3" name="NIMAnggota3" class="form-control select2">
                                                    <option hidden selected value="">-- Pilih Nama Anggota 3 --</option>
                                                    @foreach($Student as $S)
                                                        <option value="{{ $S->nim }}">{{ $S->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group ">
                                                <label>{{ __('Anggota 4') }}</label>
                                                <select value="{{ old('NIMAnggota4') }}" id="NIMAnggota4" name="NIMAnggota4" class="form-control select2">
                                                    <option hidden selected value="">-- Pilih Nama Anggota 4 --</option>
                                                    @foreach($Student as $S)
                                                        <option value="{{ $S->nim }}">{{ $S->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('Dosen Pendamping*') }}</label>
                                                <select value="{{ old('NIPDosen') }}" id="NIPDosen" name="NIPDosen" class="form-control select2">
                                                    <option hidden selected>-- Pilih Nama Dosen Pendamping --</option>
                                                    @foreach($Lecturer as $L)
                                                        <option value="{{ $L->nip }}">{{ $L->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Email Dosen Pendamping*</label>
                                                <input type="email" id="EmailDosen" name="EmailDosen" class="form-control" placeholder="Masukkan Email Dosen Pendamping ...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                    {{ __('Daftar') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/js/stisla.js') }}"></script>

    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/js/custom.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('select[name="Scheme"]').on('change', function () {
                var ChemeID = $(this).val();
                if (ChemeID) {
                    $.ajax({
                        url: '/getChemaTypes/ajax/' + ChemeID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {

                            $('select[name="SchemaType"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="SchemaType"]').append(
                                    '<option value="' + value.id + '">' + value.name + '</option>'
                                );
                            });
                        }
                    });
                } else {
                    $('select[name="SchemaType"]').empty();
                }
            });
        });
    </script>
</body>
</html>
