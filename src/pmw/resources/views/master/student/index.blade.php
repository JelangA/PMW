@extends('layouts.master')

@section('section-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
        <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
        <li class="breadcrumb-item active"><a href="/master/student">Mahasiswa</a></li>
    </ol>
</nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-4">
                        <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Data Mahasiswa</p>
                    </div>
                    <div class="col-8">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#importStudentModal">
                            <span class="fas fa-file-import"></span> {{ __('Import Data Mahasiswa') }}
                        </button>
                        <a href="{{ route('student.create') }}" class="btn btn-primary float-right mr-3">
                            <span class="fas fa-plus"></span> {{ __('Tambah Data Mahasiswa') }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudStudent" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('NIM') }}</th>
                                    <th class="text-center">{{ __('Nama Lengkap') }}</th>
                                    <th class="text-center">{{ __('Email') }}</th>
                                    <th class="text-center">{{ __('Angkatan') }}</th>
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
    <div class="modal fade" id="importStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <a href="{{ asset('document/StudentDataTemplates.xlsx') }}" download>Template Data</a>

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
        var datatable = $('#crudStudent').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('student.index') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'nim', name: 'nim', class: 'text-center' },
                { data: 'name', name: 'name' } ,
                { data: 'email', name: 'email', class: 'text-center' },
                { data: 'year', name: 'year', class: 'text-center' },
                { data: 'status', name: 'status', class: 'text-center' },
                { data: 'action', name: 'action', orderable: true, searchable: true, width: '10%' }
            ]
        })
    </script>
@endpush
