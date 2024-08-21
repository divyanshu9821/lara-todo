<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\TasksModel;
use Response;

class TasksController extends Controller
{
    // list all the tasks
    public function get_tasks(){
        $tasks = TasksModel::select('*')->orderBy('status')->get();
        return Response::json($tasks, 200);
    } 

    // add new task
    public function add_task(Request $request){
        
        try{
            $validated_request = $request->validate([
                'task' => 'required'
            ]);
        }catch(Exception $ex){
            return Response::json(['error'=>'Request not validated'],400);
        }
        $task = $validated_request['task'];
        
        try{
            TasksModel::insert(['task'=>$task]);
            return Response::json(['success'=>'data inserted successfully'],200);
        }
        catch(Exception $ex){
            return Response::json($ex,400);
        }
    }


    // mark the task done
    public function done_task(Request $request){
        $id = $request->validate(['id'=>'int'])['id'];
        TasksModel::where(['id' => $id])->update(['status'=>1]);
    }

    // delete a task
    public function delete_task(Request $request){
        $id = $request->validate(['id'=>'int'])['id'];
        TasksModel::where(['id' => $id])->delete();
    }
}
