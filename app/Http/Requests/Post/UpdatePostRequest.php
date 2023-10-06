<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->post);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255,unique:posts,slug,' . request()->post->slug,
            'summary' => 'required|min:3',
            'content' => 'required',
            'published' => ''
        ];
    }
}
