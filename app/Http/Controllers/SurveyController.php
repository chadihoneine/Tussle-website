<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Questions;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sid = $request->input("surveyID");
        $survey = DB::table('survey')
            ->select('*')
            ->where('surveyID', $sid)
            ->first();
        $questions = DB::table('questions')
            ->where('surveyID', $survey->surveyID)
            ->get();
        foreach ($questions as $q) {
            $test = DB::table('answer')
                ->select('*')
                ->where('questionID', $q->questionID)
                ->where('accountID', Auth::user()->accountID)
                ->first();
            if ($test == null) {
                DB::table('answer')->insert([
                    'accountID' => Auth::user()->accountID,
                    'questionID' => $q->questionID,
                    'answerValue' => $request->input($q->questionID)
                ]);
            }
        }
        return view('welcome');
    }

    /**
     * Display the specified resource.
     * @return Response
     */
    public function viewSurvey(int $id)
    {
        $survey = DB::table('survey')
            ->select('*')
            ->where('surveyID', $id)
            ->first();
        $questions = DB::table('questions')
            ->select('*')
            ->where('surveyID', $id)
            ->get();
//        print_r(explode(", ", $questions->choices));die();
//        $choices = array();
//        foreach ($questions as $q) {
//            $choices[] = explode(", ", $q->choices);
//        }
//        print_r($choices);die();
        return view('survey.survey', compact('survey', 'questions'));
    }

}
