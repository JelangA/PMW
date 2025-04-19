<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>{{ config('app.name', 'Program Mahasiswa Wirausaha POLBAN') }} | {{ __('Login') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('logo/pmwpolban-2.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo/pmwpolban-2.png') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/css/components.css') }}">
</head>
<body class="sidebar-gone">
    
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="login-brand">
                            <img src="https://pmw.kemahasiswaan.polban.ac.id/logo/pmwpolban-1.png" alt="logo" width="200">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header"><h4>Registrasi Peserta Kompetisi</h4></div>

                            <div class="card-body">
                                <form method="POST" action="https://pmw.kemahasiswaan.polban.ac.id/register/store" class="needs-validation">
                                    <input type="hidden" name="_token" value="FTndxtP3n6ajpLKrE7CpGQJ31daflLMcaUR8kApa">                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Ketua Kelompok*</label>
                                                <select value="" id="NIMKetua" name="NIMKetua" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <option hidden="" selected="" value="">-- Pilih Nama Ketua --</option>
                                                                                                            <option value="221611050">SEPTIYANITA SILVA AGATHA NAINGGOLAN </option>
                                                                                                            <option value="221354042">FARIS MAULANA</option>
                                                                                                            <option value="201244019">RICKY DHIA HARTANTO AMEN</option>
                                                                                                            <option value="221111024">RIF'AT AZMA FATURAHMAN</option>
                                                                                                            <option value="231311035">ATHAYA SHEVA SUDRAJAT</option>
                                                                                                            
                                                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 490px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-NIMKetua-container"><span class="select2-selection__rendered" id="select2-NIMKetua-container" title="-- Pilih Nama Ketua --">-- Pilih Nama Ketua --</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
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
                                                <label>Jenis Kompetisi*</label>
                                                <select id="Scheme" name="Scheme" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <option hidden="" selected="" value="">-- Pilih Jenis Kompetisi --</option>
                                                                                                            <option value="2550bba8-cffa-4f86-8914-65fb1cb4cb31">MONEV</option>
                                                                                                            <option value="707eb6d8-d26e-444d-8bc7-87f91c4917ac">KBMK</option>
                                                                                                            <option value="85dabc0f-516e-46ef-bb2d-2d254b7b442e">KBMP</option>
                                                                                                            <option value="8ec0fc6b-bf74-44a4-b8ef-3fcbe11cea72">AKSELERASI</option>
                                                                                                            <option value="aa08019b-cc37-4939-aeb1-af94aef3b9a8">FAST FUNDING</option>
                                                                                                            <option value="b259f22e-33de-455f-bc7b-1f287af278b2">EXPO</option>
                                                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 490px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Scheme-container"><span class="select2-selection__rendered" id="select2-Scheme-container" title="-- Pilih Jenis Kompetisi --">-- Pilih Jenis Kompetisi --</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Bidang Kompetisi*</label>
                                                <select id="SchemaType" name="SchemaType" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                <option value="2550bba8-cffa-4f86-8914-65fb1cb4cb31">MONEV</option>
                                                                                                            <option value="707eb6d8-d26e-444d-8bc7-87f91c4917ac">KBMK</option>
                                                                                                            <option value="85dabc0f-516e-46ef-bb2d-2d254b7b442e">KBMP</option>
                                                                                                            <option value="8ec0fc6b-bf74-44a4-b8ef-3fcbe11cea72">AKSELERASI</option>
                                                                                                            <option value="aa08019b-cc37-4939-aeb1-af94aef3b9a8">FAST FUNDING</option>
                                                                                                            <option value="b259f22e-33de-455f-bc7b-1f287af278b2">EXPO</option>

                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 490px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-SchemaType-container"><span class="select2-selection__rendered" id="select2-SchemaType-container"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Anggota 1*</label>
                                                <select value="" id="NIMAnggota1" name="NIMAnggota1" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <option hidden="" selected="" value="">-- Pilih Nama Anggota 1 --</option>
                                                                                                            <option value="221611050">SEPTIYANITA SILVA AGATHA NAINGGOLAN </option>
                                                                                                            <option value="221354042">FARIS MAULANA</option>
                                                                                                            <option value="201244019">RICKY DHIA HARTANTO AMEN</option>
                                                                                                            <option value="221111024">RIF'AT AZMA FATURAHMAN</option>
                                                                                                            <option value="231311035">ATHAYA SHEVA SUDRAJAT</option>
                                                                                                            <option value="211711040">Hasbie Tsani Hermawan</option>
                                                                                                            
                                                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 490px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-NIMAnggota2-container"><span class="select2-selection__rendered" id="select2-NIMAnggota2-container" title="-- Pilih Nama Anggota 2 --">-- Pilih Nama Anggota 1 --</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Anggota 2*</label>
                                                <select value="" id="NIMAnggota1" name="NIMAnggota1" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <option hidden="" selected="" value="">-- Pilih Nama Anggota 2 --</option>
                                                                                                            <option value="221611050">SEPTIYANITA SILVA AGATHA NAINGGOLAN </option>
                                                                                                            <option value="221354042">FARIS MAULANA</option>
                                                                                                            <option value="201244019">RICKY DHIA HARTANTO AMEN</option>
                                                                                                            <option value="221111024">RIF'AT AZMA FATURAHMAN</option>
                                                                                                            <option value="231311035">ATHAYA SHEVA SUDRAJAT</option>
                                                                                                            <option value="211711040">Hasbie Tsani Hermawan</option>
                                                                                                            
                                                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 490px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-NIMAnggota2-container"><span class="select2-selection__rendered" id="select2-NIMAnggota2-container" title="-- Pilih Nama Anggota 2 --">-- Pilih Nama Anggota 2 --</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Anggota 3</label>
                                                <select value="" id="NIMAnggota3" name="NIMAnggota3" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <option hidden="" selected="" value="">-- Pilih Nama Anggota 3 --</option>
                                                                                                            <option value="221611050">SEPTIYANITA SILVA AGATHA NAINGGOLAN </option>
                                                                                                            <option value="221354042">FARIS MAULANA</option>
                                                                                                            <option value="201244019">RICKY DHIA HARTANTO AMEN</option>
                                                                                                            <option value="221111024">RIF'AT AZMA FATURAHMAN</option>
                                                                                                            <option value="231311035">ATHAYA SHEVA SUDRAJAT</option>
                                                                                                            
                                                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 490px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-NIMAnggota3-container"><span class="select2-selection__rendered" id="select2-NIMAnggota3-container" title="-- Pilih Nama Anggota 3 --">-- Pilih Nama Anggota 3 --</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group ">
                                                <label>Anggota 4</label>
                                                <select value="" id="NIMAnggota4" name="NIMAnggota4" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <option hidden="" selected="" value="">-- Pilih Nama Anggota 4 --</option>
                                                                                                            <option value="221611050">SEPTIYANITA SILVA AGATHA NAINGGOLAN </option>
                                                                                                            <option value="221354042">FARIS MAULANA</option>
                                                                                                            <option value="201244019">RICKY DHIA HARTANTO AMEN</option>
                                                                                                            <option value="221111024">RIF'AT AZMA FATURAHMAN</option>
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 490px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-NIMAnggota4-container"><span class="select2-selection__rendered" id="select2-NIMAnggota4-container" title="-- Pilih Nama Anggota 4 --">-- Pilih Nama Anggota 4 --</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Dosen Pendamping*</label>
                                                <select value="" id="NIPDosen" name="NIPDosen" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <option hidden="" selected="">-- Pilih Nama Dosen Pendamping --</option>
                                                                                                            <option value="196308211989031002">Drs. Endang Habinuddin , MT</option>
                                                                                                            <option value="196212071991021001">Teguh Wibowo , Dipl. Ing., M.T.</option>
                                                                                                            <option value="199301062019031017">Lukmannul Hakim Firdaus S.Kom, M.T.</option>
                                                                                                            
                                                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 490px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-NIPDosen-container"><span class="select2-selection__rendered" id="select2-NIPDosen-container" title="-- Pilih Nama Dosen Pendamping --">-- Pilih Nama Dosen Pendamping --</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                    Daftar
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

    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/modules/jquery.min.js"></script>
    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/modules/popper.js"></script>
    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/modules/tooltip.js"></script>
    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/modules/moment.min.js"></script>
    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/js/stisla.js"></script>

    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/modules/select2/dist/js/select2.full.min.js"></script>

    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/js/scripts.js"></script>
    <script src="https://pmw.kemahasiswaan.polban.ac.id/vendor/stisla2.2.0/dist/assets/js/custom.js"></script>

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

    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/js/stisla.js') }}"></script>

    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/js/custom.js') }}"></script>
</body>
</html>
