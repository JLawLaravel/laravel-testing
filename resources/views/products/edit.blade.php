<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <form action="/products/{{ $product->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="d-flex justify-content-end mb-3">

                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">PRICE (USD)</th>
                                    <th scope="col">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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


                                        <x-primary-button href="#" class="btn btn-primary">Update
                                            Product</x-primary-button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <x-secondary-button><a href="{{ route('products.index') }}">Cancel</a></x-secondary-button>

                        <form action="/products/{{ $product->id }}" method="post" class="hidden" id="delete-form">
                            @csrf
                            @method('DELETE')
                            <x-danger-button href="{{ route('products.destroy', $product->id) }}"
                                class="btn btn-danger">Delete</x-danger-button>
                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
