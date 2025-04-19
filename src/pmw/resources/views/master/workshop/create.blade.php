@extends('layouts.master')

@section('section-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
        <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
        <li class="breadcrumb-item active"><a style="color: black;" href="/master/workshop">Workshop</a></li>
        <li class="breadcrumb-item active"><a href="/master/workshop/setting">@if($status == "updateData") {{ 'Update' }} @else {{ 'Create' }} @endif</a></li>
    </ol>
</nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">
                        @if($status == "updateData") Update Workshop @else Add Workshop @endif
                    </p>
                </div>
                <form @if($status == "updateData") action="{{ route('workshop.update', $Data->id) }}" @else action="{{ route('workshop.store') }}" @endif method="POST" enctype="multipart/form-data">
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
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Image') }}</label>
                            <div class="col-sm-9">
                                @if ($status == "updateData")
                                    <img src="{{ Storage::url($Data->image) }}" alt="{{ 'Poster ' . $Data->title }}" style="width: 100%;">
                                @endif
                                <input type="file" value="{{ old('image') }}" id="image" name="image" class="form-control dropify" style="height: 100%;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Description') }}</label>
                            <div class="col-sm-9">
                                <textarea id="desc" name="desc" class="form-control">{{ ($status == "updateData") ? $Data->desc : old('desc') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Event Date') }}</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" id="event_date" name="event_date" class="form-control" value="{{ ($status == "updateData") ? date('Y-m-d\TH:i', strtotime($Data->event_date)) : old('event_date') }}">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Registration Timeline') }}</label>
                            <div class="col-sm-9">
                                <input type="text" id="registration_timeline" name="registration_timeline" class="form-control daterange">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('First Presence Timeline') }}</label>
                            <div class="col-sm-9">
                                <input type="text" id="first_presence_timeline" name="first_presence_timeline" class="form-control daterange">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Second Presence Timeline') }}</label>
                            <div class="col-sm-9">
                                <input type="text" id="second_presence_timeline" name="second_presence_timeline" class="form-control daterange">
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
        CKEDITOR.replace('desc');
        CKEDITOR.config.htmlEncodeOutput
        CKEDITOR.config.entities 
        var status = "<?php echo $status ?>";
        var data = <?php echo $Data ?>;

        $(function() {
            if(status == "updateData"){
                $('#registration_timeline').daterangepicker({
                    timePicker : true,
                    timePicker24Hour : true,
                    timePickerIncrement : 1,
                    startDate: data.registration_start_date,
        		    endDate: data.registration_end_date,
                    locale : {
                        format : 'YYYY-MM-DD HH:mm'
                    }
                })

                $('#first_presence_timeline').daterangepicker({
                    timePicker : true,
                    timePicker24Hour : true,
                    timePickerIncrement : 1,
                    startDate: data.first_presence_start_time,
        		    endDate: data.first_presence_end_time,
                    locale : {
                        format : 'YYYY-MM-DD HH:mm'
                    }
                })

                $('#second_presence_timeline').daterangepicker({
                    timePicker : true,
                    timePicker24Hour : true,
                    timePickerIncrement : 1,
                    startDate: data.second_presence_start_time,
        		    endDate: data.second_presence_end_time,
                    locale : {
                        format : 'YYYY-MM-DD HH:mm'
                    }
                })
            } else {
                $('.daterange').daterangepicker({
                    timePicker : true,
                    timePicker24Hour : true,
                    timePickerIncrement : 1,
                    locale : {
                        format : 'YYYY-MM-DD HH:mm'
                    }
                })
            }
        })

</script>

@endpush
