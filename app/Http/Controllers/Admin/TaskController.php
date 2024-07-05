<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\TaskRepositoryInterface;
use Validator;

class TaskController extends Controller
{
    public $task_repo;
    public function __construct(TaskRepositoryInterface $task_repo){
        $this->task_repo = $task_repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->task_repo->getAllTasks();
        return response()->json(['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages = [
            'title.required' => 'Title field is required.',
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>422,'errors'=>$messages]);
        }
        $data = $request->all(); 
        $tasks = $this->task_repo->saveTask($data);
        if($tasks == true){
            return response()->json(['message'=>'Tasks created successfully']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
