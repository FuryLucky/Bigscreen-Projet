<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Responses;

class FrontController extends Controller
{
    
    public function index() {
        $questions = Questions::all();
        return view('front.index', ['questions' => $questions]);
    }

    public function question(string $hashPath) {
        $questions = Questions::all();
        $responses = Responses::hashPath($hashPath)->pluck('response', 'question_id');
        return view('front.answers', ['questions' => $questions, 'responses' => $responses]);
    }
}
