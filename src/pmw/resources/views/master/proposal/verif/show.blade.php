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
                @foreach($Proposals->proponent_members as $ReadProponentMember)
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-5 col-sm-5 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-between">
                            <span>{{ $ReadProponentMember->role }}</span>
                            <span>:</span>
                        </div>
                        <div class="col-6">{{ $ReadProponentMember->nim }}</div>
                    </div>
                    @endforeach
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama File</th>
                                    <th class="text-center" width="10%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Proposals->support_files as $ReadSupportFile)
                                    <tr>
                                        <td class="text-center">{{ $ReadSupportFile->name }}</td>
                                        @if($ReadSupportFile->url == '')

                                        @else
                                            <td class="text-center"><a href="{{ $ReadSupportFile->url }}" target="_blank" class="btn btn-info">Buka</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection