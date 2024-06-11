<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-end mb-3">

                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">PRICE (USD)</th>
                                <th scope="col">PRICE (EUR)</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <input type="text" value="{{ $product->id }}">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="text" value="{{ $product->name }}">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="text" value="{{ $product->price }}">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $product->price_eur }} (USD)
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary">Update Product</a>
                                    <a href="{{ route('products.destroy', $product->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>


                            </tr>

                            {{-- @forelse ($products as $product)
                                <tr>
                                    <th>{{ $product->id }}</th>
                                    <th>{{ $product->name }}</th>
                                    <th>{{ $product->price }} USD</th>
                                    <th>{{ $product->price_eur }} EUR</th>
                                    <th>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('products.destroy', $product->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </th>
                                </tr>
                            @empty
                                <tr>{{ __('No products found') }}</tr>
                            @endforelse --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
