<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only'=>['index']]);
    }

    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedbacks.index', compact('feedbacks'));
    }

    public function store(Request $request)
    {
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
