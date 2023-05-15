<?php

namespace App\Http\Controllers;

use App\Models\TaskUser;
use Illuminate\Http\Request;

class TaskUserController extends Controller
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
            "task_id"    => "required|exists:tasks,id",
            "user_id"    => "required|exists:users,id",
        ]);

        $task_user = new TaskUser();
        $task_user->task_id    = $request->task_id;
        $task_user->user_id    = $request->user_id;
        $task_user->save();

        return response()->json([
            "success" => true,
            "data"    => $task_user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskUser  $taskUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskUser = TaskUser::find($id);
        $taskUser ->delete();

        return response()->json([
            "success" => true,
            "message"    => 'TaskUser have been successfully deleted',
        ]);
    }
}
