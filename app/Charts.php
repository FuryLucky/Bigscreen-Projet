<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charts extends Model
{

    public static function pieChart(string $questionID) {
        $labels = Questions::availableAnswers($questionID)->pluck('available_answer');
        $labels = explode(", ", $labels[0]);

        $question = Questions::where('id', $questionID)->pluck('question');

        $responses = Responses::all()->where('question_id', $questionID)->groupBy('response');
        $datas = [];

        $colors = [];

        foreach ($labels as $key => $value) {
            $number = 0;

            if(isset($responses[$value])) {
                $number = $responses[$value]->count();
            }

            array_push( $datas, $number );
            array_push( $colors, "#".bin2hex(openssl_random_pseudo_bytes(3)) );
        }

        return array(
            "question_id" => $questionID, 
            "question" => $question[0], 
            "labels" => $labels, 
            "datas" => $datas, 
            "colors" => $colors
        );
    }

    public static function radarChart(array $questionsID) {

        $labels = [];
        $responses = [];

        foreach ($questionsID as $questionID) {
            array_push($labels, "Question n°" . $questionID);
            array_push($responses, Responses::all()->where('question_id', $questionID)->avg('response'));
        }

        return array("labels" => $labels, "datas" => $responses);
    }
    
}
