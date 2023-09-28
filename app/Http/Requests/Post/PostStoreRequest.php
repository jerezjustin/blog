<?php

declare(strict_types=1);

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:255',
            'slug' => 'required|unique:posts,slug|min:3|max:255',
            'summary' => 'required|min:3',
            'content' => 'required',
            'published' => ''
        ];
    }
}
