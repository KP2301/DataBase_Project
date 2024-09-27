<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PRODUCTS') }}
        </h2>
    </x-slot>
    
    <div class="flex flex-wrap justify-between m-6 text-black">
        <div class="card">
            <img src="{{ asset('pictures/demo-shirt1.jpg') }}" alt="Image 1"> 
            <h5 class="text-xl font-bold">เบาที่สบาย</h5> 
            <p>bao T-Sabai</p>
        </div>
        <div class="card">
            <img src="{{ asset('pictures/demo-shirt2.jpg') }}" alt="Image 1"> 
            <h5 class="text-xl font-bold">เบาที่สบาย</h5> 
            <p>bao T-Sabai</p>
        </div>
        <div class="card">
            <img src="{{ asset('pictures/demo-shirt3.jpg') }}" alt="Image 1"> 
            <h5 class="text-xl font-bold">เบาที่สบาย</h5> 
            <p>bao T-Sabai</p>
        </div>
        <div class="card">
            <img src="{{ asset('pictures/demo-shirt1.jpg') }}" alt="Image 1"> 
            <h5 class="text-xl font-bold">เบาที่สบาย</h5> 
            <p>bao T-Sabai</p>
        </div>
    </div>
</x-app-layout>

<style>
    
    .card {
        width: calc(23.333% - 10px); /* 3 columns with space for margin */
        height: auto; /* Height adjusts based on content */
        background-color: #ffffff; /* White background */
        border: 1px solid #ddd; /* Light gray border */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        padding: 16px; /* Inner padding */
        margin-bottom: 20px; /* Space between rows */
        transition: transform 0.3s; /* Smooth transition for hover effect */
        display: flex; /* Enable flexbox for card content */
        flex-direction: column; /* Stack children vertically */
        align-items: center; /* Center children horizontally */
        justify-content: center; /* Center children vertically */
        text-align: center; /* Center text */
    }
    
    .card img {
        width: 100%; /* Responsive image */
        height: 300px; /* Maintain aspect ratio */
        border-radius: 8px 8px 0 0; /* Rounded top corners */
        margin-bottom: 8px; /* Space between image and text */
    }
    
    .card:hover {
        transform: translateY(-5px); /* Slight lift on hover */
    }
</style>
