<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Responses;
use App\Charts;

class BackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $pieDatas = array(
            Charts::pieChart('6'), 
            Charts::pieChart('7'), 
            Charts::pieChart('10')
        );

        $radarDatas = Charts::radarChart(['11', '12', '13', '14', '15']);
        
        return view('back.index', ['pieDatas' => $pieDatas, 'radarDatas' => $radarDatas]);
    }

    
    public function questions() {
        $questions = Questions::all();

        return view('back.questionnaires', ['questions' => $questions]);
    }

    public function responses() {
        $questions = Questions::all();
        $responses = Responses::all();
        $hash_path = [];

        foreach($responses as $response) {
            $hash_path[$response->hash_path] = Responses::hashPath($response->hash_path)->pluck('response', 'question_id');
        }

        return view('back.responses', ['responses' => $hash_path, 'questions' => $questions]);
    }

}
