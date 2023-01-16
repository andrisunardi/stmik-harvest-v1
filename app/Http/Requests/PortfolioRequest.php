<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'portfolio_category_id' => [
                'nullable',
                'integer',
                'exists:portfolio_categories,id',
            ],
        ];
    }
}
