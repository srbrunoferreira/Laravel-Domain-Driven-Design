<?php

namespace Domain\Task\DataTransferObjects;

final class TaskData
{
    /**
     * @param TaskRequest $taskRequest
     * @return TaskData
     */
    public static function fromRequest(TaskRequest $taskRequest): TaskData
    {
        return new self([
            'task' => $taskRequest->task,
            'category' => $taskRequest->category,
        ]);
    }
}
