<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
       .wel{
        margin: auto;
        display: flex;
        margin-top: 70px

       }
       .welcome {
           background-color: rgb(225, 216, 216);
           color: rgb(23, 17, 17);
           text-align: center;
           padding: 10px; 
          margin-left: 10px;
           font-size: 20px;
           display: inline-block;
           width: 100px;
           border-radius: 10px;
           
         }
         .welcome:hover{
            background-color: rgb(111, 112, 112);
            
         }
         a{
            text-decoration: none;
         }
       
        </style>
    </head>
    <body class=" wel">
        <div class=" wel">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 ">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                    <div class="welcome">
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 ">Log in</a>
                    </div>
                       
                        @if (Route::has('register'))
                        <div class="welcome">
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        </div>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
