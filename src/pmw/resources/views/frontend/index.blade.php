@extends('layouts.frontend')

@section('section-content')
<div class="md:min-h-screen pt-28">
    <section id="image-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src="{{ asset('img/slider.png') }}" class="w-full h-auto object-cover object-center">
                </li>
                <li class="splide__slide">
                    <img src="{{ asset('img/slider.png') }}" class="w-full h-auto object-cover object-center">
                </li>
            </ul>
        </div>
    </section>
</div>

<div class="w-full py-10 border-b-2 border-gray-100">
    <p class="font-black text-black text-xl text-center mb-10" data-aos="fade-down">Timeline</p>
    <div class="flex flex-col lg:pt-14 pt-8 lg:px-20 md:px-14 px-8" data-aos="fade-left">
        <ol class="lg:grid grid-cols-4 md:grid hidden mb-3 mt-2 mx-auto">
            <li class="relative mb-6 sm:mb-0">
                <div class="flex items-center">
                    <div class="flex z-10 justify-center items-center w-4 h-4 bg-gray-400 bg-opacity-10 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                        <div class="w-2 h-2 bg-blue-900 rounded-full"></div>
                    </div>
                    <div class="hidden sm:flex w-full bg-orange-600 h-0.5 dark:bg-gray-700"></div>
                </div>
                <div class="mt-3 sm:pr-8">
                    <h3 class="text-[15px] font-semibold text-gray-900 dark:text-white">Workshop</h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">01 January 2025 - 05 January 2025</time>
                </div>
            </li>
        </ol>
        <ol class="lg:grid grid-cols-4 md:grid hidden mb-3 mt-2 mx-auto">
            <li class="relative mb-6 sm:mb-0">
                <div class="flex items-center">
                    <div class="flex z-10 justify-center items-center w-4 h-4 bg-gray-400 bg-opacity-10 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                        <div class="w-2 h-2 bg-blue-900 rounded-full"></div>
                    </div>
                    <div class="hidden sm:flex w-full bg-orange-600 h-0.5 dark:bg-gray-700"></div>
                </div>
                <div class="mt-3 sm:pr-8">
                    <h3 class="text-[15px] font-semibold text-gray-900 dark:text-white">Registrasi</h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">06 January 2025 - 10 January 2025</time>
                </div>
            </li>
        </ol>

        <ol class="relative lg:hidden md:hidden block border-l border-gray-200 dark:border-gray-700 mb-3">
            <li class="mb-10 ml-6">
                <span class="flex absolute -left-2 justify-center items-center w-4 h-4 bg-gray-400 bg-opacity-10 rounded-full ring-white dark:ring-gray-900 dark:bg-blue-900">
                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                </span>
                <h3 class="text-[15px] font-semibold text-gray-900 dark:text-white">Workshop</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">01 January 2025 - 05 January 2025</time>
            </li>
        </ol>
        <ol class="relative lg:hidden md:hidden block border-l border-gray-200 dark:border-gray-700 mb-3">
            <li class="mb-10 ml-6">
                <span class="flex absolute -left-2 justify-center items-center w-4 h-4 bg-gray-400 bg-opacity-10 rounded-full ring-white dark:ring-gray-900 dark:bg-blue-900">
                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                </span>
                <h3 class="text-[15px] font-semibold text-gray-900 dark:text-white">Registrasi</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">06 January 2025 - 10 January 2025</time>
            </li>
        </ol>
    </div>
</div>

<div class="w-full py-10 lg:py-20 px-20 flex flex-col gap-6">
    <p class="font-black text-black text-xl text-center mb-10" data-aos="fade-down">Workshop</p>
    
    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6" data-aos="fade-down">
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:text-white cursor-pointer">
            <img class="rounded-t-lg object-cover mx-auto" src="{{ asset('img/workshop.png') }}" alt="" />
            <div class="p-5">
                <a href="#"><h5 class="mb-2 text-2xl font-bold tracking-tight text-blue-800 hover:text-blue-500">Workshop Title</h5></a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Workshop description goes here.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Read more
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="w-full py-10 lg:py-20 px-20 flex flex-col gap-6">
    <p class="font-black text-black text-xl text-center mb-10" data-aos="fade-down">Poster</p>
    
    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6" data-aos="fade-down">
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:text-white cursor-pointer">
            <img class="rounded-t-lg object-cover mx-auto" src="{{ asset('img/poster.png') }}" alt="" />
            <div class="p-5">
                <a href="#"><h5 class="mb-2 text-2xl font-bold tracking-tight text-blue-800 hover:text-blue-500">Workshop Title</h5></a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Workshop description goes here.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Read more
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:text-white cursor-pointer">
            <img class="rounded-t-lg object-cover mx-auto" src="{{ asset('img/poster.png') }}" alt="" />
            <div class="p-5">
                <a href="#"><h5 class="mb-2 text-2xl font-bold tracking-tight text-blue-800 hover:text-blue-500">Workshop Title</h5></a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Workshop description goes here.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Read more
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="w-full py-10 lg:py-20 px-20 flex flex-col gap-6">
    <p class="font-black text-black text-xl text-center mb-10" data-aos="fade-down">Video</p>
    <div class="grid md:grid-cols-2 grid-cols-1 gap-6" data-aos="fade-down">
        
        <div class="container mx-auto" data-aos="fade-down">
            <div class="bg-blue-900 mx-auto py-2 rounded-t-lg">
                <p class="font-black text-white text-xl text-center">Video Kegiatan</p>
            </div>
            <div class="py-10 lg:py-10 px-4 md:px-20 flex flex-col gap-6 bg-orange-500 rounded-b-lg">
                <div class="my-8" id="video-container">
                    <iframe src="https://www.youtube.com/embed/static_video1" class="w-full h-96"></iframe>
                </div>
            </div>
        </div>

        <div class="container mx-auto" data-aos="fade-down">
            <div class="bg-blue-900 mx-auto py-2 rounded-t-lg">
                <p class="font-black text-white text-xl text-center">Video Bisnis</p>
            </div>
            <div class="py-10 lg:py-10 px-4 md:px-20 flex flex-col gap-6 bg-orange-500 rounded-b-lg">
                <div class="my-8" id="video-containers">
                    <iframe src="https://www.youtube.com/embed/static_video2" class="w-full h-96"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#image-carousel', {
                rewind: true,
                autoplay: true,
                gap: 5,
                interval: 3000,
                perPage: 1,
                width: '100vw',
            }).mount();
        });

        function playVideo(videoUrl) {
            const iframe = document.createElement('iframe');
            iframe.setAttribute('src', videoUrl);
            iframe.setAttribute('class', 'w-full h-96');
            const videoContainer = document.getElementById('video-container');
            videoContainer.innerHTML = '';
            videoContainer.appendChild(iframe);
        }

        function playVideos(videoUrl) {
            const iframe = document.createElement('iframe');
            iframe.setAttribute('src', videoUrl);
            iframe.setAttribute('class', 'w-full h-96');
            const videoContainer = document.getElementById('video-containers');
            videoContainer.innerHTML = '';
            videoContainer.appendChild(iframe);
        }
    </script>
@endpush