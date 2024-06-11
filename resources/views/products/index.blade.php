<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            @if (auth()->user()->is_admin)
                <x-primary-button>
                    <a href="{{ route('products.create') }}">Add new product</a>
                </x-primary-button>
            @endif



        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">PRICE (USD)</th>
                                <th scope="col">PRICE (EUR)</th>
                                @if (auth()->user()->is_admin)
                                    <th scope="col">Operation</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }} USD</td>
                                    <td>{{ $product->price_eur }} EUR</td>
                                    @if (auth()->user()->is_admin)
                                        <td>
                                            <x-secondary-button>
                                                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                                            </x-secondary-button>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>{{ __('No products found') }}</tr>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
