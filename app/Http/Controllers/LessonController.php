<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonRequest;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index()
    {
        return Lesson::all();
    }

    public function store(CreateLessonRequest $request)
    {
        $data = $request->validated();

        $lesson = Lesson::create([...$data, 'created_by' => $request->user()->id]);
     
        return $lesson;
    }
}
