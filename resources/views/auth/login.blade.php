<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Login - PoS</title>
</head>
<body class="bg-bg-login">
    <section class="h-full w-full">
        <div class="flex flex-col items-center justify-center px-6 py-24 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-3xl font-semibold text-gray-900 dark:text-white">
                <img class="w-20 h-20 mr-1" src="{{ asset('/images/logo.svg') }}" alt="logo">
                Point of Sales
            </a>
            <div class="w-full rounded-lg shadow-md dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 bg-gray-100 backdrop-filter backdrop-blur-md bg-opacity-20">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <div>
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Masuk
                        </h1>
                        <p class="text-base font-normal py-2">Gunakan akun pegawai anda</p>
                    </div>
                    <form class="space-y-4 md:space-y-6" action="#" id="formLogin" method="POST">
                        @csrf
                        <div>
                            <label for="nomor_pegawai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Pegawai</label>
                            <input type="text" name="nomor_pegawai" id="nomor_pegawai" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="023xxxxxxxx" required="">
                        </div>
                        <div>
                            <label for="password_akun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password_akun" id="password_akun" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                  <input id="remember" aria-describedby="remember" type="checkbox" name="remember_me" value="1" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                  <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button id="submitFormLogin" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                    </form>
                </div>
            </div>
            <p class="flex item-center mt-4 text-xs font-light">© Kelompok 1</p>
        </div>
      </section>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        $(function(){
            $("#formLogin").ajaxForm({
                url     : "{{ Route('login_process') }}",
                beforeSubmit : function(){
                    // $("#submitFormLogin").prop("disabled",true);
                },
                dataType  : "JSON",
                success     : function(data){
                    // $("#submitFormLogin").prop("disabled",false);
                    alert(data.message);
                    if(data.status == "success"){
                        location.reload();
                    }
                }
            })
        })
      </script>
</body>
</html>
