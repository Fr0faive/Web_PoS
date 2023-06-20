<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    <title>Dashboard</title>
</head>

<body class="bg-dashboard bg-auto sm:bg-cover">
    @include('partials.sidebar')
    <div class="sm:ml-96 sm:mr-28 sm:my-12 bg-white bg-cover rounded-lg backdrop-filter backdrop-blur-md bg-opacity-40 h-auto">
        <div class="flex flex-row gap-2 justify-center items-center">
            <div
                class="my-10 mr-14 rounded-2xl h-48 w-auto bg-dashboard bg-cover flex flex-col sm:flex-row shadow-lg">
                <h1 class="font-bold m-5 text-xl sm:text-3xl">
                    Hi, {{ \AppHelper::userLogin()->nama_pegawai }} !
                </h1>
                <img src="{{ asset('assets/icon-dh.svg') }}" alt="" srcset="" class="mx-auto h-24 w-24 md:h-48 sm:w-48">
            </div>
            @php
                $now = \Carbon\Carbon::now('Asia/Jakarta');
                $month = $now->format('F');
                $day = $now->format('d');
                $dayOfWeek = $now->format('l');
                $timeRange = $now->format('H:i');
            @endphp
            <div class="my-10 mr-5 ml-28 min-w-32 min-h-48 p-3 font-medium shadow-lg">
                <div class="w-32 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-lg ">
                    <div class="block rounded-t overflow-hidden  text-center ">
                        <div class="bg-blue-500 text-white py-1">
                            {{ $month }}
                        </div>
                        <div class="pt-1 border-l border-r border-white bg-white">
                            <span class="text-5xl font-bold leading-tight">
                                {{ $day }}
                            </span>
                        </div>
                        <div
                            class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1">
                            <span class="text-sm">
                                {{ $dayOfWeek }}
                            </span>
                        </div>
                        <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white">
                            <span class="text-xs leading-normal">
                                {{ $timeRange }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-10 mb-10 mt-3 pb-12 flex flex-col sm:flex-row justify-center items-center">
            <div class="m-5 flex items-center flex-col sm:flex-row bg-white rounded-lg shadow-lg">
                <img src="{{ asset('assets/icon-po.svg') }}" alt="icon-goods-total" srcset="" class="ml-5">
                <div class="flex flex-col m-5 justify-center">
                    <span class="text-lg leading-normal">Total Produk</span>
                    <p class="text-base">1450</p>
                </div>
            </div>
            <div class="m-5 flex items-center flex-col sm:flex-row bg-white rounded-lg shadow-lg">
                <img src="{{ asset('assets/icon-po.svg') }}" alt="icon-goods-total" srcset="" class="ml-5">
                <div class="flex flex-col m-5 justify-center">
                    <span class="text-lg leading-normal">Total Supplier</span>
                    <p class="text-base">14</p>
                </div>
            </div>
            <div class="m-5 flex items-center flex-col sm:flex-row bg-white rounded-lg shadow-lg">
                <img src="{{ asset('assets/icon-po.svg') }}" alt="icon-goods-total" srcset="" class="ml-5">
                <div class="flex flex-col m-5 justify-center">
                    <span class="text-lg leading-normal">Total Pegawai</span>
                    <p class="text-base">8</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
