<?php

namespace App\Interfaces;


interface TaskRepositoryInterface{

    public function getAllTasks();
    public function saveTask(array $data);
    
}