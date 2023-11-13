<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function delete(Request $request, Lesson $lesson)
    {
        if( $request->user()->cannot('delete', $lesson) ){
            abort(Response::HTTP_FORBIDDEN);
        }

        $lesson->delete();

        return response()->noContent();
    }
}
