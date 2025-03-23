<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    
        <!-- Main Styling -->
        <link href="{{ asset('./assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="m-0 font-sans antialiased text-slate-500">
        <div class="absolute w-full min-h-screen bg-gray-100">
            
            @auth
                {{-- sidebar for auth user --}}
                @include('layouts.sidebar')     
            @else
                {{-- navbar for guest user --}}
                @include('layouts.navigation')
            @endauth
            
            @if (session()->has('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert"> 
                    <div>
                        <span class="font-medium">
                            {{ session('success') }}
                        </span>
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                    <div>
                        <span class="font-medium">
                            {{ session('error') }}
                        </span>
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <main class="relative min-h-[90vh] transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
                {{-- header --}}
                @isset($header)
                    <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
                        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                            <nav>
                                {{ $header }}
                            </nav>
                           
                        </div>
                    </nav>
                @endisset

                {{-- content --}}
                {{ $slot }}
                
            </main>

            @include('layouts.footer')
        </div>
    </body>

    <script src="{{ asset('./assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
    
    @yield('scripts')
</html>
