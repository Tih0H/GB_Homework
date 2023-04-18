<?php

namespace App\Http\Requests\Admin\News;

use App\Enums\NewsStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EditRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_ids' => ['required', 'array'],
            'title' => ['required', 'string', 'min:2', 'max:200'],
            'author' => ['nullable', 'string', 'min:2', 'max:30'],
            'description' => ['nullable'],
            'status' => [new Enum(NewsStatus::class)],
            'image' => ['sometimes'],
            'source_id' => ['nullable', 'numeric']
        ];
    }
    public function getCategories():array
    {
        return (array) $this->validated('category_ids');
    }
}
