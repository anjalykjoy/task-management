<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Auth;

class TaskRepository implements TaskRepositoryInterface{

    public function getAllTasks(){
        //Task Controller : Only manage your own task 
        $tasks = Task::where(['created_by'=> Auth::id])->get();
        return $tasks;
    }
    public function saveTask($data){
            $task = new Task;
            $task->title = $data['title'];
            $task->description = $data['description'];
            $task->status = $data['status'];
            $task->created_by = Auth::id;
            $task->save();
            return true;
    }
}