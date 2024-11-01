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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PRODUCTS') }}
        </h2>
    </x-slot>
    <div class="p-5">
        <!-- Success and Error Alerts -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold bg-transparent">Success!</strong>
                <span class="block sm:inline bg-transparent">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 bg-transparent px-4 py-3" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-green-500 bg-transparent " role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/></svg>
                </span>
            </div>
        @endif
        
        <div class="flex flex-wrap justify-around m-6 text-black">
            @if ($products->isEmpty())
                <p class="text-white">No product found.</p>
            @else
                @foreach($products as $product)
                    <div class="card bg-transparent ">
                        <img src="{{ asset($product->product_photo) }}" alt="{{ $product->name }}"> 
                        <div class="p-4">
                            <h2 class="text-lg font-semibold bg-transparent">{{ $product->name }}</h2>
                            <p class="text-gray-700 bg-transparent ">${{ number_format($product->price, 2) }}</p>
                            <!-- Display star rating -->
                            @if($product->rating->isNotEmpty())
                                <p>Rating: {{ $product->Rate_star }} / 5</p>
                            @else
                                <p>No rating yet</p>
                            @endif
                            @auth
                                <p class="text-gray-500">Stock: {{ $product->remainProduct }}</p> 
                                <!-- Details Button -->
                                <button class="mt-2 text-white-500 hover:underline" onclick="openModal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->description }}', '{{ number_format($product->price, 2) }}', '{{ $product->remainProduct }}', '{{ $product->category->name }}')">
                                    View Details
                                </button>
                            @else
                                <p id="product-description-{{ $product->id }}" class="hidden">{{ $product->description }}</p>
                                <p><span id="read-more-{{ $product->id }}" class="mt-2 text-brown-500 cursor-pointer" onclick="toggleDescription({{ $product->id }})">
                                    Read More
                                </span></p>
                                <button class="mt-2 bg-brown-500 text-white py-2 px-4 rounded" 
                                onclick="location.href='{{ route('login') }}'">
                                    Buy
                                </button>
                            @endauth
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- Modal Structure -->
        <div id="productModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden z-50 justify-center items-center" aria-hidden="true">
            <div class="bg-white rounded-lg p-6 max-w-md mx-auto">
                <h2 class="text-lg font-semibold bg-transparent" id="modalProductName"></h2>
                <p class="bg-transparent" id="modalProductDescription"></p>
                <p class="bg-transparent" id="modalProductCategory"></p>
                <p class="mt-2 bg-transparent" id="modalProductPrice"></p>
                <p class="mt-2 bg-transparent" id="modalProductStock"></p>
                <form class="bg-transparent" id="modalAddToCartForm" action="{{ route('addToCart') }}" method="POST" class="mt-4" onsubmit="return validateStock()">
                    @csrf
                    <input class="bg-transparent" type="hidden" name="productID" id="modalProductID">
                    <input class="bg-transparent" type="number" name="totalAmount" id="modalTotalAmount" value="1" min="1" required class="border rounded-md p-1 w-full mt-2">
                    <button type="submit" style="color: #776B5D" class="mt-2 text-white py-2 px-4 rounded w-full">
                        Add to Cart
                    </button>
                </form>
                <button style="color: #776B5D" class="mt-4 text-white py-2 px-4 rounded" onclick="closeModal()">
                    Close
                </button>
            </div>
        </div>

        <script>
            function openModal(productId, name, description, price, stock,cat) {
                document.getElementById('modalProductName').innerText = name;
                document.getElementById('modalProductDescription').innerText = description;
                document.getElementById('modalProductPrice').innerText = `$${price}`;
                document.getElementById('modalProductStock').innerText = `Remaining Stock: ${stock}`;
                document.getElementById('modalProductID').value = productId; 
                document.getElementById('productModal').classList.remove('hidden');
                document.getElementById('productModal').setAttribute('aria-hidden', 'false');
                document.getElementById('modalProductCategory').innerText = cat;
                document.getElementById('modalTotalAmount').value = 1; 
                document.getElementById('modalTotalAmount').focus();
                
            }

            function closeModal() {
                document.getElementById('productModal').classList.add('hidden');
                document.getElementById('productModal').setAttribute('aria-hidden', 'true');
            }

            function validateStock() {
                const stock = parseInt(document.getElementById('modalProductStock').innerText.match(/\d+/)[0]);
                const amount = parseInt(document.getElementById('modalTotalAmount').value);
                
                if (amount > stock) {
                    alert(`You cannot add more than ${stock} items to your cart.`);
                    return false; // Prevent form submission
                }
                return true; // Allow form submission
            }

            function toggleDescription(productId) {
                const description = document.getElementById('product-description-' + productId);
                const link = document.getElementById('read-more-' + productId);
                
                // Toggle the visibility of the description
                if (description.classList.contains('hidden')) {
                    description.classList.remove('hidden');
                    link.textContent = 'Read Less';
                } else {
                    description.classList.add('hidden');
                    link.textContent = 'Read More';
                }
            }

            // Close modal on Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeModal();
                }
            });
        </script>

        <div>
            {{ $products->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
</body>
<style>
    *{
        font-family: "Aboreto";
    }

    .card {
        width: calc(22.333% - 10px);
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
        margin-bottom: 1rem; 
        margin-right: 1rem; 
        border: 2px solid black; 
        border-radius: 0.5rem; 
        box-shadow: 0 0.375rem 0.75rem rgba(0, 0, 0, 0.1); 
        padding: 1rem;
    }

    .card img {
        width: 100%;
        height: 300px;
        border-radius: 5px;
        margin-bottom: 4px;
        object-fit:cover;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    /* Add to Cart button styling */
    .add-to-cart {
        /* background-color: #8B4513; Brown background */
        background-color: #F3EEEA;
        /* color: white; White text */
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
</html>