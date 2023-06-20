<!DOCTYPE html>
<html lang="en">

<head>
    @include("partials/header")
    <title>Invoice</title>
</head>

<body class="bg-dashboard bg-cover">

    @include("partials.sidebar")
    @csrf

    <div class="p-4 sm:ml-64">
        <div class="flex justify-center items-center bg-white mx-96 rounded-full backdrop-filter backdrop-blur-md bg-opacity-60">
            <span class="font-bold text-4xl my-3 uppercase text-center">Invoice</span>
        </div>
        <div class="relative shadow-md sm:rounded-lg bg-white backdrop-filter backdrop-blur-md bg-opacity-40">
            <div class="p-2 mt-2 rounded-lg">
                <table id="dataTable">
                    <thead class="bg-gray-100">
                        <tr>
                            <td scope="col">
                                Nomor Invoice
                            </td>
                            <td scope="col">
                                Tanggal Transaksi
                            </td>
                            <td scope="col">
                                Total Harga
                            </td>
                            <td scope="col">
                                Bayar
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
                    url     : "{{ route('penjualan.datatable') }}",
                },
                columns: [
                    { data: 'nomor_invoice', name : 'nomor_invoice' },
                    { data: 'tanggal_penjualan', name : 'tanggal_penjualan' },
                    { data: 'total_harga', name : 'total_harga' , render : function(result){
                        return "Rp"+Intl.NumberFormat("id-ID").format(result)
                    } },
                    { data: 'bayar', name : 'bayar', render : function(result){
                        return "Rp"+Intl.NumberFormat("id-ID").format(result)
                    } },
                ],
                order : [[2,"desc"]]
            });


        });
    </script>
</body>

</html>
