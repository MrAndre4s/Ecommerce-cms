<?php

namespace App\Http\Requests\Product;

use App\Enums\PostStatus;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|required',
            'content' => 'string|nullable',
//            'attachment_id' => '',
            'post_status' => [new EnumValue(PostStatus::class)],
            'manufacturer_id' => 'numeric|nullable',
            'product_category_id' => 'numeric|nullable',
            'sku' => ['string', 'required', Rule::unique('products')->ignore($this->route('product'))],
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'nullable|numeric',
            'rating' => 'nullable|numeric',
            'is_recommended' => 'boolean|nullable',
            'product_characteristics' => 'nullable|array',
//            'product_characteristics.*.product_characteristic_id' => 'nullable',
//            'product_characteristics.*.value' => 'nullable',
            'product_tags' => 'nullable|array'
        ];
    }
}
