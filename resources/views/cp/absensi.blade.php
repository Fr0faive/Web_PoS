<!DOCTYPE html>
<html lang="en">

<head>
    @include("partials/header")
    <title>Produk Kategori</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <link rel="stylesheet" href="{{ url('/assets/custom_datatable.css') }}">
</head>

<body class="bg-dashboard bg-cover">

    @include("partials.sidebar")
    @csrf

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded shadow-md bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            @auth("kasir")
            <button class="btn_absensi_masuk text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Absensi Masuk
            </button>

            <button class="btn_absensi_keluar text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                Absensi Keluar
            </button>
            @endauth

            <div class="relative rounded-lg ">
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
                if(confirm("Absensi Masuk?")){
                    $.ajax({
                        url     : `{{ route("absensi.insert") }}`,
                        data    : {
                            _token : $("[name=_token]").val(),
                            action  : "masuk"
                        },
                        method  : "POST",
                        dataType  : "JSON",
                        success : function(data){
                            alert(data.message);
                            if(data.status == "success"){
                                $("#dataTable").DataTable().ajax.reload();
                            }
                        }
                    })
                }
            })

            $("body").on("click",".btn_absensi_keluar",function(e){
                e.preventDefault();
                if(confirm("Absensi Keluar?")){
                    $.ajax({
                        url     : `{{ route("absensi.insert") }}`,
                        data    : {
                            _token : $("[name=_token]").val(),
                            action  : "keluar"
                        },
                        method  : "POST",
                        dataType  : "JSON",
                        success : function(data){
                            alert(data.message);

                            if(data.status == "success"){
                                $("#dataTable").DataTable().ajax.reload();
                            }
                        }
                    })
                }
            })

        });
    </script>
</body>

</html>
