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
            'image_url' => 'max:1024|url:http,https',
            'description' => 'max:200',
            'author' => 'max:200',
            'name' => 'max:200',
            'notes' => 'max:1024',
            'tags' => 'max:1024',
            'folder' => 'max:100',
        ];
    }
}
