<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'sku' => "required|unique:products,sku,{$this->product}",
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|numeric|min:0',
            'img' => 'sometimes|image',
        ];
    }
    public function messages()
    {
        return[
            'category_id.required' => 'không được trống'
        ];
    }
}
