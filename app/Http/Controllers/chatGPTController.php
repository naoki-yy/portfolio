<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Models\Gpt;
use OpenAI;

class chatGPTController extends Controller
{
    public function generate(Request $request)
    {
        $gpt = new Gpt;
        $placeNames = Post::pluck('area')->toArray();
        $gpt->sentence = $request->sentence;
        // バリデーション
        $request->validate([
            'sentence' => 'required',
        ]);

        $gpt->sentence = $request->sentence;

        $sentence = $request->input('sentence');

        $yourApiKey = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($yourApiKey);

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'max_tokens' => 50,
            'messages' => [
                ['role' => 'system', 'content' => '質問文に関連する日本の観光名所を都市の名前でかつ１つのみかつ日本語かつ単語で教えて。説明文は不要です。'],
                ['role' => 'user', 'content' => $sentence],
            ],
        ]);

        $response_text = $response['choices'][0]['message']['content'];
        $areaPosts = Post::where('area', 'LIKE', "%$response_text%")->paginate(4);

        
        return view('gpt.gptshow', compact('sentence','placeNames', 'response_text', 'areaPosts'));
    }
}
