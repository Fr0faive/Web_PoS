<!DOCTYPE html>
<html lang="en">

<head>
    @include("partials/header")
    <title>Penjualan</title>
</head>

<body class="bg-dashboard bg-cover">

    @include("partials.sidebar")
    <!-- Modal toggle -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg shadow-md bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            <div class="flex">
                <div class="flex-auto p-2">
                    <form action="{{ route("penjualan.insert") }}" method="POST" id="form">
                        @csrf
                        <input type="hidden" name="bayar" id="hidden-bayar">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="tbl_list_product">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Produk
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Jumlah Barang
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Harga Satuan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Sub Harga
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="flex-none w-80 p-2">
                    <div class="flex mb-2">
                        <input type="text" name="keyword" id="search_product" class="rounded-none rounded-l-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-1 text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Barcode / Nama Barang">
                        <button type="button" id="btn_search" class="inline-flex items-center px-3 text-sm text-white border border-l-0 rounded-l-none rounded-r-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill: white}</style><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                        </button>
                    </div>

                    <div class="p-4 rounded-lg bg-white">
                        <div class="mb-2">
                            <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Rp
                                </span>
                                <input type="text" readonly name="total" value="0" id="total" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="bayar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bayar</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Rp
                                </span>
                                <input type="text" name="bayar" value="0" id="bayar" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="kembali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kembali</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Rp
                                </span>
                                <input type="text" readonly name="kembali" value="0" id="kembali" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <button type="button" id="btn-bayar" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Bayar</button>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $("body").on("click",".container-qty .right-btn",function() {
                let parent = $(this).parent();
                let input   = parent.find('input');
                let val     = parseInt(input.val());
                if(isNaN(val)){
                    val     = 0;
                }
                val++;

                input.val(val);
                countSubTotal($(this).closest("tr"));
            })
            $("body").on("click",".container-qty .left-btn",function() {
                let parent = $(this).parent();
                let input   = parent.find('input');
                let val     = parseInt(input.val());
                if(isNaN(val)){
                    val     = 1;
                }
                if(val - 1 > 0){
                    val--;
                }

                input.val(val);
                countSubTotal($(this).closest("tr"));
            })
            $("body").on("keyup",".container-qty input",function(e) {
                if(e.keyCode == 13){
                    $(this).focusout();
                }
            })
            $("body").on("focusout",".container-qty input",function(e) {
                countSubTotal($(this).closest("tr"));
            })
            $("body").on("keypress",".container-qty input",function(e) {
                if(e.keyCode == 13){
                    e.preventDefault();
                }
            })

            $("body").on("focusout","#bayar",function(e) {
                let bayar   = $("#bayar").val().replace(/[^0-9]/g,'');
                
                let total   = parseInt($("#total").val().replace(/[^0-9]/g,''));
                bayar       = parseInt(bayar);
                let kembali     = bayar - total;
                $("#hidden-bayar").val(bayar)
                $("#kembali").val(Intl.NumberFormat("id-ID").format(kembali));
            })
            $("body").on("keyup","#bayar",function(e) {
                let bayar   = $("#bayar").val().replace(/[^0-9]/g,'');
                if(e.keyCode == 13){
                    $("#bayar").focusout();
                }else{
                    $("#bayar").val(Intl.NumberFormat("id-ID").format(bayar));
                }
            })

            function formatInsertProduct(data){
                let format  = Intl.NumberFormat("id-ID");
                return `
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" data-id_product="${data.id_produk}" data-harga="${data.harga}">
                            <td scope="row" class="px-6 py-4">
                                ${data.nama_produk}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex container-qty">
                                    <span class="inline-flex left-btn items-center px-2 text-sm text-gray-900 border border-r-0 rounded-r-none rounded-l-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                                    </span>
                                    <input type="text" name="product[${data.id_produk}]" class="rounded-none bg-gray-50 border border-blue-700 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-1 text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="1">
                                    <span class="inline-flex right-btn items-center px-2 text-sm text-gray-900 border border-l-0 rounded-l-none rounded-r-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                Rp${format.format(data.harga)}
                            </td>
                            <td class="px-6 py-4 subTotal">
                                Rp${format.format(data.harga)}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="text-2xl font-black btn-remove-product">
                                    &times;
                                </a>
                            </td>
                        </tr>
                `;
            }

            function countSubTotal(elTr) {
                let harga   = parseInt(elTr.data('harga'));
                let jml_product     = parseInt(elTr.find(".container-qty input").val());
                let subtotal    = harga * jml_product;
                elTr.find(".subTotal").html("Rp"+Intl.NumberFormat("id-ID").format(subtotal));
                countTotal()
            }

            function countTotal() {
                let total   = 0;
                $.each($("#tbl_list_product tbody tr"),function(k,tr) {
                    let elTr = $(tr);
                    let harga   = parseInt(elTr.data('harga'));
                    let jml_product     = parseInt(elTr.find(".container-qty input").val());
                    let subtotal    = harga * jml_product;
                    total   += subtotal;
                })

                $("#total").val(Intl.NumberFormat("id-ID").format(total));

                $("#bayar").focusout();

            }

            $("body").on("keyup","#search_product",function(e) {
                if(e.keyCode == 13){
                    $("#btn_search").click();
                }
            })

            $("body").on("click","#btn_search",function(){
                let keyword     = $("#search_product").val();
                $.ajax({
                    url     : `{{ route('product.getBy') }}`,
                    data    : {
                        nama_produk : keyword,
                        barcode     : keyword
                    },
                    dataType    : "JSON",
                    success  : function(data){
                        if(data.id_produk != undefined){
                            if(data.stok < 1){
                                alert("Stok Produk ini Kosong")
                            }else{
                                let checkEl     = $(`tr[data-id_product=${data.id_produk}]`);
                                if(checkEl.length > 0){
                                    checkEl.find(".container-qty .right-btn").click();
                                }else{
                                    $("#tbl_list_product").find("tbody").append(formatInsertProduct(data));
                                }
                                $("#search_product").val("");
                                countTotal();
                            }
                        }else{
                            alert("Produk tidak ditemukan")
                        }
                    },
                    error : function(e) {
                        alert("Produk tidak ditemukan")
                    }
                })
            })

            $("body").on("click",".btn-remove-product",function(e) {
                Swal.fire({
                    title: 'Hapus?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                
                        $(this).closest("tr")[0].outerHTML = '';
                    }
                })
            })

            $("body").on("click","#btn-bayar",function() {
                $("#form").submit();
            })

            $("#form").ajaxForm({
                dataType    : "JSON",
                success     : function(data) {
                    Swal.fire(data.message,"",data.status);
                    if(data.status == "success"){
                        $("#form")[0].reset();
                        $("#total").val("0");
                        $("#bayar").val("0");
                        $("#kembali").val("0");
                        $("#tbl_list_product tbody").html("");
                    }
                }
            })
        })
    </script>
</body>

</html>
