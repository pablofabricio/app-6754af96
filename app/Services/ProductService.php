<?php

namespace App\Services;

use Illuminate\Http\Request;

use App\Repositories\ProductRepository;

class ProductService 
{
    /**
     * @name productRepository
     * @access private 
     * @var productRepository
     */
    private $productRepository;

    /**
     * ProductService Contructor
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
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
}