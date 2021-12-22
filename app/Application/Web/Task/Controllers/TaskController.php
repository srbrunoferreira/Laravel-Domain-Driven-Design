<?php

namespace Application\Web\Task\Controllers;

use Application\Core\Http\Controllers\Controller;
use Domain\Task\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = app(Task::class)->get();

        return view('welcomem', compact('tasks'));
    }
}
