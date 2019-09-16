<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Responses;

class ResponsesController extends Controller
{
    public function store(Request $request) {

        $hash_path = Str::uuid()->toString();

        $this->validate($request, [
            'email.*'     => 'required|email',
            'answerA.*' => 'required',
            'answerB.*' => 'required|min:1|max:255',
            'answerC.*' => 'required|regex:/[1-5]/'
        ]);

        $responses = array_replace( $request->email, $request->answerA, $request->answerB, $request->answerC );
        ksort($responses);

        foreach ($responses as $key => $value) {
            Responses::create([
                'question_id'   => $key,
                'response'      => $value,
                'hash_path'     => $hash_path
            ]);
        }

        $message = "Toute l’équipe de <b>Bigscreen</b> vous remercie pour votre engagement. Grâce à
            votre investissement, nous vous préparons une application toujours plus
            facile à utiliser, seul ou en famille. <br>
            Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
            cette adresse: <br> <a href='".url("/$hash_path")."'/>" . url("/$hash_path") . "</a>";

        return redirect('/')->with( "success", $message );
    }
}
