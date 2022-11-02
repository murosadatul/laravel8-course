<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{
    public function __construct()
    {
        // check user login auntetication
        $this->middleware('auth');
    }
    public function fetch()
    {
        $response = Http::get('https://quizapi.io/api/v1/questions', [
            'apiKey' => 'jrEBlHjyXA9W5vFNOyarIDInPoge7xqkTogvZZ8X',
            'limit' => 15,
        ]);

        $quizzes = json_decode($response->body());


        foreach($quizzes as $quiz)
        {
            $question = new Question;
            $question->question = $quiz->question;
            $question->answer_a = $quiz->answers->answer_a;
            $question->answer_b = $quiz->answers->answer_b;
            $question->answer_c = $quiz->answers->answer_c;
            $question->answer_d = $quiz->answers->answer_d;
            $question->save();
        }
        return "DONE";
    }
}
