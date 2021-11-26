<?php

namespace App\Services;

use Illuminate\Http\Request;
use Exception;

use App\Repositories\ProductRepository;
use App\Repositories\ProductHistoryRepository;

class ProductService 
{
    /**
     * @name productRepository
     * @access private 
     * @var productRepository
     */
    private $productRepository;

    /**
     * @name productHistoryRepository
     * @access private 
     * @var productHistoryRepository
     */
    private $productHistoryRepository;

    /**
     * ProductService Contructor
     * @param ProductRepository $productRepository
     * @param ProductHistoryRepository $productHistoryRepository
     */
    public function __construct(ProductRepository $productRepository, ProductHistoryRepository $productHistoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->productHistoryRepository = $productHistoryRepository;
    }

    /**
     * Create a new product
     * 
     * @param object $data
     */
    public function create($data)
    {
        return $this->productRepository->create($data);
    }
  
    /**
     * Add amount product
     * 
     * @param object $data
     */
    public function addAmountProduct($data)
    {
        // uptate product
        $product = $this->findWhereProduct([['sku', '=', $data->sku]]);
        $attributes = ['amount' => ($product->amount + $data->amount)];
        $updatedProduct = $this->updateAmountProduct($attributes, $product->id);
        
        // create product history
        $product->removal = false;
        $product->amount = $data->amount;
        $this->createProductHistory($product);
        
        return $updatedProduct;
    }

    /**
     * Create product history
     * 
     * @param object $data
     */
    private function createProductHistory($data)
    {
        $attributes = [
            'sku'          => $data->sku,
            'removal'      => $data->removal,
            'creationDate' => date('Y/m/d H:i:s'),
            'amount'       => $data->amount,
        ];
        $this->productHistoryRepository->create($attributes);
    }

    /**
     * Update Amount product
     * 
     * @param array $attributes
     * @param int $id
     */
    private function updateAmountProduct($attributes, $id)
    {
        $update = $this->productRepository->update($attributes, $id)->first();
        if(empty($update)) {
            throw new Exception("Error updating product.", 400);
        } else {
            return $update;
        }
    }

    /**
     * Find Where - product
     * 
     * @param array $condition
     */
    public function findWhereProduct($condition)
    {
        $product = $this->productRepository->findWhere($condition)->first();
        if(empty($product)) {
            throw new Exception("No products found.", 404);
        } else {
            return $product;
        }
    }
}