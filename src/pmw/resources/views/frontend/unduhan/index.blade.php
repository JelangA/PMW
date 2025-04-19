@extends('layouts.frontend')

@section('section-content')

<div class="w-full py-10 lg:pt-44 pt-36 px-20 flex flex-col gap-6 min-h-screen">
    <p class="font-black text-black text-xl text-center mb-10" data-aos="fade-down">Daftar Unduhan</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Unduhan
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white dark:bg-gray-800 text-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        1
                    </th>
                    <td class="px-6 py-4">
                        <a href="/path/to/static/file1.pdf" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">File 1</a>
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800 text-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        2
                    </th>
                    <td class="px-6 py-4">
                        <a href="/path/to/static/file2.pdf" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">File 2</a>
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800 text-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        3
                    </th>
                    <td class="px-6 py-4">
                        <a href="/path/to/static/file3.pdf" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">File 3</a>
                    </td>
                </tr>
                <tr>
                    <th colspan="2" class="text-center">
                        <p class="text-center my-4 font-normal text-[16px]">No data available in table</p>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection