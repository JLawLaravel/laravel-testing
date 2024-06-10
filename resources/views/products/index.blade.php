@forelse ($products as $product)
    <h3>{{$product->name}}</h3>
    <p>{{$product->price}}</p>
@empty
    <p>{{ __('No products found') }}</p>
@endforelse