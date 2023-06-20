<!DOCTYPE html>
<html lang="en">

<head>
    @include("partials/header")
    <title>Produk</title>
</head>

<body class="bg-dashboard bg-cover">

    @include("partials.sidebar")
    <!-- Modal toggle -->
    <div class="p-4 sm:ml-64">
        <div class="flex justify-center items-center bg-white mx-96 rounded-full backdrop-filter backdrop-blur-md bg-opacity-60">
            <span class="font-bold text-4xl my-3 uppercase text-center">Produk</span>
        </div>
        @auth("admin")
        <button data-modal-target="modal" data-modal-toggle="modal" class="btn_add block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Tambah Produk
        </button>
        @endauth
        <button data-modal-target="modal" data-modal-toggle="updateStokModal" class="hidden btn_add_stok" type="button">Tambah Stok</button>

        <div class="relative shadow-md sm:rounded-lg bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            <div class="p-2 mt-2 rounded-lg">
                <table class="table custom-table" id="dataTable">
                    <thead class="bg-gray-100">
                        <tr>
                            <td scope="col">
                                Nama Produk
                            </td>
                            <td scope="col">
                                Barcode
                            </td>
                            <td scope="col">
                                Kategori
                            </td>
                            <td scope="col">
                                Supplier
                            </td>
                            <td scope="col">
                                Stok
                            </td>
                            <td scope="col">
                                Harga
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
        <div id="modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full max-h-full bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
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
                                <input type="text" name="nama_produk" id="nama_produk" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="nama_produk" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Produk</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="barcode" id="barcode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="barcode" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Barcode</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="harga" id="harga" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="harga" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <select rows="5" name="id_produk_kategori" id="id_produk_kategori" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                                    <option value="">-- Pilih --</option>
                                    @foreach($product_categories as $product_category)
                                    <option value="{{ $product_category->id_produk_kategori }}">{{ $product_category->nama_produk_kategori }}</option>
                                    @endforeach
                                </select>
                                <label for="id_produk_kategori" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Produk Kategori</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <select rows="5" name="id_supplier" id="id_supplier" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                                    <option value="">-- Pilih --</option>
                                    @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id_supplier }}">{{ $supplier->nama_supplier }}</option>
                                    @endforeach
                                </select>
                                <label for="id_supplier" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Supplier</label>
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

        <div id="updateStokModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form action="" method="post">
                    @csrf
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="modal-title text-xl font-semibold text-gray-900 dark:text-white">Tambah Stok</h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="updateStokModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="stok" id="stok" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="stok" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stok</label>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <button data-modal-hide="updateStokModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                bProcessing : true,
                bServerSide : true,
                ajax    : {
                    url     : "{{ route('product.datatable') }}",
                },
                columns: [
                    { data: 'nama_produk', name : 'nama_produk' },
                    { data: 'barcode', name : 'barcode' },
                    { data: 'produk_kategori.nama_produk_kategori', name : 'produk_kategori.nama_produk_kategori' },
                    { data: 'produk_supplier.supplier.nama_supplier', name : 'supplier.nama_supplier' },
                    { data: 'stok', name : 'stok' },
                    { data: 'harga', name : 'harga',render : function(result){
                        return "Rp"+Intl.NumberFormat("id-ID").format(result);
                    } },
                    { data: null, render : function(data){
                        return `
                        @auth("admin")
                        <button data-id="${data.id_produk}" type="button" class="btn_edit text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                        <button data-id="${data.id_produk}" type="button" class="btn_delete text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                        @endauth
                        <button data-id="${data.id_produk}" data-modal-target="updateStokModal" data-modal-toggle="modal" type="button" class="btn_update_stok text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Tambah Stok</button>
                        `;
                    } },
                ]
            });

            @auth("admin")
            $("body").on("click",".btn_add",function(e){
                // e.preventDefault();
                $("#modal form").get(0).reset();
                $("#modal form").get(0).setAttribute('action', `{{ route("product.insert") }}`);
                $("#modal .modal-title").html("Tambah Produk");
            })

            $("body").on("click",".btn_edit",function(e){
                e.preventDefault();
                $(".btn_add").click();
                let id = $(this).data("id");
                $.ajax({
                    url     : `{{ route("product.get",["id" => ":id"]) }}`.replace(":id",id),
                    method  : "GET",
                    dataType  : "JSON",
                    success : function(data){
                        $("#nama_produk").val(data.nama_produk);
                        $("#barcode").val(data.barcode);
                        $("#harga").val(data.harga);
                        $("#id_produk_kategori").val(data.id_produk_kategori != undefined ? data.id_produk_kategori : "").select();
                        $("#id_supplier").val(data.produk_supplier != undefined ? data.produk_supplier.id_supplier : "").select();
                    }
                })
                $("#modal form").get(0).setAttribute('action',`{{ route("product.update",["id" => ":id"]) }}`.replace(":id",id));
                $("#modal .modal-title").html("Edit Produk");
            })

            $("body").on("click",".btn_delete",function(e){
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
                            url     : `{{ route("product.delete",["id" => ":id"]) }}`.replace(":id",id),
                            data    : {
                                _token : $("[name=_token]").val()
                            },
                            method  : "POST",
                            dataType  : "JSON",
                            success : function(data){
                                $(this).prop("disabled",false);
                                Swal.fire(data.message,"",data.status);
                                if(data.status == "success"){
                                    $("#dataTable").DataTable().ajax.reload();
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
                        $("#dataTable").DataTable().ajax.reload();
                    }
                }
            })
            @endauth

            $("body").on("click",".btn_update_stok",function(e){
                $(".btn_add_stok").click();
                    let id = $(this).data("id");
                $("#updateStokModal form").get(0).reset();
                $("#updateStokModal form").get(0).setAttribute('action',`{{ route("product.update_stok",["id" => ":id"]) }}`.replace(":id",id));
            })

            $("#updateStokModal form").ajaxForm({
                beforeSubmit : function(e){
                    $("#updateStokModal form [type=submit]").prop("disabled",true);
                },
                dataType : "JSON",
                success : function(data){
                    $("#updateStokModal form [type=submit]").prop("disabled",false);
                    Swal.fire(data.message,"",data.status);
                    if(data.status == "success"){
                        $("#updateStokModal form [data-modal-hide=updateStokModal]").click();
                        $("#dataTable").DataTable().ajax.reload();
                    }
                }
            })

        });
    </script>
</body>

</html>
