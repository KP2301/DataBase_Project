<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CART') }}
        </h2>
    </x-slot>
    
    <style>
        .logo {
            font-family: 'Times New Roman', serif;
            font-size: 24px;
            letter-spacing: 5px;
            font-weight: bold;
            transition: color 0.3s ease; /* Smooth transition for color change */
        }

        /* Light mode styles */
        @media (prefers-color-scheme: light) {
            .logo {
                font-family: 'Times New Roman', serif;
                color: black; /* Dark text for light mode */
            }
            
            .summary-heading {
                color: black; /* Dark text for light mode */
            }
        }

        /* Dark mode styles */
        @media (prefers-color-scheme: dark) {
            .logo {
                font-family: 'Times New Roman', serif;
                color: white; /* White text for dark mode */
            }
            
            .summary-heading {
                color: white; /* White text for dark mode */
            }
        }
    </style>
                
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- {{-- Order Summary --}} -->
                    <div class="flex justify-between">
                        
                        <!-- {{-- Left: Order Details --}} -->
                        <div class="w-2/3 logo">
                            <h3 class="summary-heading text-lg font-bold mb-4">{{ __('Cart Summary') }}</h3>

                            @foreach ($products as $product)
                                <div class="flex mb-4">
                                    <!-- {{-- Product Image --}} -->
                                    <!-- <div class="w-24">
                                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-auto rounded">
                                    </div> -->
                                    
                                    <!-- {{-- Product Info --}} -->
                                    <div class="ml-4">
                                        <p class="font-semibold">{{ $product['name'] }}</p>
                                        <p>{{ __('Quantity:') }} ({{ $carts['totalAmount'] }})</p>
                                        <!-- <p class="font-semibold text-gray-600">${{ $product['price'] }}</p> -->
                                        <a href="#" class="text-blue-500 hover:underline">{{ __('Change') }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                                                <!-- {{-- Right: Summary Totals --}} -->
                                           <div class="w-1/3 bg-gray-100 p-4 rounded-lg shadow logo ">
                                                <div class="text-black dark:text-black text-lg  mb-4 ">{{ __('Order Summary') }}</div>
                                                    <div class="text-sm flex justify-between mb-2 text-black dark:text-black">
                                                        <span>{{ __('Subtotal') }}</span>
                                                        <span>${{ $subtotal }}</span>
                                                    </div>
                                                    <div class="text-sm flex justify-between mb-2 text-black dark:text-black">
                                                        <span>{{ __('Shipping') }}</span>
                                                        <span>${{ $shipping }}</span>
                                                    </div>
                                                    <div class="text-sm flex justify-between  text-black dark:text-black">
                                                        <span>{{ __('Total (Tax Incl.)') }}</span>
                                                        <span>${{ $total }}</span>
                                                    </div>                                    
                                            <!-- Terms and Conditions -->
                                            <form method="POST" action="{{ route('cart.updateCon') }}">
                                                @csrf
                                                <label class="flex items-center">
                                                    <input type="checkbox" name="terms" class="form-checkbox">
                                                    <span class="ml-2  text-black dark:text-black ">{{ __('I agree to the terms and conditions') }}</span>    
                                                </label>

                                                <!-- Continue Button -->
                                                <button type="submit" class="mt-4 w-full bg-gray-800 text-white p-2 rounded-lg hover:bg-gray-700">
                                                    {{ __('Continue') }}
                                                </button>
                                            </form> 
                                        </div>
                                    
        <div class="p-5">
        <!-- Success and Error Alerts -->
        @if(session('success') || session('error'))
            <!-- Modal Background -->
            <div id="popupModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg relative w-96">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Thank you!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Sorry, our customer.</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <!-- Close Button -->
                    <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                        <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/></svg>
                    </button>
                </div>
            </div>
        @endif

                                            <script>
                                                // Function to close the modal
                                                function closeModal() {
                                                    document.getElementById('popupModal').style.display = 'none';
                                                }

                                                // Automatically close modal after 5 seconds
                                                setTimeout(() => {
                                                    closeModal();
                                                }, 5000); // Close after 5 seconds
                                            </script>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

