@extends('layouts.master')

@section('section-head')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
            <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
            <li class="breadcrumb-item active"><a style="color: black;" href="/master/timeline">Jadwal Kegiatan</a></li>
            <li class="breadcrumb-item active"><a href="#">Tambah Sesi</a></li>
        </ol>
    </nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <form action="{{ route('timeline.sesi.store', $id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Nama') }}</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"/>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Awal Kegiatan') }}</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="date" placeholder="Start Date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}"/>
                                    @error('start') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Akhir Kegiatan') }}</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="date" placeholder="End Date" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}"/>
                                    @error('end') <span class="text-danger">{{ $message }}</span> @enderror
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