@extends('layouts.master')

@foreach($Data as $LR)
    @section('section-head')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
                <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
                <li class="breadcrumb-item active"><a style="color: black;" href="{{ route('lecturer.index') }}">Dosen</a></li>
                <li class="breadcrumb-item active"><a href="#">{{ old('name') ?? $LR->name }}</a></li>
                <li class="breadcrumb-item active"><a href="#">Ubah Password</a></li>
            </ol>
        </nav>
    @endsection

    @section('section-body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Ubah Password</p>
                    </div>
                    <form action="{{ route('lecturer.update-password', $LR->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Kata Sandi Baru') }}</label>
                                <div class="col-sm-9">
                                    <input type="password" value="{{ old('password') }}" id="password" name="password" class="form-control" required="" placeholder="Masukkan Kata Sandi Baru ...">
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
