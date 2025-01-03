<?php

namespace App\Repositories;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Collection;

class TaskRepository extends BaseRepository{
    
  function __construct(Task $model){
    parent::__construct($model);
  } 

  function getTasksByEmployee($id)
    {
        return $this->newQuery()
            ->where('assigned_to', $id)
            ->get();
    }
    public function count(): int
    {
        return $this->newQuery()->count();
    }
    public function getRecentTasks(int $limit)
    {
        return $this->newQuery()
            ->with(['project', 'assignedUser'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->paginate(5);
    }

    public function getCreatedByUsers()
    {
        return User::where('role', 'creator')->get(); // Example logic
    }

    public function getUpdatedByUsers()
    {
        return User::where('role', 'updater')->get(); // Example logic
    }

    public function getAssignedUsers()
    {
        return User::where('role', 'assigned')->get(); // Example logic
    }

    public function getAllProjectsWithRelations()
    {
        return $this->newQuery()->with(['createdBy', 'updatedBy', 'assignedUser'])->paginate(10);
    }


}