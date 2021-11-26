<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class ProductHistory extends Model 
{
    protected $table = 'productHistory';
    
    protected $fillable = [
        'id',
        'sku',
        'amount',
        'removal',
        'creationDate',
    ];

    public $timestamps = false;

}
