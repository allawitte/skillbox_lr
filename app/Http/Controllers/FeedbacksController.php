<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbacksController extends Controller
{
    public function index(){
        $feedbacks = Feedback::all();
        return view('feedbacks.index', compact('feedbacks'));
    }

    public function store(Request $request){
        $fields = request()->validate($request, [
            'name' => 'required|min:3|max:40',
            'email' => 'required',
            'message' => 'required'
        ]);
        Feedback::create(
            $fields
        );
        return redirect()->route('feedbacks');
    }
}
