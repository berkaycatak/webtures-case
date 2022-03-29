<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|max:255|min:3",
            "description" => "required|max:1500|min:3",
            "date" => "required|date",
            "website_url" => "required|url|max:255",
            "status" => "nullable"
        ];
    }

    public function attributes()
    {
        return [
            "title" => "Başlık",
            "description" => "Açıklama",
            "date" => "Başlangıç tarihi",
            "website_url" => "Website",
            "status" => "Proje durumu"
        ];
    }

}
