@extends('layouts.master')

@section('section-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
        <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
        <li class="breadcrumb-item active"><a style="color: black;" href="/master/poster">Poster</a></li>
        <li class="breadcrumb-item active"><a href="/master/poster/setting">@if($status == "updateData") {{ 'Update' }} @else {{ 'Create' }} @endif</a></li>
    </ol>
</nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">
                        @if($status == "updateData") Update Poster @else Add Poster @endif
                    </p>
                </div>
                <form @if($status == "updateData") action="{{ route('poster.update', $Data->id) }}" @else action="{{ route('poster.store') }}" @endif method="POST" enctype="multipart/form-data">
                    @csrf

                    @if($status == "updateData")
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Title') }}</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ ($status == "updateData") ? $Data->title : old('title') }}" id="title" name="title" class="form-control" required placeholder="Enter Title...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Poster') }}</label>
                            <div class="col-sm-9">
                                @if ($status == "updateData")
                                    <img src="{{ Storage::url($Data->poster) }}" alt="{{ 'Poster ' . $Data->title }}" style="width: 100%;">
                                @endif
                                <input type="file" value="{{ old('poster') }}" id="poster" name="poster" class="form-control dropify" style="height: 100%;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Broadcast') }}</label>
                            <div class="col-sm-9">
                                <textarea id="broadcast" name="broadcast" class="form-control" placeholder="Enter Broadcast ...">{{ ($status == "updateData") ? $Data->broadcast : old('broadcast') }}</textarea>
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

    var status = "<?php echo $status ?>";
    var data = <?php echo $Data ?>;



</script>

@endpush
