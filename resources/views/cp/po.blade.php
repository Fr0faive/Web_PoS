<!DOCTYPE html>
<html lang="en">

<head>
    @include("partials/header")
    <title>Produk</title>
    <style>
        .btn_detail_po{
            border-radius: 100%;
            height: 30px;
            width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>

<body class="bg-dashboard bg-cover">

    @include("partials.sidebar")
    <!-- Modal toggle -->
    <div class="p-4 sm:ml-64">
        <div class="flex justify-center items-center bg-white mx-96 rounded-full backdrop-filter backdrop-blur-md bg-opacity-60">
            <span class="font-bold text-4xl my-3 uppercase text-center">Purchase Order</span>
        </div>
        <button data-modal-target="modal" data-modal-toggle="modal" class="btn_add block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Buat PO
        </button>

        <div class="relative shadow-md sm:rounded-lg ">
            <div class="p-2 bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
                <table class="table custom-table" id="dataTable">
                    <thead class="bg-gray-100">
                        <tr>
                            <td scope="col">
                                #
                            </td>
                            <td scope="col">
                                Nomor PO
                            </td>
                            <td scope="col">
                                Nama Supplier
                            </td>
                            <td scope="col">
                                Tanggal PO
                            </td>
                            <td scope="col">
                                Tanggal Pengiriman
                            </td>
                            <td scope="col">
                                Tanggal Penerimaan
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

        <div id="produkModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full max-h-full bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form action="" method="post">
                    @csrf
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="modal-title text-xl font-semibold text-gray-900 dark:text-white">Tambah Stok</h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="produkModal" data-modal-target="produkModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <select rows="5" name="id_produk" id="id_produk" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                                    <option value="">-- Pilih --</option>
                                </select>
                                <label for="id_produk" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Produk</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="qty_produk" id="qty_produk" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="qty_produk" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jumlah Order</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="harga_satuan" id="harga_satuan" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="harga_satuan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga Satuan</label>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <button data-modal-hide="produkModal" data-modal-target="produkModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
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
                    url     : "{{ route('purchase_order.datatable') }}",
                },
                columns: [
                    { data: null, width : '10', render : function(data){
                        let html    = `
                            <button data-id="${data.id_po}" type="button" class="btn_detail_po border">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                            </button>
                        `;
                        return html;
                    } },
                    { data: 'nomor_po', name : 'nomor_po' },
                    { data: 'nama_supplier', name : 'nama_supplier' },
                    { data: 'tanggal_po', name : 'tanggal_po' },
                    { data: 'tanggal_pengiriman', name : 'tanggal_pengiriman' },
                    { data: 'tanggal_penerimaan', name : 'tanggal_penerimaan' },
                    { data: null, width : '130', render : function(data){
                        let html    = `
                            <button data-id="${data.id_po}" type="button" class="btn_delete text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                        `;

                        if(data.tanggal_pengiriman == undefined){
                            html += `
                                <button data-id="${data.id_po}" data-action="kirim" type="button" class="btn_update_status text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Update Status</button>
                            `;
                        }else if(data.tanggal_penerimaan == undefined){
                            html += `
                                <button data-id="${data.id_po}" data-action="terima" type="button" class="btn_update_status text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Update Status</button>
                            `;
                        }
                        return html;
                    } },
                ],
                order : [[3,'desc']]
            });

            $("body").on("click",".btn_add",function(e){
                // e.preventDefault();
                $("#modal form").get(0).reset();
                $("#modal form").get(0).setAttribute('action', `{{ route("purchase_order.insert") }}`);
                $("#modal .modal-title").html("Buat PO");
            })


            $("body").on("click",".btn_delete",function(e){
                e.preventDefault();
                if(confirm("Hapus?")){
                    $(this).prop("disabled",true);
                    let id = $(this).data("id");
                    $.ajax({
                        url     : `{{ route("purchase_order.delete",["id" => ":id"]) }}`.replace(":id",id),
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

            $("body").on("click",".btn_update_status",function(e){
                e.preventDefault();
                if(confirm("Update Status?")){
                    let el  = this;

                    $(el).prop("disabled",true);
                    let id = $(el).data("id");
                    let action = $(el).data("action");
                    $.ajax({
                        url     : `{{ route("purchase_order.update",["id" => ":id"]) }}`.replace(":id",id),
                        data    : {
                            _token : $("[name=_token]").val(),
                            action : action
                        },
                        method  : "POST",
                        dataType  : "JSON",
                        success : function(data){
                            $(el).prop("disabled",false);
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


            $("body").on('click', '#dataTable .btn_detail_po', function () {
                let table   = $("#dataTable").DataTable();
                let tr = $(this).closest('tr');
                let row = table.row(tr);

                let tr_all = $("#dataTable tbody tr");
                let isShow  = !row.child.isShown();

                $.each(tr_all,function(k,el){
                    table.row($(el)).child.hide();
                    $(el).removeClass('shown');
                })

                if(isShow){
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                    tr.attr("data-id",$(this).data("id"));
                    datatableProduct();
                }
            });

            function format(d) {
                // `d` is the original data object for the row
                return (
                    `
                    <div class="bg-gray-50 p-4 rounded">
                        <h5>Produk</h5>
                        <button class="btn_add_product block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Tambah Produk
                        </button>
                        <div class="mt-2">
                            <table class="table" id="dataTable_product">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <td scope="col">
                                            Barcode Produk
                                        </td>
                                        <td scope="col">
                                            Nama Produk
                                        </td>
                                        <td scope="col">
                                            Jumlah Produk
                                        </td>
                                        <td scope="col">
                                            Harga Beli
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

            function datatableProduct() {
                let id_po   = $("#dataTable tbody .shown").attr("data-id");
                $('#dataTable_product').DataTable({
                    serverside : true,
                    processing : true,
                    ajax    : {
                        url     : "{{ route('purchase_order.datatableProduct') }}",
                        data    : {
                            id_po : id_po
                        }
                    },
                    columns: [
                        { data: 'barcode', name : 'barcode' },
                        { data: 'nama_produk', name : 'nama_produk' },
                        { data: 'qty_produk', name : 'qty_produk' },
                        { data: 'harga_satuan', name : 'harga_satuan',render : function(result){
                            return "Rp"+Intl.NumberFormat("id-ID").format(result);
                        }  },
                        { data: null, width : '130', render : function(data){
                            let html    = `
                                <button data-id="${data.id_po_produk}" type="button" class="btn_edit_product text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Update</button>
                                <button data-id="${data.id_po_produk}" type="button" class="btn_delete_product text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                            `;
                            return html;
                        } },
                    ],
                });
            }

            $("body").on("click",".btn_add_product",function() {
                const targetEl = document.getElementById('produkModal');
                const produkModal = new Modal(targetEl);
                let id_po   = $("#dataTable tbody .shown").attr("data-id");

                $("#produkModal form").get(0).reset();
                $("#produkModal form").get(0).setAttribute('action', `{{ route("purchase_order.insertProduct",["id_po" => ":id_po"]) }}`.replace(":id_po",id_po));
                $("#produkModal .modal-title").html("Tambah Produk");
                $.ajax({
                    url     : "{{ route('purchase_order.getManyProduct') }}",
                    data    : {
                        id_po   : id_po,
                    },
                    dataType    : "JSON",
                    success     : function(data){
                        $("#id_produk").html("");
                        $("#id_produk").append($("<option>",{value : ""}).html("-- Pilih --"));
                        $.each(data,function(k,product){
                            $("#id_produk").append($("<option>",{value : product.produk.id_produk}).html(product.produk.nama_produk));
                        })
                        produkModal.show();
                    }
                });
            });

            $("body").on("click",".btn_edit_product",function(e){
                e.preventDefault();
                $(".btn_add_product").click();
                let id = $(this).data("id");
                $.ajax({
                    url     : `{{ route("purchase_order.getProduct",["id_po_produk" => ":id"]) }}`.replace(":id",id),
                    method  : "GET",
                    dataType  : "JSON",
                    success : function(data){
                        $("#id_produk").val(data.id_produk != undefined ? data.id_produk : "").select();
                        $("#qty_produk").val(data.qty_produk);
                        $("#harga_satuan").val(data.harga_satuan);
                    }
                })
                $("#produkModal form").get(0).setAttribute('action',`{{ route("purchase_order.updateProduct",["id_po_produk" => ":id"]) }}`.replace(":id",id));
                $("#produkModal .modal-title").html("Edit Produk");
            })

            $("body").on("click",".btn_delete_product",function(e){
                e.preventDefault();
                if(confirm("Hapus Produk?")){
                    $(this).prop("disabled",true);
                    let id = $(this).data("id");
                    $.ajax({
                        url     : `{{ route("purchase_order.deleteProduct",["id_po_produk" => ":id"]) }}`.replace(":id",id),
                        data    : {
                            _token : $("[name=_token]").val()
                        },
                        method  : "POST",
                        dataType  : "JSON",
                        success : function(data){
                            $(this).prop("disabled",false);
                            alert(data.message);
                            if(data.status == "success"){
                                $("#dataTable_product").DataTable().ajax.reload();
                            }
                        }
                    })
                }
            })

            $("#produkModal form").ajaxForm({
                beforeSubmit : function(e){
                    $("#produkModal form [type=submit]").prop("disabled",true);
                },
                dataType : "JSON",
                success : function(data){
                    $("#produkModal form [type=submit]").prop("disabled",false);
                    alert(data.message);
                    if(data.status == "success"){
                        $("#produkModal form [data-modal-hide=produkModal]").click();
                        $("#dataTable_product").DataTable().ajax.reload();
                    }
                }
            })


        });
    </script>
</body>

</html>
