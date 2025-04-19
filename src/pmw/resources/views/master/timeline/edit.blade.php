@extends('layouts.master')

@section('section-head')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
            <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
            <li class="breadcrumb-item active"><a style="color: black;" href="/master/timeline">Jadwal Kegiatan</a></li>
            <li class="breadcrumb-item active"><a href="/master/timeline/edit">Edit Data</a></li>
        </ol>
    </nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Edit Sesi</p>
                </div>
                <form action="{{ route('timeline.update', $timeline->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Tahun Kegiatan') }}</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" id="year" name="year" class="form-control" placeholder="Masukkan Tahun ..." value="{{ $timeline->year }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
