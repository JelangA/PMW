@extends('layouts.master')

@section('section-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
        <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
        <li class="breadcrumb-item active"><a href="/master/download">Download</a></li>
    </ol>
</nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Daftar Unduhan</p>
                    </div>
                    <div class="col">
                        <a href="{{ route('download.create') }}" class="btn btn-primary float-right">
                            <span class="fas fa-plus"></span> {{ __('Tambah Unduhan') }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudCarousel" class="table table-striped w-100" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('Nama Unduhan') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
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
        var datatable = $('#crudCarousel').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('download.index') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'unduhan', name: 'unduhan' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                    width: '15%',
                }
            ]
        })
    </script>
@endpush
