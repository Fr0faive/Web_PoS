<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    <title>Dashboard</title>
</head>

<body class="bg-dashboard bg-cover">
    @include('partials.sidebar')
    <div class="sm:ml-80 sm:mr-24 sm:my-12 bg-white rounded-lg backdrop-filter backdrop-blur-md bg-opacity-40">
        <div class="flex flex-row gap-2 justify-between">
            <div
                class="my-10 ml-10 rounded-lg h-48 w-96 bg-dashboard bg-cover backdrop-filter backdrop-blur-md bg-opacity-40">
                <h1 class="font-bold m-5 text-4xl">
                    HI,User!
                </h1>
            </div>
            <div class="m-10 min-w-32 min-h-48 p-3 font-medium">
                <div class="w-32 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-lg ">
                    <div class="block rounded-t overflow-hidden  text-center ">
                        <div class="bg-blue-500 text-white py-1">
                            March
                        </div>
                        <div class="pt-1 border-l border-r border-white bg-white">
                            <span class="text-5xl font-bold leading-tight">
                                17
                            </span>
                        </div>
                        <div
                            class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1">
                            <span class="text-sm">
                                Sunday
                            </span>
                        </div>
                        <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white">
                            <span class="text-xs leading-normal">
                                8:00 am to 5:00 pm
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-10 flex">
            halo
        </div>
    </div>
</body>

</html>
