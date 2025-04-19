@extends('layouts.master')

@section('section-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
        <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
        <li class="breadcrumb-item active"><a href="/master/workshop">Workshop</a></li>
    </ol>
</nav>
@endsection

@section('section-body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col">
                    <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Workshop Data</p>
                </div>
                <div class="col">
                    <a href="{{ route('workshop.create') }}" class="btn btn-primary float-right">
                        <span class="fas fa-plus"></span> {{ __('Tambah Data Workshop') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="crudWorkshop" class="table table-striped w-100">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('No') }}</th>
                                <th class="text-center">{{ __('Judul') }}</th>
                                <th class="text-center">{{ __('Tanggal') }}</th>
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

@section('modal')
<div class="modal fade" id="modalQRCode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan QR Code Dibawah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="row d-flex justify-content-center">
                    <div id="qrcode-wrapper">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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

    function refreshCode(id){
        const token = id+"&"+Math.random().toString(36)
        $.ajax({
            url: `/master/workshop/qr-code/generate/${id}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'PUT',
            data: {
                code: token,
                expired: moment().format('YYYY-MM-DD HH:mm:ss'),
            },
            success: function (data) {
                console.log(data.message)
                $("#qrcode-wrapper").empty()
                new QRCode(document.getElementById("qrcode-wrapper"), token);
            },
            error: function (data) {
                console.log(data.message)
            },
        })
    }

    var datatable = $('#crudWorkshop').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('workshop.index') }}",
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
                data: 'title',
                name: 'title',
                class: 'text-center'
            },
            {
                data: 'event_date',
                name: 'event_date',
                width: '25%'
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
