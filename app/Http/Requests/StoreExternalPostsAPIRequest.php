<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExternalPostsAPIRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('store', $this->route(ExternalPostsAPI::class));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'url' => 'required|url',
            'call_type' => 'required|string|in:GET,POST',
            'params' => 'nullable|string',
            'source' => 'nullable|string',
            'description' => 'required|string',
        ];
    }
}
