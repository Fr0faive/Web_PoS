<!DOCTYPE html>
<html lang="en">
<head>
    @include("partials/header")
    <title>Invoice Details</title>
    <style>
        @media print{
            
            .btnPrint{
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="mx-auto">
        <h3 class="text-center text-3xl font-bold mt-10">INVOICE</h3>
        <div class="mt-5 ml-3">
            <table>
                <tr>
                    <td class="px-3 py-2">Nomor Invoice</td>
                    <td class="px-3 py-2">: {{ $penjualan->nomor_invoice }}</td>
                </tr>
                <tr>
                    <td class="px-3 py-2">Tanggal Transaksi</td>
                    <td class="px-3 py-2">: {{ $penjualan->tanggal_penjualan }}</td>
                </tr>
            </table>
            <button type="button" onclick="window.print()" class="btnPrint mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Print</button>
        </div>
        <div class="relative overflow-x-auto mt-3">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 border">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3 border">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3 border">
                            Harga Satuan
                        </th>
                        <th scope="col" class="px-6 py-3 border">
                            Subtotal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan->detail_penjualan as $detail_penjualan)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 border">
                            {{ $detail_penjualan->produk->nama_produk }}
                        </td>
                        <td class="px-6 py-4 border">
                            {{ number_format($detail_penjualan->qty_produk,2,",",".") }}
                        </td>
                        <td class="px-6 py-4 border">
                            Rp{{ number_format($detail_penjualan->harga_satuan,2,",",".") }}
                        </td>
                        <td class="px-6 py-4 border">
                            Rp{{ number_format($detail_penjualan->harga_satuan * $detail_penjualan->qty_produk,2,",",".") }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="px-6 py-4" colspan="2"></td>
                        <td class="px-6 py-4 border">Total</td>
                        <td class="px-6 py-4 border">Rp{{ number_format($penjualan->total_harga,2,",",".") }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4" colspan="2"></td>
                        <td class="px-6 py-4 border">Bayar</td>
                        <td class="px-6 py-4 border">Rp{{ number_format($penjualan->bayar,2,",",".") }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4" colspan="2"></td>
                        <td class="px-6 py-4 border">Kembali</td>
                        <td class="px-6 py-4 border">Rp{{ number_format($penjualan->kembali,2,",",".") }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</body>
</html>
