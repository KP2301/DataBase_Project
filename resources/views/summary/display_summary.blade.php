<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SUMMARY') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($Items->isEmpty())
                    <p>No purchased product found.</p>
                    @else
                    @foreach ($Items as $item)
                        @foreach ($item->products as $product)
                        <div class="flex flex-row mb-4 p-4 border rounded">
                            <div class="h-48 mb-3 mr-5 lg:h-auto lg:w-48 flex-none bg-cover text-center overflow-hidden">
                                <img src="{{ $product->product_photo }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                            </div>
                            <div>
                                <p>{{ __('Product : ') }}{{ $product->name }}</p>
                                <p>{{ __('Total Price : ') }}{{ $product->pivot->totalPrice }}</p>
                                <p>{{ __('Date and Time : ') }}{{ $item->date_time }}</p>
                                <p>{{ __('Quantity : ') }}{{ $product->pivot->quantity }}</p>
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
