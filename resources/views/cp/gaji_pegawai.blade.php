<!DOCTYPE html>
<html lang="en">

<head>
    @include("partials/header")
    <title>Kelola Gaji</title>
</head>

<body class="bg-dashboard bg-cover">
    <!-- Modal toggle -->

    @include("partials.sidebar")
    <div class="p-4 sm:ml-64">
        <div class="flex justify-center items-center bg-white mx-96 rounded-full backdrop-filter backdrop-blur-md bg-opacity-60">
            <span class="font-bold text-4xl my-3 uppercase text-center">Kelola Gaji</span>
        </div>
        <button data-modal-target="modal" data-modal-toggle="modal" class="btn_add hidden" type="button">
            Tambah Karyawan
        </button>
        <button data-modal-target="modal" data-modal-toggle="hitungGajiModal" class="btn_modal_hitungGajiModal hidden" type="button">
            Hitung Gaji
        </button>
        <div class="relative shadow-md sm:rounded-lg bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            <div class="p-2 mt-2 rounded-lg">
                <table id="dataTable">
                    <thead class="bg-gray-100">
                        <tr>
                            <td scope="col">
                                Nama
                            </td>
                            <td scope="col">
                                Nomor Karyawan
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
                            <select rows="5" name="id_jenis_bonus" id="id_jenis_bonus" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                                <option value="">-- Pilih --</option>
                                @foreach($jenis_bonus as $jb)
                                <option value="{{ $jb->id_jenis_bonus }}">{{ $jb->nama_jenis_bonus }}</option>
                                @endforeach
                            </select>
                            <label for="id_jenis_bonus" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jenis Bonus</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <select rows="5" name="tahun" id="tahun" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                                <option value="">-- Pilih --</option>
                                @for($i = date("Y") - 1; $i < date("Y") + 5;$i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <label for="tahun" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tahun</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <select rows="5" name="bulan" id="bulan" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                                <option value="">-- Pilih --</option>
                                @for($i = 1; $i <= 12;$i++)
                                    <option value="{{ ($i > 9 ? $i : "0".$i) }}">{{ $bulan_arr[$i-1] }}</option>
                                @endfor
                            </select>
                            <label for="bulan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Bulan</label>
                        </div>

                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="jumlah_bonus" id="jumlah_bonus" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="jumlah_bonus" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jumlah</label>
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

    <div id="hitungGajiModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 max-h-full bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
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
                    <div class="p-6 space-y-6 modal-body">

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Setuju</button>
                        <button data-modal-hide="modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                    </div>
                </div>
            </form>
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
                    { data: null, width : '280', render : function(data){
                        return `
                        <button data-id="${data.id_pegawai}" type="button" class="btn_hitung_gaji text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hitung Gaji</button>
                        <button data-id="${data.id_pegawai}" type="button" class="btn_daftar_bonus text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Daftar Bonus</button>
                        <button data-id="${data.id_pegawai}" type="button" class="btn_daftar_hadir text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar Hadir</button>
                        <button data-id="${data.id_pegawai}" type="button" class="btn_history_gaji text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Riwayat Gaji</button>
                        `;
                    } },
                ],
                order : [[1,'asc']]
            });

            $("body").on("click",".btn_hitung_gaji",function(e){
                e.preventDefault();
                let id = $(this).data("id");
                Swal.fire({
                    title: 'Hitung gaji sekarang?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url     : `{{ route("admin.hitung_gaji_pegawai",["id" => ":id"]) }}`.replace(":id",id),
                            data    : {
                                _token : $("[name=_token]").val()
                            },
                            method  : "POST",
                            dataType  : "JSON",
                            success : function(data){
                                Swal.fire(data.message,"",data.status);
                                if(data.status == "success"){
                                    $("#dataTable_history").DataTable().ajax.reload();
                                }
                            }
                        })
                    }
                })
                }
            })


            // Daftar Bonus
            $("body").on('click', '#dataTable .btn_daftar_bonus', function () {
                let table   = $("#dataTable").DataTable();
                let tr = $(this).closest('tr');
                let row = table.row(tr);

                let tr_all = $("#dataTable tbody tr");
                let isShow  = !row.child.isShown() || !tr.hasClass('shown_daftar_bonus');

                $.each(tr_all,function(k,el){
                    table.row($(el)).child.hide();
                    $(el).removeClass('shown');
                    tr.removeClass('shown_riwayat_gaji');
                    tr.removeClass('shown_daftar_hadir');
                    tr.removeClass('shown_daftar_bonus');
                })

                if(isShow){
                    row.child(formatDaftarBonus(row.data())).show();
                    tr.addClass('shown');
                    tr.addClass('shown_daftar_bonus');
                    tr.attr("data-id",$(this).data("id"));
                    datatableBonus();
                }
            });

            function formatDaftarBonus(d) {
                return (
                    `
                    <div class="bg-gray-50 p-4 rounded">
                        <h5>Bonus</h5>
                        <button data-modal-target="modal" data-modal-toggle="modal" class="btn_add_bonus block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Tambah Bonus
                        </button>
                        <div class="mt-2">
                            <table class="table" id="dataTable_bonus">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <td scope="col">
                                            Jenis Bonus
                                        </td>
                                        <td scope="col">
                                            Jumlah Bonus
                                        </td>
                                        <td scope="col">
                                            Bulan
                                        </td>
                                        <td scope="col">
                                            Tahun
                                        </td>
                                        <td scope="col">
                                            Action
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    `
                );
            }

            function datatableBonus() {
                let id_pegawai   = $("#dataTable tbody .shown").attr("data-id");
                $('#dataTable_bonus').DataTable({
                    serverside : true,
                    processing : true,
                    ajax    : {
                        url     : "{{ route('bonus_pegawai.datatable') }}",
                        data    : {
                            id_pegawai : id_pegawai
                        }
                    },
                    columns: [
                        { data: 'jenis_bonus.nama_jenis_bonus', name : 'jenis_bonus.nama_jenis_bonus' },
                        { data: 'jumlah_bonus', name : 'jumlah_bonus', render : function(result){
                            return "Rp"+Intl.NumberFormat("id-ID").format(result);
                        } },
                        { data: 'bulan', name : 'bulan', render : function(result) {
                            let bulan_arr = JSON.parse(`{!! json_encode($bulan_arr) !!}`);
                            return bulan_arr[result - 1];
                        }  },
                        { data: 'tahun', name : 'tahun' },
                        { data: null, width : '280', render : function(data){
                            return `
                            <button data-id="${data.id_bonus_pegawai}" type="button" class="btn_edit_bonus text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                            <button data-id="${data.id_bonus_pegawai}" type="button" class="btn_hapus_bonus text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                            `;
                        } },
                    ],
                    order : [[3,'desc'],[2,'desc']]
                });
            }

            $("body").on("click",".btn_add_bonus",function(e){
                e.preventDefault();
                $(".btn_add").click();
                let id_pegawai   = $("#dataTable tbody .shown").attr("data-id");
                $("#modal form").get(0).reset();
                $("#modal form").get(0).setAttribute('action',`{{ route("bonus_pegawai.insert",["id_pegawai" => ":id_pegawai"]) }}`.replace(":id_pegawai",id_pegawai));
                $(".modal-title").html("Tambah Bonus");
            })

            $("body").on("click",".btn_edit_bonus",function(e){
                e.preventDefault();

                $("#modal form").get(0).reset();
                let id = $(this).data("id");
                $.ajax({
                    url     : `{{ route("bonus_pegawai.get",["id" => ":id"]) }}`.replace(":id",id),
                    method  : "GET",
                    dataType  : "JSON",
                    success : function(data){
                        $("#id_jenis_bonus").val(data.id_jenis_bonus).select();
                        $("#jumlah_bonus").val(data.jumlah_bonus);
                        $("#bulan").val(data.bulan > 9 ? data.bulan : "0"+data.bulan).select();
                        $("#tahun").val(data.tahun).select();

                        $(".btn_add").click();
                        $("#modal form").get(0).setAttribute('action',`{{ route("bonus_pegawai.update",["id" => ":id"]) }}`.replace(":id",id));
                        $(".modal-title").html("Edit Bonus");
                    }
                })

            })

            $("body").on("click",".btn_delete_bonus",function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).prop("disabled",true);
                        let id = $(this).data("id");
                        $.ajax({
                            url     : `{{ route("bonus_pegawai.delete",["id" => ":id"]) }}`.replace(":id",id),
                            data    : {
                                _token : $("[name=_token]").val()
                            },
                            method  : "POST",
                            dataType  : "JSON",
                            success : function(data){
                                $(this).prop("disabled",false);
                                Swal.fire(data.message,"",data.status);
                                if(data.status == "success"){
                                    $("#dataTable_bonus").DataTable().ajax.reload();
                                }
                            }
                        })
                    }
                })
            })

            $("#modal form").ajaxForm({
                beforeSubmit : function(e){
                    $("#modal form [type=submit]").prop("disabled",true);
                },
                dataType : "JSON",
                success : function(data){
                    $("#modal form [type=submit]").prop("disabled",false);
                    Swal.fire(data.message,"",data.status);
                    if(data.status == "success"){
                        $("#modal form [data-modal-hide=modal]").click();
                        $("#dataTable_bonus").DataTable().ajax.reload();
                    }
                }
            })

            // History Gaji

            $("body").on('click', '#dataTable .btn_history_gaji', function () {
                let table   = $("#dataTable").DataTable();
                let tr = $(this).closest('tr');
                let row = table.row(tr);

                let tr_all = $("#dataTable tbody tr");
                let isShow  = !row.child.isShown() || !tr.hasClass('shown_riwayat_gaji');

                $.each(tr_all,function(k,el){
                    table.row($(el)).child.hide();
                    $(el).removeClass('shown');
                    tr.removeClass('shown_riwayat_gaji');
                    tr.removeClass('shown_daftar_hadir');
                    tr.removeClass('shown_daftar_bonus');
                })

                if(isShow){
                    row.child(formatHistoryGaji(row.data())).show();
                    tr.addClass('shown');
                    tr.addClass('shown_riwayat_gaji');
                    tr.attr("data-id",$(this).data("id"));
                    datatableHistory();
                }
            });

            function formatHistoryGaji(d) {
                return (
                    `
                    <div class="bg-gray-50 p-4 rounded">
                        <h5>Gaji</h5>
                        <div class="mt-2">
                            <table class="table" id="dataTable_history">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <td scope="col">
                                            Gaji Pokok
                                        </td>
                                        <td scope="col">
                                            Bonus
                                        </td>
                                        <td scope="col">
                                            Total
                                        </td>
                                        <td scope="col">
                                            Bulan
                                        </td>
                                        <td scope="col">
                                            Tahun
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    `
                );
            }

            function datatableHistory() {
                let id_pegawai   = $("#dataTable tbody .shown").attr("data-id");
                $('#dataTable_history').DataTable({
                    serverside : true,
                    processing : true,
                    ajax    : {
                        url     : "{{ route('admin.riwayat_gaji_pegawai') }}",
                        data    : {
                            id_pegawai : id_pegawai
                        }
                    },
                    columns: [
                        { data: 'gaji_pokok', name : 'gaji_pokok',render : function(result){
                            return "Rp"+Intl.NumberFormat("id-ID").format(result);
                        }  },
                        { data: 'bonus', name : 'bonus',render : function(result){
                            return "Rp"+Intl.NumberFormat("id-ID").format(result);
                        }  },
                        { data: null,render : function(data){
                            let result = parseInt(data.gaji_pokok) + parseInt(data.bonus);
                            return "Rp"+Intl.NumberFormat("id-ID").format(result);
                        }  },
                        { data: 'bulan', name : 'bulan', render : function(result) {
                            let bulan_arr = JSON.parse(`{!! json_encode($bulan_arr) !!}`);
                            return bulan_arr[result - 1];
                        } },
                        { data: 'tahun', name : 'tahun' },
                    ],
                    order : [[4,'desc'],[3,'desc']]
                });
            }

            // Daftar Hadir

            $("body").on('click', '#dataTable .btn_daftar_hadir', function () {
                let table   = $("#dataTable").DataTable();
                let tr = $(this).closest('tr');
                let row = table.row(tr);

                let tr_all = $("#dataTable tbody tr");
                let isShow  = !row.child.isShown() || !tr.hasClass('shown_daftar_hadir');

                $.each(tr_all,function(k,el){
                    table.row($(el)).child.hide();
                    $(el).removeClass('shown');
                    tr.removeClass('shown_riwayat_gaji');
                    tr.removeClass('shown_daftar_hadir');
                    tr.removeClass('shown_daftar_bonus');
                })

                if(isShow){
                    row.child(formatDaftarHadir(row.data())).show();
                    tr.addClass('shown');
                    tr.addClass('shown_daftar_hadir');
                    tr.attr("data-id",$(this).data("id"));
                    datatableDaftarHadir();
                }
            });

            function formatDaftarHadir(d) {
                return (
                    `
                    <div class="bg-gray-50 p-4 rounded">
                        <h5>Daftar Hadir</h5>
                        <div class="mt-2">
                            <table class="table" id="dataTable_daftar_hadir">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <td scope="col">
                                            Tanggal
                                        </td>
                                        <td scope="col">
                                            Jam Masuk
                                        </td>
                                        <td scope="col">
                                            Jam Keluar
                                        </td>
                                        <td scope="col">
                                            Total Jam
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    `
                );
            }

            function datatableDaftarHadir() {
                let id_pegawai   = $("#dataTable tbody .shown").attr("data-id");
                $('#dataTable_daftar_hadir').DataTable({
                    serverside : true,
                    processing : true,
                    ajax    : {
                        url     : "{{ route('absensi.datatable') }}",
                        data    : {
                            id_pegawai : id_pegawai
                        }
                    },
                    columns: [
                        { data: null, render : function(data) {
                            let date    = new Date(data.tanggal_masuk);
                            let year    = date.getFullYear();
                            let month   = (date.getMonth() + 1);
                            month       = month > 9 ? month : "0" + month;
                            let day     = date.getDate() > 9 ? date.getDate() : "0" + date.getDate();
                            return year + "-" + month + "-"  + day;
                        } },
                        { data: null, render : function(data) {
                            let date    = new Date(data.tanggal_masuk);
                            let hour    = date.getHours() > 9 ? date.getHours() : "0"+date.getHours();
                            let minute    = date.getMinutes() > 9 ? date.getMinutes() : "0"+date.getMinutes();
                            return hour + ":" + minute;
                        } },
                        { data: null, render : function(data) {
                            if(data.tanggal_keluar == null){
                                return '<i>Belum Melakukan Absensi</i>';
                            }
                            let date    = new Date(data.tanggal_keluar);
                            let hour    = date.getHours() > 9 ? date.getHours() : "0"+date.getHours();
                            let minute    = date.getMinutes() > 9 ? date.getMinutes() : "0"+date.getMinutes();
                            return hour + ":" + minute;
                        } },
                        { data: null, render : function(data) {
                            if(data.tanggal_masuk == null || data.tanggal_keluar == null){
                                return '<i>Belum Melakukan Absensi</i>';
                            }
                            let tanggal_masuk    = new Date(data.tanggal_masuk).getTime();
                            let tanggal_keluar   = new Date(data.tanggal_keluar).getTime();
                            let diff             = tanggal_keluar - tanggal_masuk;
                            let hour         = Math.floor(diff / (60 * 60 * 1000));
                            let minute       = Math.floor((diff - ( hour * (60 * 60 * 1000))) / (60 * 1000));
                            return ` ${hour} Jam ${minute} Menit `;
                        } },

                    ],
                    order : [[0,'desc']]
                });
            }

        });
    </script>
</body>

</html>
