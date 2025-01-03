<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Throwable;

class TaskController extends BaseController
{
    protected TaskRepository $taskrepository;
    protected UserRepository $userRepository;
    protected ProjectRepository $projectRepository;

    public function __construct(TaskRepository $taskrepository,UserRepository $userRepository,ProjectRepository $projectRepository)
    {
        $this->taskrepository = $taskrepository;
        $this->userRepository = $userRepository;
        $this->projectRepository = $projectRepository;
    }


    public function index(): View
    {
        $tasks = $this->taskrepository->getAllProjectsWithRelations();
        $projects = $this->projectRepository->getAllProjectsWithRelations();

        $createdBy = $this->projectRepository->getCreatedByUsers();
        $updatedBy = $this->projectRepository->getUpdatedByUsers();
        $assignedUser = $this->projectRepository->getAssignedUsers();
        return view('tasks.index', compact('tasks','projects','createdBy','updatedBy','assignedUser'));
    }
    public function show(Task $task)  {
        $task= $this->taskrepository->getById($task->id);
        return view('tasks.show', compact('task'));
    }
    public function create(): View
    {
        $employees = User::where('role', 'employee')->get();
        $projects = Project::all();
        return view('tasks.create', compact('employees', 'projects'));
    }

    public function store(StoreTaskRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->taskrepository->store($request->getInsertableFields());
            DB::commit();
            return redirect('/profile')->with('success', 'Task Added Succesfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('tasks.create')->with('error', $e->getMessage());
        }
    }
    public function edit(Task $task): View
    {
        $task = $this->taskrepository->getById($task->id);
        $employees = $this->userRepository->getAllEmployee();
        $projects = $this->projectRepository->getAll();
        return view('tasks.edit', compact('task','projects','employees'));
    }

    public function update(Task $task, UpdateTaskRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->taskrepository->update($task->id, $request->getUpdateableFields());
            DB::commit();
            return redirect()->route('tasks.index')->with('success', 'Task Updated Succesfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect('tasks.update')->with('error', $e->getMessage());
        }
    }
    public function destroy(Task $task)
    {
        DB::beginTransaction();
        try {
            $this->taskrepository->destroy($task->id);
            DB::commit();
            return redirect('profile.index')->with('success', 'Task Deleted Succesfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect('tasks.update')->with('error', $e->getMessage());
        }
    }
}
