<?php

namespace App\Http\Requests\Api;

class ProductMovementRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sku'     => 'required',
            'amount'  => 'required|integer',
            'removal' => 'required|boolean'
        ];
    }
}
