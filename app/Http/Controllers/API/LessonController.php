<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Resources\Lesson as LessonResource;


class LessonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit') <= 50 ? $request->input('limit') : 15;
        $lessons = LessonResource::collection(Lesson::paginate($limit));
        return $lessons->response()->setStatusCode(200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson = Lesson::create($request->all());

        return response()->json([
            'data' => $lesson,
            'message' => 'Lesson created successfully',
        ], 201);
    }

    public function show($id)
    {
        $lessons = new LessonResource(Lesson::all());
        return $lessons->response()->setStatusCode(200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Lesson = Lesson::findOrFail($id);
        $Lesson->update($request->all());

        return response()->json([
            'data' => $Lesson,
            'message' => 'Lesson updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();

        return response()->json(null, 204);
    }
}
