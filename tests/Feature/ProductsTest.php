<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\getJson;

beforeEach(function () {
    $this->user = User::factory()->create();
});

function asAdmin(): TestCase
{
    $user = User::factory()->create([
        'is_admin' => true,
    ]);
 
    return test()->actingAs($user);
}

it('homepage contains empty table', function () {
    actingAs($this->user)
        ->get('/products')
        ->assertStatus(200)
        ->assertSee(__('No products found'));
});

it('homepage contains non empty table', function () {  
    $product = Product::create([
        'name'  => 'Product 1',
        'price' => 123,
    ]);

    actingAs($this->user)
        ->get('/products')
        ->assertStatus(200)
        ->assertDontSee(__('No products found'))
        ->assertSee($product->name)
        ->assertSee($product->price)
        ->assertViewHas('products', function (LengthAwarePaginator $collection) use ($product) { 
            return $collection->contains($product);
        }); 
}); 

it('paginated products table doesnt contain 11th record', function () { 
    $products = Product::factory(11)->create(); 
    $lastProduct = $products->last();
 
    actingAs($this->user)
        ->get('/products')
        ->assertStatus(200)
        ->assertViewHas('products', function (LengthAwarePaginator $collection) use ($lastProduct) {
            return $collection->doesntContain($lastProduct);
        });
});

test('admin can see products create button', function () {
    asAdmin() 
        ->get('/products')
        ->assertStatus(200)
        ->assertSee('Add new product');
});
 
test('non admin cannot see products create button', function () {
    actingAs($this->user)
        ->get('/products')
        ->assertStatus(200)
        ->assertDontSee('Add new product');
});

test('create product successful', function ($product) {
    asAdmin()
        ->post('/products', $product)
        ->assertStatus(302)
        ->assertRedirect('products');
 
    // Checks whether the record exists in a certain DB table
    $this->assertDatabaseHas('products', $product);
 
    $lastProduct = Product::latest()->first();
    
    expect($product['name'])->toBe($lastProduct->name) 
        ->and($product['price'])->toBe($lastProduct->price);
})->with('products');

test('product edit contains correct values', function ($product) {
    // $product = Product::factory()->create();
 
    asAdmin()->get('products/' . $product->id . '/edit')
        ->assertStatus(200)
        ->assertSee('value="' . $product->name . '"', false) 
        ->assertSee('value="' . $product->price . '"', false)
        ->assertViewHas('product', $product);; 
})->with('create product');

test('product update validation error redirects back to form', function ($product) {
    // $product = Product::factory()->create();
 
    asAdmin()->put('products/' . $product->id, [
        'name' => '',
        'price' => ''
    ])
        ->assertStatus(302) 
        ->assertInvalid(['name', 'price'])
        ->assertSessionHasErrors(['name', 'price']); 
})->with('create product');

test('product delete successful', function () {
    $product = Product::factory()->create();
 
    asAdmin()
        ->delete('products/' . $product->id)
        ->assertStatus(302)
        ->assertRedirect('products');

    $this->assertDatabaseMissing('products', $product->toArray()); 
    $this->assertDatabaseCount('products', 0); 

    $this->assertModelMissing($product); 
    $this->assertDatabaseEmpty('products'); 
}); 
