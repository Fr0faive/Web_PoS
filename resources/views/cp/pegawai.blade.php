<!DOCTYPE html>
<html lang="en">

<head>
    @include("partials/header")
    <title>Dashboard</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    @vite(['public/css/custom_datatable.css'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>

<body class="bg-dashboard bg-cover">
    <!-- Modal toggle -->

    @include("partials.sidebar")
    <div class="p-4 sm:ml-64">
        <button data-modal-target="modal" data-modal-toggle="modal" class="btn_add block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Tambah Pegawai
        </button>
        <div class="relative shadow-md sm:rounded-lg bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            <div class="p-2 ">
            <table class="table custom-table bg-white backdrop-filter backdrop-blur-md bg-opacity-40" id="dataTable">
                <thead class="bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
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

        <!-- Main modal -->
        <div id="modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 max-h-full bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form action="" method="post">
                    @csrf
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="modal-title text-xl font-semibold text-gray-900 dark:text-white"></h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="nomor_pegawai" id="nomor_pegawai" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="nomor_pegawai" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor Pegawai</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="nama_pegawai" id="nama_pegawai" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="nama_pegawai" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Pegawai</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="password" name="password_akun" id="password_akun" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="password_akun" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <button data-modal-hide="modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
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
                        <button data-id="${data.id_pegawai}" type="button" class="btn_edit text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                        <button data-id="${data.id_pegawai}" type="button" class="btn_delete text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                        `;
                    } },
                ]
            });

            $("body").on("click",".btn_add",function(e){
                // e.preventDefault();
                $("#modal form").get(0).reset();
                $("#modal form").get(0).setAttribute('action', `{{ route("pegawai.insert") }}`);
                $(".modal-title").html("Tambah Pegawai");
                $("#password_akun").prop("required",true);
            })

            $("body").on("click",".btn_edit",function(e){
                e.preventDefault();
                $(".btn_add").click();
                $("#password_akun").prop("required",false);
                let id = $(this).data("id");
                $.ajax({
                    url     : `{{ route("pegawai.get",["id" => ":id"]) }}`.replace(":id",id),
                    method  : "GET",
                    dataType  : "JSON",
                    success : function(data){
                        $("#nomor_pegawai").val(data.nomor_pegawai);
                        $("#nama_pegawai").val(data.nama_pegawai);
                    }
                })
                $("#modal form").get(0).setAttribute('action',`{{ route("pegawai.update",["id" => ":id"]) }}`.replace(":id",id));
                $(".modal-title").html("Edit Pegawai");
            })

            $("body").on("click",".btn_delete",function(e){
                e.preventDefault();
                if(confirm("Hapus?")){
                    $(this).prop("disabled",true);
                    let id = $(this).data("id");
                    $.ajax({
                        url     : `{{ route("pegawai.delete",["id" => ":id"]) }}`.replace(":id",id),
                        data    : {
                            _token : $("[name=_token]").val()
                        },
                        method  : "POST",
                        dataType  : "JSON",
                        success : function(data){
                            $(this).prop("disabled",false);
                            alert(data.message);
                            if(data.status == "success"){
                                $("#dataTable").DataTable().ajax.reload();
                            }
                        }
                    })
                }
            })

            $("#modal form").ajaxForm({
                beforeSubmit : function(e){
                    $("#modal form [type=submit]").prop("disabled",true);
                },
                dataType : "JSON",
                success : function(data){
                    $("#modal form [type=submit]").prop("disabled",false);
                    alert(data.message);
                    if(data.status == "success"){
                        $("#modal form [data-modal-hide=modal]").click();
                        $("#dataTable").DataTable().ajax.reload();
                    }
                }
            })

        });
    </script>
</body>

</html>
