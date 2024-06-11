<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">PRICE (USD)</th>
                                <th scope="col">PRICE (EUR)</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($products as $product)
                                <tr>
                                    <th>{{ $product->id }}</th>
                                    <th>{{ $product->name }}</th>
                                    <th>{{ $product->price }} USD</th>
                                    <th>{{ $product->price_eur }} EUR</th>
                                </tr>
                            @empty
                                <tr>{{ __('No products found') }}</tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
