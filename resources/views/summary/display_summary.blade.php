<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SUMMARY') }}
        </h2>
    </x-slot>

    @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/></svg>
                </span>
            </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($Items->isEmpty())
                    <p>No purchased product found.</p>
                    @else

                    @foreach ($Items as $item)
                        @foreach ($item->products as $product)
                            
                                <div class="flex flex-row mb-4 p-4 border rounded d-flex"  x-data="{ selected: null }">
                                    <div class="h-48 mb-3 mr-5 lg:h-auto lg:w-48 flex-none bg-cover text-center overflow-hidden">
                                        <img src="{{ $product->product_photo }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                    </div>

                                    <div>
                                        <div class ="flex flex-col">
                                            <p>{{ __('OrderID : ')}}{{ $product->pivot->orderID}}</p>
                                            <p>{{ __('Product : ') }}{{ $product->name }}</p>
                                            <p>{{ __('Total Price : ') }}{{ $product->pivot->totalPrice }}</p>
                                            <p>{{ __('Date and Time : ') }}{{ $item->date_time }}</p>
                                            <p>{{ __('Quantity : ') }}{{ $product->pivot->quantity }}</p>
                                        </div>
                                        
                                        
                                        

                                    </div>

                                    <div class="ms-auto flex-col flex"> <!-- rate product part -->
                                        <div>
                                            <x-dropdown align="right" width="48" contentClasses="py-2 bg-white dark:bg-gray-800">
                                                <x-slot:trigger>
                                                    <button class="bg-blue-500 text-white px-4 py-2 rounded">
                                                        Rate the product.
                                                    </button>
                                                </x-slot:trigger>

                                                <x-slot:content>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <a href="#" class="block px-4 py-2 text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-600"
                                                            @click.prevent="selected = '{{ $i }}'">
                                                                {{ $i }} star{{ $i > 1 ? 's' : '' }}
                                                        </a>
                                                    @endfor
                                                </x-slot:content>
                                            </x-dropdown>
                                            <div>
                                                <p class="mt-4">Selected Rating: <span x-text="selected"></span></p>
                                            </div>
                                        </div>

                                        <div class="flex mt-auto ms-auto" x-show="selected" x-transition>
                                            <form method="POST" action="{{ route('product.rate')}}">
                                                @csrf
                                                <input type="hidden" name="productID" :value="'{{ $product->id }}'">
                                                <input type="hidden" name="rating" x-model="selected">
                                                <input type="hidden" name="orderID" :value="'{{ $product->pivot->orderID }}'">
                                                
                                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>

                                        
                                    </div>    
                                </div>
                                
                        @endforeach
                    @endforeach

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>