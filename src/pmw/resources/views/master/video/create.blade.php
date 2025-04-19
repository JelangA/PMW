@extends('layouts.master')

@section('section-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
        <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
        <li class="breadcrumb-item active"><a style="color: black;" href="/master/video">Video</a></li>
        <li class="breadcrumb-item active"><a href="/master/video/create">Create</a></li>
    </ol>
</nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">
                        Add Video
                    </p>
                </div>
                <form  action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Link Video') }}</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ old('video_link') }}" id="video_link" name="video_link" class="form-control" required placeholder="Enter Link Video ...">
                                @error('video_link')
                                <p class="text-sm text-danger"><span
                                        class="font-medium"></span>{{ $errors->first('video_link') }} </p>
                                 @enderror
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Jenis Video') }}</label>
                            <div class="col-sm-9">
                                <select id="type_video" name="type_video" class="form-control select2">
                                    <option value="Video_Kegiatan">{{ __('Video Kegiatan') }}</option>
                                    <option value="Video_Bisnis">{{ __('Video Bisnis') }}</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
    CKEDITOR.replace('broadcast');


</script>

@endpush
