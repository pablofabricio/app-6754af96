<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
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
    public function testAddAmountProduct()
    {
        $data = [
            'sku'     => '354jhg',
            'amount'  => 5,
            'removal' => 0
        ];
        $response = $this->putJson('/productMovement', $data);
        $response->assertStatus(200);
    }

    /**
     * @test
     * 
     * Test product creation
     *
     * @return void
     */
    public function testRemoveAmountProduct()
    {
        $data = [
            'sku'     => '354jhg',
            'amount'  => 5,
            'removal' => 1
        ];
        $response = $this->putJson('/productMovement', $data);
        $response->assertStatus(200);
    }

    /**
     * @test
     * 
     * Test product creation
     *
     * @return void
     */
    public function testGetProductHistory()
    {
        $response = $this->get('/productHistory');
        $response->assertStatus(200);
    }
}
