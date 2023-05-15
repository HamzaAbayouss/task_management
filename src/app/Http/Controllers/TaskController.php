<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"       => "required",
            "description" => "required",
            "status"      => "required",
            "project_id"  => "required|exists:projects,id",
        ]);

        $task = new Task();
        $task->title       = $request->title;
        $task->description = $request->description;
        $task->status      = $request->status;
        $task->project_id  = $request->project_id;
        $task->save();

        return response()->json([
            "success" => true,
            "data"    => $task
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Task::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title"       => "required",
            "description" => "required",
            "status"      => "required",
            "project_id"  => "required|exists:projects,id",
        ]);

        $task = Task::find($id);
        $task->title       = $request->title;
        $task->description = $request->description;
        $task->status      = $request->status;
        $task->project_id  = $request->project_id;
        $task->save();

        return response()->json([
            "success" => true,
            "data"    => $task,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task ->delete();

        return response()->json([
            "success" => true,
            "message"    => 'Task have been successfully deleted',
        ]);
    }
}
