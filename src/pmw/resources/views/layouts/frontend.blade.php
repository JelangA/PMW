<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Program Mahasiswa Wirausaha POLBAN') }} | {{ isset($Title) ? '$Title' : '' }}</title>

    <link rel="icon" href="{{ asset('logo/pmwpolban-2.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    @stack('css')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="antialiased {{ isset($bgColor) ? 'bg-secondary' : '' }} overflow-x-hidden">
    <div id="overlay"></div>
    <nav class="bg-blue-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600 ">
        <div class="max-w-screen-xl px-3 lg:px-10  mx-auto flex flex-wrap items-center justify-between">
            <div class="flex flex-col">
                <a href="mailto:pmw@polban.ac.id?subject=write letter" class="h-4">
                    <i class="fa-sharp fa-solid fa-envelope text-white text-[10px]"></i> <span class="self-center text-xs font-semibold whitespace-nowrap text-white">pmw@polban.ac.id</span>
                </a>
                <a href="#">
                    <i class="fa-solid fa-phone text-white text-[10px]"></i>  <span class="self-center text-xs font-semibold whitespace-nowrap text-white">022 - 2013789 | 022 - 2015721</span>
                </a>
            </div>

               <div class="md:flex ">
                <p class="text-white text-xs mt-1 hidden md:block">follow us : </p>
                <a href="https://www.instagram.com/pmwpolban_/"><i class="fa-brands fa-instagram text-white mx-2 text-xs md:text-sm"></i></a>
                <a href="https://www.facebook.com/groups/118406921581788/?ref=share&mibextid=NSMWBT"><i class="fa-brands fa-facebook text-white pr-2 text-xs md:text-sm"></i></a>
                <a href="https://www.youtube.com/@pmwpolbanofficial-7471"><i class="fa-brands fa-youtube text-white pr-2 text-xs md:text-sm"></i></a>
                <a href="https://chat.whatsapp.com/GAJDoxja1FV9FMbePu1pY8"><i class="fa-brands fa-whatsapp text-white pr-2 text-xs md:text-sm"></i></a>
                <a href="https://t.me/+S7TxVXaD6Dr9FTNS"><i class="fa-brands fa-telegram text-white pr-2 text-xs md:text-sm"></i></a>
                
               </div>
            <div class="flex items-center">

                <img src="{{asset('logo/en.png')}}" alt="" class="pr-2">
                <img src="{{asset('logo/id.png')}}" alt="" class="pr-2">
                <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center font-medium justify-center px-4 text-sm text-gray-900 dark:text-white cursor-pointer hover:text-white ">
                    <svg class="w-5 h-5 text-orange-600 hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                  </button>
                  <!-- Dropdown -->

            </div>

        </div>
    </nav>
    <div class="flex lg:justify-around md:justify-around justify-between z-20 items-center lg:px-5 md:px-3 px-4 py-4 w-full bg-white fixed transition-shadow duration-150 h-24 mt-10" id="navbar">
        <div class="flex w-44"><img src="{{ asset('logo/pmwpolban-1.png') }}" alt=""></div>
        <div class="text-black font-semibold text-sm active:text-primary active:font-bold lg:flex md:flex hidden justify-evenly w-96">
            <a href="/" class="hover:text-primary transition-colors duration-150 ">
                <div class="{{ request()->is('/') ? 'text-blue-700' : 'text-black' }}">Beranda</div>
            </a>
            <a href="https://birokrasi.kemahasiswaan.polban.ac.id:8000/" class="hover:text-primary transition-colors duration-150">
                <div class="{{ request()->is('profile') ? 'text-blue-700' : 'text-black' }}">Workshop</div>
            </a>
            <a href="#" class="hover:text-primary transition-colors duration-150">
                <div class="{{ request()->is('profile') ? 'text-blue-700' : 'text-black' }}">Berita</div>
            </a>
            <a href="#" class="hover:text-primary transition-colors duration-150">
                <div class="{{ request()->is('profile') ? 'text-blue-700' : 'text-black' }}">Talent</div>
            </a>
            <a href="/unduhan" class="hover:text-primary transition-colors duration-150">
                <div class="{{ request()->is('unduhan') ? 'text-blue-700' : 'text-black' }}">Unduhan</div>
            </a>
        </div>
        <div class="flex gap-4 items-center">

            <a href="/login" class="bg-blue-700 px-7 py-2 text-white font-bold rounded-md lg:flex md:flex hidden items-center text-sm hover:bg-blue-800">{{ Auth::check() ? __('Dashboard') : __('Login') }}</a>
            <a href="/register" class="bg-blue-700 px-7 py-2 text-white font-bold rounded-md lg:flex md:flex hidden items-center text-sm hover:bg-blue-800">Register</a>
            <button id="hamburger" name="hamburger" class="lg:hidden md:hidden inline-block">
                <span class="w-[30px] h-[2px] my-2 block bg-black transition duration-300 ease-in-out origin-top-left"></span>
                <span class="w-[20px] h-[2px] my-2 block bg-black transition duration-300 ease-in-out"></span>
                <span class="w-[30px] h-[2px] my-2 block bg-black transition duration-300 ease-in-out origin-bottom-left"></span>
            </button>
        </div>
    </div>
    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow px-4 w-1/2 lg:w-auto" id="language-dropdown-menu">
        <ul class="py-2 font-medium" >
          <li>
              <div class="relative block">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
              </div>
          </li>
        </ul>
      </div>

    @include("components.mobile-nav")

    @yield('section-content')

    <div id="footer" class="">
        <div class="flex lg:flex-row flex-col bg-orange-600 px-20 py-10 lg:px-20 md:px-10 ">
            <div class="flex flex-col gap-y-3 lg:w-3/4 border-b-2 border-gray-200 lg:border-0 pb-5">
                <p class=" text-white text-sm ">Program Mahasiswa Wirausaha</p>
                <p class=" text-white text-sm text-opacity-40 lg:w-1/2">Jl. Gegerkalong Hilir, Ds. Ciwaruga, Kec. Parongpong, Kab. Bandung Barat, Jawa Barat 40559, Kotak Pos 1234</p>
            </div>
        </div>
        <div class="bg-blue-900 w-full px-20 py-3">
            <p class="font-balck text-white text-xs  text-center ">Copyright © Program Mahasiswa Wirausaha POLBAN - 2023. Developed by IT Team of JTK Polban</p>
        </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.selectpicker').select2();
            });
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        const navbar = document.querySelector('#navbar');
        const hamburger = document.querySelector('#hamburger');
        const overlay = document.querySelector("#overlay")
        const mobile_nav = document.querySelector("#mobile-nav")

        window.addEventListener('scroll', function() {
            navbar.classList.toggle('shadow-lg', window.scrollY > 0)
        })

        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('hamburger-active')
            overlay.classList.toggle('overlay-bg')
            mobile_nav.classList.toggle('mobilenav-hide')
            navbar.classList.toggle('border-b')
        })

        AOS.init();
    </script>

    @stack('script')
</body>
</html>
