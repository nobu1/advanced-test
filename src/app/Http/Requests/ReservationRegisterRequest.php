<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRegisterRequest extends FormRequest
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
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => ['required'],
            // 'time' => ['required', 'date_format:H-i-s'],
            'number' => ['required', 'integer', 'min:1', 'max:50'],
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を選択してください',
            'date.date_format:Y-m-d' => 'YYYY-mm-dd型で入力してください',
            'time.required' => '時間を入力してください',
            // 'time.date_format:H-i-s' => 'HH:ii:ss型で入力してください',
            'number.required' => '予約人数を入力してください',
            'number.integer' => '予約人数は数値で入力してください',
            'number.min' => '予約人数は1人以上で入力してください',
            'number.max' => '予約人数は50人以下で入力してください',
        ];
    }
}
