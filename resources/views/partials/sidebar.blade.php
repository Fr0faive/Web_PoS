<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4 h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div
        class="h-full px-3 py-4 overflow-y-auto rounded-r-lg shadow-md bg-white backdrop-filter backdrop-blur-md bg-opacity-40 dark:bg-gray-800">
        <a href="{{ route('cp.dashboard') }}" class="flex items-center mb-6 text-xl font-semibold text-gray-900 dark:text-white">
            <img class="w-20 h-20 mr-1" src="{{ asset('/images/logo.svg') }}" alt="logo">
            Point of Sales
        </a>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('cp.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg focus:bg-gray-100 focus:text-white dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('assets/icon-db.svg') }}" alt="icon-user" class="w-7 h-7">
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cp.penjualan') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('assets/icon-presensi.svg') }}" alt="icon-user" class="w-7 h-7">
                    <span class="flex-1 ml-3 whitespace-nowrap">Penjualan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cp.absensi') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('assets/icon-presensi.svg') }}" alt="icon-user" class="w-7 h-7">
                    <span class="flex-1 ml-3 whitespace-nowrap">Presensi</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('assets/icon-transaksi.svg') }}" alt="icon-user" class="w-7 h-7">
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Kelola Transaksi</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('cp.product') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><img src="{{ asset('assets/icon-pro.svg') }}" alt="icon-pro" class="w-7 h-7"><span class="ml-3">Kelola Produk</span></a>
                    </li>
                    <li>
                        <a href="{{ route('cp.purchase_order') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><img src="{{ asset('assets/icon-po.svg') }}" alt="icon-po" class="w-7 h-7"><span class="ml-3">Purchase Order</span></a>
                    </li>
                    <li>
                        <a href="{{ route('cp.invoice') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><img src="{{ asset('assets/icon-invoice.svg') }}" alt="icon-invoice" class="w-7 h-7"><span class="ml-3">Invoice</span></a>
                    </li>
                    @auth("admin")
                    <li>
                        <a href="{{ route('cp.product_category') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><img src="{{ asset('assets/icon-category.svg') }}" alt="icon-category" class="w-7 h-7"><span class="ml-3">Kategori Produk</span></a>
                    </li>
                    @endauth
                    @auth("admin")
                    <li>
                        <a href="{{ route('cp.supplier') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><img src="{{ asset('assets/icon-supplier.svg') }}" alt="icon-supplier" class="w-7 h-7"><span class="ml-3">Supplier</span></a>
                    </li>
                    @endauth
                </ul>
            </li>
            @auth("admin")
            <li>
                <a href="{{ route('cp.pegawai') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('assets/icon-user.svg') }}" alt="icon-user" class="w-7 h-7">
                    <span class="flex-1 ml-3 whitespace-nowrap">Kelola Pegawai</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cp.gaji_pegawai') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('assets/icon-gaji.svg') }}" alt="icon-gaji" class="w-7 h-7">
                    <span class="flex-1 ml-3 whitespace-nowrap">Kelola Gaji</span>
                </a>
            </li>

            <li>
                <a href="{{ route('cp.laporan_penjualan') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('assets/icon-penjualan.svg') }}" alt="icon-gaji" class="w-7 h-7">
                    <span class="flex-1 ml-3 whitespace-nowrap">Laporan Penjualan</span>
                </a>
            </li>
            @endauth
            <li>
                <a href="{{ route('logout') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-red hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="{{ asset('assets/icon-logout.svg') }}" alt="icon-gaji" class="w-7 h-7">
                    <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
