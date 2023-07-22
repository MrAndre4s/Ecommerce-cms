<?php

namespace App\Http\Requests\Manufacturer;

use App\Enums\PostStatus;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|string',
            'post_status' => ['required', new EnumValue(PostStatus::class)],
            'published_at' => 'nullable|date|after:now'
        ];
    }
}
