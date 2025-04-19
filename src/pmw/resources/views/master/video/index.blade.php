@extends('layouts.master')

@section('section-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
        <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
        <li class="breadcrumb-item active"><a href="/master/video">Video</a></li>
    </ol>
</nav>
@endsection

@section('section-body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col">
                    <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Video Data</p>
                </div>
                <div class="col">
                    <a href="{{ route('video.create') }}" class="btn btn-primary float-right">
                        <span class="fas fa-plus"></span> {{ __('Tambah Data Video') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="crudWorkshop" class="table table-striped w-100">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('No') }}</th>
                                <th class="text-center">{{ __('Thumbnail Video') }}</th>
                                <th class="text-center">{{ __('Link Youtube') }}</th>
                                <th class="text-center">{{ __('Tipe Video') }}</th>
                                <th class="text-center">{{ __('Default Video') }}</th>
                                <th class="text-center">{{ __('Opsi') }}</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@push('scripts')
<script>

    $(document).on("click", "#btnModalQRCode", function(event) {
        const id = $(this).attr('id-workshop')
        refreshCode(id)
        setInterval(function(){
            refreshCode(id)
        }, 10000)
    })


    var datatable = $('#crudWorkshop').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('video.index') }}",
        columns: [{
                data: 'no',
                name: 'no',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                width: '5%',
                class: 'text-center'
            },
           
            {
                data: 'image',
                name: 'image',
                width:"25%"
            },
            {
                data: 'video_link',
                name: 'video_link',
                class: 'text-center'
            },
            {
                data: 'type_video',
                name: 'type_video',
                class: 'text-center'
            },
            {
                data: 'video_default',
                name: 'video_default',
                class: 'text-center'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true,
                width: '5%'
            }
        ]
    })
</script>
@endpush
