<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ListingStoreRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "image" => ['required', 'image', 'max:3000'],
            "thumbnail_image" => ['required', 'image', 'max:3000'],
            "title" => ['required', 'string', 'max:255', 'unique:listings,title'],
            'category' => ['required', 'integer'],
            'location' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'website' => ['nullable', 'url'],
            'facebook_link' => ['nullable', 'url'],
            'twitter_link' => ['nullable', 'url'],
            'linkedin_link' => ['nullable', 'url'],
            'whatsapp_link' => ['nullable', 'url'],
            'file' => ['nullable', 'mimes:png,jpg,csv,pdf'],
            'google_map_embed_code' => ['nullable'],
            'description' => ['required'],
            'amenities.*' => ['nullable', 'integer'],
            "seo_title" => ['nullable', 'string', 'max:255'],
            "seo_description" => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'is_verified' => ['required', 'boolean'],
            'is_featured' => ['required', 'boolean'],

        ];
    }
}
