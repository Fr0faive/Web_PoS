<!DOCTYPE html>
<html lang="en">

<head>
    @include("partials/header")
    <title>Dashboard</title>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    @vite(['public/css/custom_datatable.css'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>

<body class="bg-dashboard bg-cover">
    
<div class="relative shadow-md sm:rounded-lg">
    <div class="p-2 bg-gray-50">
    <table class="table custom-table" id="dataTable">
        <thead class="bg-gray-100">
            <tr>
                <td scope="col">
                    Nama
                </td>
                <td scope="col">
                    Nomor Pegawai
                </td>
                <td scope="col">
                    Jabatan
                </td>
                <td scope="col">
                    Action
                </td>
            </tr>
        </thead>
    </table>
    </div>
</div>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                serverside : true,
                processing : true,
                ajax    : {
                    url     : "{{ route('pegawai.datatable') }}",
                },
                columns: [
                    { data: 'nama_pegawai', name : 'nama_pegawai' },
                    { data: 'nomor_pegawai', name : 'nomor_pegawai' },
                    { data: 'jabatan.nama_jabatan', name : 'jabatan.nama_jabatan' },
                    { data: null, width : '200', render : function(data){
                        return `
                        <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                        `;
                    } },
                ]
            });

        });
    </script>
</body>

</html>
