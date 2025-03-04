<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favivon.ico"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        tailwind.config = {
            theme:{
                extend:{
                    colors:{
                        laravel: '#ef3b2d',
                    }
                }
            }
        }
    </script>
    
    <title>Laragigs - Laravel</title>

</head>
<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/">
            <img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"/>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
        
        @auth
            <li>
                <span class="font-bold uppercase">
                    Welcome {{auth()->user()->name}}
                </span>
            </li>
            <li>
                <a href="/listings/manage" class="hover:text-laravel">
                    <i class="fa-solid fa-gear" style="margin-right: 5px"></i> Manage Listings
                </a>
            </li>
            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>

        @else
            <li>
                <a href="/register" class="hover:text-laravel">
                    <i class="fa-solid fa-user-plus" style="margin-right: 5px;"></i> Register
                </a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel">
                    <i class="fa-solid fa-arrow-right-to-bracket" style="margin-right: 5px"></i> Login
                </a>
            </li>
        
        @endauth

        </ul>
    </nav>

    

    <main>
        {{--View Output--}}
        {{$slot}}
    </main>
    

    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"> <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
        <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
    </footer>

    <x-flash-message />

</body>
</html>