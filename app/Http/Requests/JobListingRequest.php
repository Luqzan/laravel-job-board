<?php

namespace App\Http\Requests;

use App\Models\JobListing;
use Illuminate\Foundation\Http\FormRequest;

class JobListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|max:1000000',
            'description' => 'required|string',
            'experience' => 'required|in:'.implode(',', JobListing::$experience),
            'category' => 'required|in:'.implode(',', JobListing::$category),
        ];
    }
}
