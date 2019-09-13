<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|max:255|unique:books'. $this->id,
            'book_content' => 'required|min:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|max:8',
            'number_page' => 'required',
            'publisher_id' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('admin.validate.title_required'),
            'book_content.required'  => trans('admin.validate.book_content'),
            'image.required' => trans('admin.validate.image'),
            'price.required' => trans('admin.validate.price'),
            'number_page.required' => trans('admin.validate.number_page'),
            'publisher_id.required' => trans('admin.validate.publisher_id'),
            'category_id.required' => trans('admin.validate.category_id'),
        ];
    }
}
