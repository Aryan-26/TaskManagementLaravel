<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\BaseController;
use Illuminate\Routing\Controller;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\TaskRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{
    protected UserRepository $userRepository;
    protected TaskRepository $taskRepository;
    protected ProjectRepository $projectRepository;
    public function __construct(UserRepository $userRepository, TaskRepository $taskRepository,ProjectRepository $projectRepository)
    {
        $this->userRepository=$userRepository;
        $this->taskRepository = $taskRepository;
        $this->projectRepository = $projectRepository;
    }
    public function show(): View{
        return view('employee.dashboard');
    }
    public function index(){

        $employees=$this->userRepository->getAllEmployee();
        // dd($employees);
        return view('employee.index' , compact('employees'));
    }
    public function tasks(User $user){
        $tasks=$this->taskRepository->getTasksByEmployee($user->id);
        return view('employee.tasks', compact('tasks'));
    }
    public function projects(User $user){
        $tasks=$this->projectRepository->getProjectsByEmployee($user->id);
        return view('employee.tasks', compact('tasks'));
    }
}
