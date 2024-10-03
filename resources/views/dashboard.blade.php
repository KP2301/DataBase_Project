<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Member Information') }}
        </h2>
    </x-slot>

<style>
    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    .profile-photo {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin-bottom: 50px;
            margin-top: 50px;
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;

        }
    .info-text {
        display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-template-columns: 1fr 1fr; /* Label on the left, value on the right */
            gap: 10px 20px; /* Space between rows and columns */
            font-size: 18px;
            color: #666;

        }

</style>

@php
    $user = Auth::user();
@endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container ">
                    <h1 class='text-black'>{{ __("CONTACT INFO") }}</h1>
                    @if(empty($user->profile_photo))
                        <p class="text-black text-center">Don't have user's photo.</p>
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

