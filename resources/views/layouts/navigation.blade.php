<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DataBase Project</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Aboreto' rel='stylesheet'>
    </head>
<body>
    
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center justify-start">
                    <a href="{{ route('/') }}" style="text-decoration: none">
                        <div class="logo"> BAOBAO</div>
                    </a>
                </div>

                <style>
                    *{
                        background : #FFFCF8;
                    }
                    .logo {
                        font-family:"Aboreto"; 
                        font-size: 2rem;
                        letter-spacing: 1px;
                        font-weight: bold;
                        transition: color 0.3s ease; /* Smooth transition for color change */
                    }

                    /* Light mode styles */
                    @media (prefers-color-scheme: light) {
                        .logo {
                            color: black; /* Dark text for light mode */
                            
                        }
                    }

                    /* Dark mode styles */
                    @media (prefers-color-scheme: dark) {
                        .logo {
                            color: white; /* White text for dark mode */
                        }
                    }

                    .font{
                        font-family:"Aboreto"; 
                        font-weight: bold;
                    }
                </style>
                @if (Route::has('login'))
                        <nav class="flex space-x-4 ml-auto font">
                        @auth
                                <!-- Product Links -->
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link :href="route('display_product')" :active="request()->routeIs('display_product')" style="text-decoration: none">
                                        {{ __('Product') }}
                                    </x-nav-link>
                                </div>
                                
                                

                                <!-- Cart Links -->
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link :href="route('cart.display_cart')" :active="request()->routeIs('cart.display_cart')" style="text-decoration: none">
                                        {{ __('Cart') }}
                                    </x-nav-link>
                                </div>

                                <!-- Summary Links -->
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link :href="route('summary.display_summary')" :active="request()->routeIs('summary.display_summary')" style="text-decoration: none">
                                        {{ __('Summary') }}
                                    </x-nav-link>
                                </div>

                                <!-- Dashboard Links -->
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" style="text-decoration: none">
                                        {{ __('Member Information') }}
                                    </x-nav-link>
                                </div>
                            
                        @else
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('login')" :active="request()->routeIs('login')" style="text-decoration: none">
                                    {{ __('Log in') }}
                                </x-nav-link>
                            </div>
                            @if (Route::has('register'))
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('register')" :active="request()->routeIs('register')" style="text-decoration: none">
                                    {{ __('Register') }}
                                </x-nav-link>
                            </div>
                            @endif
                        @endauth
                    </nav>
                @endif  
            </div>
          
            <!-- Settings Dropdown -->
            <div class="shrink-0 flex items-center justify-start"> 
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <!-- <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"> -->
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" style="text-decoration: none">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();" style="text-decoration: none">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>      
            </div>   
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" style="text-decoration: none">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        @if (Route::has('login'))
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            @endauth
        @endif
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" style="text-decoration: none">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" style="text-decoration: none">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
</body>
</html>