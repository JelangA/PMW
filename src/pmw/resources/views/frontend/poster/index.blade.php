@extends('layouts.frontend')

@section('section-content')
    @foreach($poster as $RW)
        <div class="grid lg:grid-cols-3 lg:gap-4 md:grid-cols-2 lg:pt-44 pt-36 pb-10 px-10 lg:px-30 md:px-10 border-b-2 border-gray-100 overlay min-h-screen overflow-hidden">
			<div class="lg:w-full w-auto  lg:pt-0 md:pt-0 mt-7 px-2 lg:flex lg:flex-col" data-aos="fade-left">
               
                <img src="{{ Storage::url($RW->poster) }}" class="w-full mx-auto" alt="">
               
            </div>
            <div data-aos="fade-right" class="flex flex-col lg:col-span-2 flex-grow gap-y-3 lg:px-20 md:px-0 px-2 md:text-left lg:text-left lg:w-full overflow-y-auto md:max-h-screen lg:max-h-screen my-5">
                <p class="font-black text-black text-3xl leading-tight">{{ $RW->title }}</p>
				
                <p class="text-xl font-semibold">Broadcast</p>
                <p class="text-secondary-dark text-sm lg:text-[17px] leading-7 justify-self-auto">{!! $RW->broadcast !!}</p>
            </div>
            
        </div>
    @endforeach
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
