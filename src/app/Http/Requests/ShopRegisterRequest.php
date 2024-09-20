<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRegisterRequest extends FormRequest
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
            'shop' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'summary' => ['required'],
            'img_url' => ['required', 'string', 'max:2083'],
        ];
    }

    public function messages()
    {
        return [
            'shop.required' => '店舗名を入力してください',
            'shop.string' => '店舗名を文字列で入力してください',
            'shop.max' => '店舗名を255文字以下で入力してください',
            'area.required' => '地域を入力してください',
            'area.string' => '地域を文字列で入力してください',
            'area.max' => '地域を255文字以下で入力してください',
            'genre.required' => 'ジャンルを入力してください',
            'genre.string' => 'ジャンルを文字列で入力してください',
            'genre.max' => 'ジャンルを255文字以下で入力してください',
            'summary.required' => '店舗概要を入力してください',
            'img_url.required' => '画像URLを入力してください',
            'img_url.string' => '画像URLを文字列で入力してください',
            'img_url.max' => '画像URLは2083文字以下で入力してください',
        ];
    }
}
