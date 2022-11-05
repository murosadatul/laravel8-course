<?php

namespace App\Http\Controllers\Admin\IntegrationAPI;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Controllers\Base\AdminBaseController;
use App\ApiIntegration;

class QuestionController extends AdminBaseController
{
    protected $API;

    public function __construct()
    {
        // check user login auntetication
        $this->middleware('auth');
        $this->API = new ApiIntegration();
    }

    public function fetch()
    {
        $response = $this->API->createSignatureQuizapi('questions');
        $quizzes = json_decode($response);

        dd($quizzes);
        die();

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
