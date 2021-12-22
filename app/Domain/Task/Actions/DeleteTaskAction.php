<?php

namespace Domain\Task\Actions;

use Domain\Task\Models\Task;
use Domain\Task\DataTransferObjects\TaskData;

final class DeleteTaskAction
{
    public function __invoke(TaskData $taskData): Task
    {
        return new Task();
    }
}
