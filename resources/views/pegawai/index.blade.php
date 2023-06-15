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
        
</head>

<body class="bg-dashboard bg-cover">
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="p-2 bg-gray-50">
    <table class="table custom-table" id="dataTable">
        <thead class="bg-gray-100">
            <tr>
                <td scope="col">
                    Product name
                </td>
                <td scope="col">
                    Color
                </td>
                <td scope="col">
                    Category
                </td>
                <td scope="col">
                    Price
                </td>
                <td scope="col">
                    Action
                </td>
            </tr>
        </thead>
        <tbody>
            <tr >
                <td scope="row">
                    Apple MacBook Pro 17"
                </td>
                <td>
                    Silver
                </td>
                <td>
                    Laptop
                </td>
                <td>
                    $2999
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr>
                <td scope="row">
                    Microsoft Surface Pro
                </td>
                <td>
                    White
                </td>
                <td>
                    Laptop PC
                </td>
                <td>
                    $1999
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row">
                    Magic Mouse 2
                </td>
                <td>
                    Black
                </td>
                <td>
                    Accessories
                </td>
                <td>
                    $99
                </td>
                <td>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
</div>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

        });
    </script>
</body>

</html>
