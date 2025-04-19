@extends('layouts.master')

@section('section-head')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background: transparent; font-size: 16px; padding: 3px 2px; margin-bottom: 0px;">
            <li class="breadcrumb-item"><a href="#" style="color: black;">Master</a></li>
            <li class="breadcrumb-item active"><a style="color: black;" href="/master/timeline">Jadwal Kegiatan</a></li>
            <li class="breadcrumb-item active"><a href="/master/timeline/setting">Pengaturan</a></li>
        </ol>
    </nav>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-size: 15pt; font-weight: 700; margin-bottom: 0px;">Pengaturan Jadwal Kegiatan</p>
                </div>
                <div class="card-body">
                    <div class="flex pb-4 -ml-3">
                        <a href="{{ route('timeline.sesi.create', $id) }}" class="btn btn-primary">
                            <span class="fas fa-plus"></span> {{ __('Buat Sesi Baru') }}
                        </a>
                    </div>
                    <form action="{{route('timeline.sesi.update', $id)}}" method="post">
                        @csrf
                        @method('PATCH')

                        @foreach ($timelineType as $item)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>{{ '#'. $item->order .'. '. $item->name }}</label>
                                    </div>
                                    <div class="d-flex col-6 justify-content-end">
                                        @if ($item->order != 1)
                                            <a href="{{route('timeline.sesi.up', ['id' => $item->timeline_uuid, 'id_sesi' => $item->id])}}" class="btn" onclick="upSession(event, this)">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                        @endif

                                        @if ($item->order != $jumlah_data)
                                            <a href="{{route('timeline.sesi.down', ['id' => $item->timeline_uuid, 'id_sesi' => $item->id])}}" class="btn" onclick="downSession(event, this)">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        @endif

                                        <a href="{{route('timeline.sesi.destroy', ['id' => $item->timeline_uuid, 'id_sesi' => $item->id])}}" class="btn" onclick="notificationBeforeDelete(event, this)">
                                            <span class="fas fa-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Awal Kegiatan</label>
                                            <div class="input-group">
                                                <input type="date" id="start" name="start[]" class="form-control" value="{{ $item->start }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Akhir Kegiatan</label>
                                            <div class="input-group">
                                                <input type="date" id="end" name="end[]" class="form-control" value="{{ $item->end }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ((count($timelineType) > 0))
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                            </div>
                        @else
                            <h5 class="text-center">Jadwal Kegiatan Tidak Tersedia</h5>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="showDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Sesi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-40">Apakah anda yakin ingin menghapus sesi ini?</p>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <form action="" id="up-form" method="post">
        @method('patch')
        @csrf
    </form>
    <form action="" id="down-form" method="post">
        @method('patch')
        @csrf
    </form>
    <script>
        function notificationBeforeDelete(event, el) {
                event.preventDefault();
                $('#showDelete').modal('show');
                $("#delete-form").attr('action', $(el).attr('href'));
        }
        function upSession(event, el) {
            event.preventDefault();
            $("#up-form").attr('action', $(el).attr('href'));
            $("#up-form").submit();
        }
        function downSession(event, el) {
            event.preventDefault();
            $("#down-form").attr('action', $(el).attr('href'));
            $("#down-form").submit();
        }
    </script>
@endpush
