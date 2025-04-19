@extends('layouts.master')

@section('section-head')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
        <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
        <li class="breadcrumb-item active"><a href="/master/proposal">Proposal Diusulkan</a></li>
    </ol>
</nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Data Proposal Diusulkan</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudProposal" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('Skema Kompetisi') }}</th>
                                    <th class="text-center">{{ __('Bidang Kompetisi') }}</th>
                                    <th class="text-center">{{ __('Nama Produk') }}</th>
                                    <th class="text-center">{{ __('Tahun') }}</th>
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
        var datatable = $('#crudProposal').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('proposal.index') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'scheme_name', name: 'scheme_name', class: 'text-center', width: '15%' } ,
                { data: 'schema_type_name', name: 'schema_type_name', class: 'text-center' },
                { data: 'business_name', name: 'business_name', class: 'text-center' },
                { data: 'year', name: 'year', class: 'text-center'},
                { data: 'action', name: 'action', orderable: true, searchable: true, width: '20%' }
            ]
        })
    </script>
@endpush
