<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
        $taskModel = new TaskModel();

        $data = [
            'tasks' => $taskModel->getTodayTasks(),
            'today'  => date('Y-m-d')
        ];

        return view('home', $data);
    }
}