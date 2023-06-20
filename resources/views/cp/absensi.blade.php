<!DOCTYPE html>
<html lang="en">

<head>
    @include("partials/header")
    <title>Presensi</title>
</head>

<body class="bg-dashboard bg-cover">

    @include("partials.sidebar")
    @csrf

    <div class="p-4 sm:ml-64">
        <div class="flex justify-center items-center bg-white mx-96 rounded-full backdrop-filter backdrop-blur-md bg-opacity-60">
            <span class="font-bold text-4xl my-3 uppercase text-center">presensi</span>
        </div>
        @auth("kasir")
        <button class="btn_absensi_masuk text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Absensi Masuk
        </button>

        <button class="btn_absensi_keluar text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
            Absensi Keluar
        </button>
        @endauth
        <div class="relative shadow-md sm:rounded-lg bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            <div class="p-2 mt-2 rounded-lg">
                <table id="dataTable">
                    <thead class="bg-gray-100">
                        <tr>
                            <td scope="col">
                                Nama Pegawai
                            </td>
                            <td scope="col">
                                Nomor Pegawai
                            </td>
                            <td scope="col">
                                Tanggal Masuk
                            </td>
                            <td scope="col">
                                Tanggal Keluar
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                serverside : true,
                processing : true,
                ajax    : {
                    url     : "{{ route('absensi.datatable') }}",
                },
                columns: [
                    { data: 'nama_pegawai', name : 'nama_pegawai' },
                    { data: 'nomor_pegawai', name : 'nomor_pegawai' },
                    { data: 'tanggal_masuk', name : 'tanggal_masuk' },
                    { data: 'tanggal_keluar', name : 'tanggal_keluar' },
                ],
                order : [[2,"desc"]]
            });

            $("body").on("click",".btn_absensi_masuk",function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Absensi Masuk?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url     : `{{ route("absensi.insert") }}`,
                            data    : {
                                _token : $("[name=_token]").val(),
                                action  : "masuk"
                            },
                            method  : "POST",
                            dataType  : "JSON",
                            success : function(data){
                                Swal.fire(data.message,"",data.status);
                                if(data.status == "success"){
                                    $("#dataTable").DataTable().ajax.reload();
                                }
                            }
                        })
                    }
                })
            })

            $("body").on("click",".btn_absensi_keluar",function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Absensi Keluar?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url     : `{{ route("absensi.insert") }}`,
                            data    : {
                                _token : $("[name=_token]").val(),
                                action  : "keluar"
                            },
                            method  : "POST",
                            dataType  : "JSON",
                            success : function(data){
                                Swal.fire(data.message,"",data.status);

                                if(data.status == "success"){
                                    $("#dataTable").DataTable().ajax.reload();
                                }
                            }
                        })
                    }
                })
            })

        });
    </script>
</body>

</html>
