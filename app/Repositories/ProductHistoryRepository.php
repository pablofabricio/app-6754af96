<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

use App\Entities\ProductHistory;

/**
 * Class ProductHistoryRepository.
 *
 * @package namespace App\Repositories;
 */
class ProductHistoryRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductHistory::class;
    }
}
