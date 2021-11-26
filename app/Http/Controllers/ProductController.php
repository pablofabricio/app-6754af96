<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Api\CreateProductRequest;
use App\Http\Requests\Api\ProductMovementRequest;

use App\Http\Resources\ProductResource;

use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * @name productService
     * @access private 
     * @var productService
     */
    private $productService;

    /**
     * ProductController Contructor
     * @param productService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Create a new product
     * 
     * @Post("product")
     * 
     * @param CreateProductRequest $request
     */
    public function create(CreateProductRequest $request)
    {
        return new ProductResource($this->productService->create($request->all()));
    }

    /**
     * Product Movement
     * 
     * @Put("productMovement")
     * 
     * @param ProductMovementRequest $request
     */
    public function productMovement(ProductMovementRequest $request)
    {
        $data = (object) $request->all();
        return new ProductResource($this->productService->ProductMovement($data));
    }
}
