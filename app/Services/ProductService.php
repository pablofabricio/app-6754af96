<?php

namespace App\Services;

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
     * Product Movement
     * 
     * @param object $data
     */
    public function productMovement($data)
    {
        $data->product = $this->findWhereProduct([['sku', '=', $data->sku]]);
        if($data->removal) {
            $product = $this->removalAmountProduct($data);
        } else {
            $product = $this->addAmountProduct($data);
        }
        $this->createProductHistory($data);
        return $product;
    }

    /**
     * Add Amount Product
     * 
     * @param object $data
     */
    public function addAmountProduct($data)
    {
        $attributes = ['amount' => ($data->product->amount + $data->amount)];
        $updatedProduct = $this->updateAmountProduct($attributes, $data->product->id);
        return $updatedProduct;
    }

    /**
     * Removal Amount Product
     * 
     * @param object $data
     */
    public function removalAmountProduct($data)
    {
        if($data->product->amount < $data->amount) {
            throw new Exception("The amount to be removed is greater than the amount of the chosen product.", 400);
        } else {
            $attributes = ['amount' => ($data->product->amount - $data->amount)];
            $updatedProduct = $this->updateAmountProduct($attributes, $data->product->id);
            return $updatedProduct;
        }
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
            'removal'      => (boolean) $data->removal,
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