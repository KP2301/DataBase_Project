<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PRODUCTS') }}
        </h2>
    </x-slot>
    <div class="p-5">
        <div class="flex flex-wrap justify-around m-6 text-black">
            @if ($products->isEmpty())
            <p class="text-white">No diary product found.</p>
            @else
            @foreach($products as $product)
                <div class="card">
                    <img src="{{ asset($product->product_photo) }}" alt="{{ $product->name }}"> 
                    <h5 class="text-xl font-bold">{{ $product->name }}</h5> 
                    <p>{{ $product->description }}</p>
                    <p>Price: ${{ $product->price }}</p>
                    <p>Remaining: {{ $product->remainProduct }}</p>
                    @auth
                        <form action="{{ route('add.to.cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="productID" value="{{ $product->id }}">
                            <input type="number" name="totalAmount" value="1" min="1" required>
                            <button type="submit">
                                Add to Cart
                            </button>
                        </form>
                    @else
                        <p class="text-red-500">Please log in to add products to your cart.</p>
                    @endauth
                </div>
            @endforeach
            @endif
        </div>
        <div>
            {{ $products->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>

<style>
    .card {
        width: calc(23.333% - 10px);
        height: auto;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        padding: 10px;
        margin-bottom: 15px;
        transition: transform 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .card img {
        width: 100%;
        height: 300px;
        border-radius: 8px 8px 0 0;
        margin-bottom: 8px;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    /* Add to Cart button styling */
    .add-to-cart {
        background-color: #8B4513; /* Brown background */
        color: white; /* White text */
        padding: 10px 15px; /* Button padding */
        border: none; /* Remove border */
        border-radius: 5px; /* Rounded button */
        font-size: 16px; /* Adjust font size */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s ease; /* Smooth transition for hover */
        margin-top: 10px; /* Space above button */
    }

    .add-to-cart:hover {
        background-color: #5a2e0e; /* Darker brown on hover */
    }

    /* Custom button styles */
    button {
        background-color: #a0522d; /* Brown color */
        color: white; /* Text color */
        margin-top: 5px;
        padding: 0.5rem 1rem; /* Padding */
        border-radius: 0.25rem; /* Rounded corners */
        transition: background-color 0.3s ease; /* Smooth transition for hover */
    }

    button:hover {
        background-color: #8b4513; /* Darker brown on hover */
    }

</style>
