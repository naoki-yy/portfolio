<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'cover_image' => '',
            'day_count' => '',
            'title' => '',
            'concept' => '',
            'area' => '',
            'triptime' => '',
            'heading' => '',
            'body' => '',
            'traffic' => '',
            'traffic_detail' => '',

        ];
    }

    public function attributes()
    {
        return [
            'cover_image' => '背景画像',
            'day_count' => '日付',
            'title' => 'たびLogタイトル',
            'concept' => 'たびコンセプト',
            'area' => 'たびエリア',
            'triptime' => '時間',
            'heading' => '見出し',
            'body' => '内容',
            'traffic' => '交通手段',
            'traffic_detail' => '交通時間',
        ];
    }
}
