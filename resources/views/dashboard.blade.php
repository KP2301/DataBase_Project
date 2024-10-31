<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DataBase Project O_O BAOBAO </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Aboreto' rel='stylesheet'>
    </head>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style =" font-family: Aboreto">
                {{ __('Member Information') }}
            </h2>
        </x-slot>
    @php
        $user = Auth::user();
    @endphp

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container ">
                        <h1 class='text-black'>{{ __("CONTACT INFORMATION") }}</h1>
                        @if(empty($user->profile_photo))
                            <p class="text-center" style="color: grey" >Don't have user's photo.</p>
                        @else
                            <img src="{{ asset($user->profile_photo) }}" class="profile-photo" alt="User's profile photo">
                        @endif

                        <div  class="info-text">
                            <p> {{"Full Name  : "}}  {{($user->name) }} </p>
                            <p> {{"Email : "}} {{($user->email)}} </p>
                            <p> {{"Phone Number : "}}{{($user->phone_number)}} </p>
                        </div>
                    </div>
                        
                    <div class="container">
                        <h1 class='text-black'>{{ __("Shipping Address") }}</h1>
                        <div  class="info-text">
                            <p> {{"Address  : "}}  {{($user -> address) }} </p>    
                    </div>
                
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <style>
        /* Container Styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 1.5rem;
        }

        /* Header Styles */
        h1 {
            font-family:"Aboreto";
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #2c3e50; /* Darker color for headings */
            text-align: left;
        }

        /* Profile Photo Styles */
        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%; /* Circular image */
            object-fit: cover;
            margin: 1rem auto;
            display: block;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Info Text Styles */
        .info-text p {
            font-size: 1rem;
            color: #4a5568; /* Subtle gray for text */
            margin-bottom: 0.5rem;
            font-style: italic;
        }

        .info-text p span {
            font-weight: bold;
            color: #1a202c; /* Slightly darker for labels */
        }

        /* Light/Dark Mode Text Styles */
        @media (prefers-color-scheme: light) {
            h1, .info-text p {
                color: black;
            }
        }

        @media (prefers-color-scheme: dark) {
            h1, .info-text p {
                color: white;
            }
        }

    </style>
</html>
