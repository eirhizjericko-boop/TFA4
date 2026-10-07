<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    public function index(): string
    {
        $taskModel = new TaskModel();

        $data = [
            'tasks' => $taskModel->getAllTasks()
        ];

        return view('tasks', $data);
    }
}