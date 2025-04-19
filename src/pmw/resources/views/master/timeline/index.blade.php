@extends('layouts.master')

@section('section-head')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
            <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
            <li class="breadcrumb-item active"><a href="/master/timeline">Jadwal Kegiatan</a></li>
        </ol>
    </nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Data Jadwal Kegiatan</p>
                    </div>
                    <div class="col">
                        <a href="{{ route('timeline.create') }}" class="btn btn-primary float-right">
                            <span class="fas fa-plus"></span> {{ __('Tambah Jadwal Kegiatan') }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudTimeline" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('Skema Kegiatan') }}</th>
                                    <th class="text-center">{{ __('Tahun Kegiatan') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
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
        var datatable = $('#crudTimeline').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('timeline.index') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'scheme', name: 'scheme', class: 'text-center' },
                { data: 'year', name: 'year', class: 'text-center' } ,
                { data: 'status', name: 'status', class: 'text-center' },
                { data: 'action', name: 'action', orderable: true, searchable: true, width: '5%' }
            ]
        })
    </script>
@endpush
