<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model 
{
    protected $table = 'product';
    
    protected $fillable = [
        'id',
        'name',
        'sku',
        'amount'
    ];

    public $timestamps = false;

}
