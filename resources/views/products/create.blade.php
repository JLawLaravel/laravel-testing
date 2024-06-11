<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <input class="w-100 border-none" type="text" name="name"
                                                id="name" placeholder="Enter product name" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="w-100 border-none" type="text" name="price"
                                                id="price" placeholder="Enter product price" required>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <x-secondary-button><a href="{{ route('products.index') }}">Cancel</a></x-secondary-button>
                        <x-primary-button type="submit">Add product</x-primary-button>
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
