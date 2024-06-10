<?php

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

use function Pest\Laravel\get;

it('homepage contains empty table', function () {
    get('/products')
        ->assertStatus(200)
        ->assertSee(__('No products found'));
});

it('homepage contains non empty table', function () {  
    $product = Product::create([
        'name'  => 'Product 1',
        'price' => 123,
    ]);

    get('/products')
        ->assertStatus(200)
        ->assertDontSee(__('No products found'))
        ->assertSee($product->name)
        ->assertSee($product->price)
        ->assertViewHas('products', function (Collection $collection) use ($product) {
            return $collection->contains($product);
        }); 
}); 
