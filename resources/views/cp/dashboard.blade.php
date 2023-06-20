<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    <title>Dashboard</title>
</head>

<body class="bg-dashboard bg-auto sm:bg-cover">
    @include('partials.sidebar')
    <div class="sm:ml-96 sm:mr-28 sm:my-12 bg-white rounded-lg backdrop-filter backdrop-blur-md bg-opacity-40">
        <div class="flex flex-row gap-2 justify-between items-center">
            <div
                class="my-10 ml-10 rounded-2xl h-48 w-auto bg-dashboard bg-cover flex flex-col sm:flex-row">
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
            <div class="m-10 min-w-32 min-h-48 p-3 font-medium">
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
        <div class="m-10 flex flex-col sm:flex-row justify-center items-center">
            div.
        </div>
    </div>
</body>

</html>
