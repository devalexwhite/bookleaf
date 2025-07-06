<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBookmarkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'url' => 'required|max:1024|url:http,https',
            'image_url' => 'max:1024|url:http,https|nullable',
            'description' => 'max:200|nullable',
            'author' => 'max:200|nullable',
            'name' => 'max:200|nullable',
            'notes' => 'max:1024|nullable',
            'tags' => 'max:1024|nullable',
            'folder' => 'max:100|nullable',
        ];
    }
}
