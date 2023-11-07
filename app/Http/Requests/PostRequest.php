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
            'title' => 'max:255',
            'concept' => 'max:255',
            'area' => 'max:255',
            'recommendation_point1' => 'required|max:30',
            'recommendation_text1' => 'max:255',
            'recommendation_point2' => 'required|max:30',
            'recommendation_text2' => 'max:255',
            'recommendation_point3' => 'required|max:30',
            'recommendation_text3' => 'max:255',

        ];
    }

    public function attributes()
    {
        return [
            'cover_image' => '背景画像',
            'title' => 'たびLogタイトル',
            'concept' => 'たびコンセプト',
            'area' => 'たびエリア',
            'recommendation_point1' => 'おすすめポイント その１',
            'recommendation_text1' => 'おすすめポイント１の内容',
            'recommendation_image1' => '',
            'recommendation_point2' => 'おすすめポイント その２',
            'recommendation_image2' => '',
            'recommendation_text2' => 'おすすめポイント２の内容',
            'recommendation_point3' => 'おすすめポイント その３',
            'recommendation_image3' => '',
            'recommendation_text3' => 'おすすめポイント３の内容',
        ];
    }
}
