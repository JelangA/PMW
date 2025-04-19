@extends('layouts.master')

@section('section-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
        <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
        <li class="breadcrumb-item active"><a href="/master/lecturer">Dosen</a></li>
    </ol>
</nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Data Dosen</p>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#importLecturerModal">
                            <span class="fas fa-file-import"></span> {{ __('Import Data Dosen') }}
                        </button>
                        <a href="{{ route('lecturer.create') }}" class="btn btn-primary float-right mr-2">
                            <span class="fas fa-plus"></span> {{ __('Tambah Data Dosen') }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudLecturer" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('NIP') }}</th>
                                    <th class="text-center">{{ __('NIDN') }}</th>
                                    <th class="text-center">{{ __('Nama Lengkap') }}</th>
                                    <th class="text-center">{{ __('Email') }}</th>
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

@section('modal')
    <div class="modal fade" id="importLecturerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('lecturer.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <a href="{{asset('document/LecturerDataTemplates.xlsx')}}" download>Template Data</a>

                        <div class="form-group">
                            <input type="file" class="form-control dropify" id="customFile" name="file" accept=".xlsx, .xls, .csv" style="height: 100%;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var datatable = $('#crudLecturer').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('lecturer.index') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'nip', name: 'nip', class: 'text-center' },
                { data: 'nidn', name: 'nidn', class: 'text-center' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email', class: 'text-center' },
                { data: 'status', name: 'status', class: 'text-center' },
                { data: 'action', name: 'action', orderable: true, searchable: true, width: '10%' }
            ]
        })
    </script>
@endpush
