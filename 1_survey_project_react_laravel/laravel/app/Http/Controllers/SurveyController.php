<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SurveyRequest;
use App\Models\Survey;

class SurveyController extends Controller
{
    // get survey
    public function get_survey () {
        $data = Survey::all();
        return $data;
    }

    // get survey by id
    public function get_survey_by_id ($id) {
        $data = Survey::find($id);
        // $data->answer;
        return $data;
    }

    // post survey
    public function post_survey (SurveyRequest $request) {
    	$data = json_decode($request->getContent(), true);
    	print_r($data);

    	$total = $data['question_1'] + $data['question_2'] + $data['question_3'] + $data['question_4'] + $data['question_5'] + $data['question_6'] + $data['question_7'];

    	$survey = new Survey();
    	$survey->name = $data['name'];
    	$survey->country = $data['country'];
    	$survey->age = $data['age'];

    	$survey->q1 = $data['question_1'];
    	$survey->q2 = $data['question_2'];
    	$survey->q3 = $data['question_3'];
    	$survey->q4 = $data['question_4'];
    	$survey->q5 = $data['question_5'];
    	$survey->q6 = $data['question_6'];
    	$survey->q7 = $data['question_7'];
    	$survey->summ = $total;

    	$survey->save();

    	echo "Record added successfully";
    }
}
