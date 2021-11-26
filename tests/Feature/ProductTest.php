<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * @test
     * 
     * Test product creation
     *
     * @return void
     */
    public function testProductCreation()
    {
        $data = [
            'name'   => 'produto teste',
            'sku'    => '192sdee23',
            'amount' => 5 
        ];
        $response = $this->postJson('/product', $data);
        $response
            ->assertStatus(201)
            ->assertJson([
                'name'   => 'produto teste',
                'sku'    => '192sdee23',
                'amount' => 5
            ]);
    }
  
    /**
     * @test
     * 
     * Test product creation
     *
     * @return void
     */
    public function testProductAddition()
    {
        $data = [
            'sku'    => '192sdee23',
            'amount' => 5 
        ];
        $response = $this->putJson('/product', $data);
        $response->assertStatus(200);
    }
}
