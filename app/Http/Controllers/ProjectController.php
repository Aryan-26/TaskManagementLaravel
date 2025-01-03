<?php
// namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class ProjectController extends BaseController
{
    protected $projectRepository;
    protected $userRepository;
    function __construct(ProjectRepository $projectRepository,UserRepository $userRepository){
      $this->projectRepository=$projectRepository;
      $this->userRepository=$userRepository;
    }
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectRepository->getAllProjectsWithRelations();
        
        // Fetch related users separately if needed
        $createdBy = $this->projectRepository->getCreatedByUsers();
        $updatedBy = $this->projectRepository->getUpdatedByUsers();
        $assignedUser = $this->projectRepository->getAssignedUsers();
        
        // dd($projects);
        return view('projects.index',compact('projects','createdBy','updatedBy','assignedUser'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = $this->projectRepository->getAllProjectsWithRelations();
        $clients=$this->userRepository->getAllClients();
        $employees=$this->userRepository->getAllEmployee();
        return view('projects.create' ,compact('clients', 'employees','projects')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {   
        DB::beginTransaction();
        try {
            $validatedData = $request->getInsertableFields();
            // dd($validatedData);
            $projects =  $this->projectRepository->store($validatedData);
          
            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Project created Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('projects.create')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects = $this->projectRepository->getById($id);
        return view('projects.show', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = $this->projectRepository->getById($id);
        $clients = $this->userRepository->getAllClients();
        $assignedUser = $this->projectRepository->getAssignedUsers();
        $employees = $this->userRepository->getAllEmployee();
       
        return view('projects.edit', compact('project','clients','assignedUser','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request,Project $project): RedirectResponse
    {
        // $validated = $request->validated();

        // $project = $this->projectRepository->getById($id);        
        DB::beginTransaction();
        try {
            $this->projectRepository->update($project->id, $request->getInsertableFields());
            if ($request->has('employee_ids') && !empty($request->employee_ids)) {
                $project->users()->sync($request->employee_ids);
            } else {
                $project->users()->detach();
            }
            
            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
           
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('projects.edit', $project->id)->with('error', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        
        // return redirect()->route('project.tasks')->with('message','Deleted Project');
        DB::beginTransaction();
        try {
            $project = $this->projectRepository->destroyByIds($project->id);
          
            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Project  Deleted Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('projects.index')->with('error', $e->getMessage());
        }

    }
}
