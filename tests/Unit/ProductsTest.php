<?php

use App\Models\Product;
use Tests\TestCase;

// class ProductsTest extends TestCase
// {
//     public function test_homepage_contains_empty_table(): void
//     {
//         $response = $this->get('/products');
 
//         $response->assertStatus(200);
//         $response->assertJson(['data' => []]);
//     }
 
//     public function test_homepage_contains_non_empty_table(): void 
//     {
//         Product::create([
//             'name'  => 'Product 1',
//             'price' => 123,
//         ]);
 
//         $response = $this->get('/products');
 
//         $response->assertStatus(200);
//         $response->assertDontSee(__('No products found'));
//     } 
// }

