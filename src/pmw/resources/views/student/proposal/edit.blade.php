@extends('layouts.master')

    @section('section-head')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
                <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
                <li class="breadcrumb-item active"><a style="color: black;" href="">Proposal</a></li>
                <li class="breadcrumb-item active"><a href="#">Lengkapi Usulan</a></li>
            </ol>
        </nav>
    @endsection

    @section('section-body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Lengkapi Data Usulan</p>
                    </div>
                    <form action="{{route('complete-proposal.update', ["complete_proposal" => $proposal->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                           
                            @if ($proposal->nama_skema=='KBMP')
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Nama Tim *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="team_name" name="team_name" class="form-control" value="{{ $proposal->team_name }}" required="" placeholder="Masukkan Nama Tim ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Instagram *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="business_instagram" name="business_instagram" class="form-control" value="{{ $proposal->business_instagram }}" required="" placeholder="Masukkan Instagram ...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Situasi Bisnis *') }}</label>
                                <div class="col-sm-9">
                                    <textarea id="business_situation" name="business_situation" class="form-control">{{ $proposal->business_situation }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Business Overview *') }}</label>
                                <div class="col-sm-9">
                                    <textarea id="business_overview" name="business_overview" class="form-control">{{ $proposal->business_overview }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Nomor Rekening *') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" id="bank_account_number" name="bank_account_number" value="{{ $proposal->bank_account_number }}" class="form-control" required="" placeholder="Masukkan Nomor Rekening ...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Turnover Target *') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" id="turnover_targets" name="turnover_targets" value="{{ $proposal->turnover_targets }}" class="form-control" required="" placeholder="Masukkan Turnover Target ...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Besaran Dana *') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" id="submission_funds" name="submission_funds" value="{{ $proposal->submission_funds }}" class="form-control" required="" placeholder="Masukkan Besaran Dana ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link Pitch Desk *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="PitchDesk" name="PitchDesk" class="form-control" value="{{ $pitchDeck->url }}" required="" placeholder="Masukkan Link Pitch Deck ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link Keuangan *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="Keuangan" name="Keuangan" class="form-control" value="{{ $keuangan->url }}" required="" placeholder="Masukkan Link Keuangan ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link Poster *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="Poster" name="Poster" class="form-control" value="{{ $poster->url }}" required="" placeholder="Masukkan Link Poster ...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link Video *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="Video" name="Video" class="form-control" value="{{ $video->url }}" required="" placeholder="Masukkan Link Video ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link BMC *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="BMC" name="BMC" class="form-control" value="{{ $bmc->url }}" required="" placeholder="Masukkan Link BMC ...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link Surat Kebersediaan Pembimbing *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="KebersediaanPembimbing" name="KebersediaanPembimbing" value="{{ $proposal->letter }}" class="form-control" required="" placeholder="Masukkan Link Surat Kebersediaan Pembimbing ...">
                                </div>
                            </div>
                            @elseif($proposal->nama_skema=="KBMK")
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Nama Tim *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="team_name" name="team_name" class="form-control" value="{{ $proposal->team_name }}" required="" placeholder="Masukkan Nama Tim ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Instagram *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="business_instagram" name="business_instagram" class="form-control" value="{{ $proposal->business_instagram }}" required="" placeholder="Masukkan Instagram ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link Makalah *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="Makalah" name="Makalah" class="form-control" value="{{ $makalah->url }}" required="" placeholder="Masukkan Link Makalah ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link KTM (1 File Ketua dan Anggota) *') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="ktm" name="ktm" class="form-control" value="{{ $makalah->ktm }}" required="" placeholder="Masukkan Link KTM ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link Lembar Persetujuan Narasumber') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="lembarPersetujuanNarasumber" name="lembarPersetujuanNarasumber" class="form-control" value="{{ $makalah->lembarPersetujuanNarasumber }}"  placeholder="Masukkan Link Lembar Persetujuan Narasumber ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link Lampiran Persetujuan Komersial') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="lampiranPersetujuanKomersial" name="lampiranPersetujuanKomersial" class="form-control" value="{{ $makalah->lampiranPersetujuanKomersial }}"  placeholder="Masukkan Link Lampiran Persetujuan Komersial ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Link Video') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" id="Video" name="Video" class="form-control" value="{{ $video->url }}"  placeholder="Masukkan Link Video ...">
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="card-footer text-right">
                            <input type="submit" class="btn btn-warning mr-2" name="action" value="Simpan Perubahan Sementara"></input>
                            <input type="submit" class="btn btn-primary" name="action" value="Simpan Finalisasi"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
    <script>
        CKEDITOR.replace('business_situation');
        CKEDITOR.replace('business_overview');
    </script>
@endpush
