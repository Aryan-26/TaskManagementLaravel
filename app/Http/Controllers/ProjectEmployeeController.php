<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectEmployeeRepository;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\ProjectEmployee;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Throwable;

class ProjectEmployeeController extends Controller
{
    protected ProjectEmployeeRepository $projectEmployeerepository;

    public function __construct(ProjectEmployeeRepository $projectEmployeerepository)
    {
        $this->projectEmployeerepository = $projectEmployeerepository;
    }


    public function index(): View
    {
        $projects = $this->projectEmployeerepository->getAll();
        return view('projects.index', compact('projects'));
    }
    public function show(ProjectEmployee $projectEmployee)
    {
        $projectEmployee = $this->projectEmployeerepository->getById($projectEmployee->id);
        return view('projects.show', compact('projectEmployee'));
    }
    public function create(): View
    {
        return view('projects.create');
    }


    public function edit(ProjectEmployee $projectEmployee): View
    {
        $GetProjectEmployee = $this->projectEmployeerepository->getById($projectEmployee->id);
        return view('projects.edit', compact('GetProjectEmployee'));
    }

    public function store(StoreClientRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->projectEmployeerepository->store($request->getInsertableFields());
            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Project Employee Added Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('projects.create')->with('error', $e->getMessage());
        }
    }
    
    public function update(ProjectEmployee $projectEmployee, UpdateClientRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->projectEmployeerepository->update($projectEmployee->id, $request->getInsertableFields());
            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Project Employee Updated Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('projects.edit', $projectEmployee->id)->with('error', $e->getMessage());
        }
    }
    
    public function destroy(ProjectEmployee $projectEmployee)
    {
        DB::beginTransaction();
        try {
            $this->projectEmployeerepository->destroy($projectEmployee->id);
            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Project Employee Deleted Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('projects.index')->with('error', $e->getMessage());
        }
    }
    
}
