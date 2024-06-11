<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product: {{ $product->name }}
        </h2>
    </x-slot>
    <div>
        <form action="/products/{{ $product->id }}" method="post">
            @csrf
            @method('PUT')

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">PRICE (USD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <input class="w-100 border-none" type="text" name="name"
                                                    id="name" value="{{ $product->name }}">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input class="w-100 border-none" type="text" name="price"
                                                    id="price" value="{{ $product->price }}">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @if (auth()->user()->is_admin)
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="{{ route('products.index') }}">
                                            <x-secondary-button>Cancel</x-secondary-button>
                                        </a>

                                        <x-primary-button class="btn btn-primary">Update
                                            Product</x-primary-button>
                                    </div>
                                    <div>
                                        <x-danger-button form="delete-form" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</x-danger-button>

                                    </div>
                                </div>
                            @endif
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
        <form action="/products/{{ $product->id }}" method="post" class="hidden" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-app-layout>
