<?php

use App\Models\Product;

use function Pest\Laravel\get;

it('homepage contains empty table', function () {
    get('/products')
        ->assertStatus(200)
        ->assertJson(['data' => []]);
});

it('homepage contains non empty table', function () { 
    Product::create([
        'name'  => 'Product 1',
        'price' => 123,
    ]);
 
    get('/products')
        ->assertStatus(200)
        ->assertDontSee(__('No products found'));
}); 
