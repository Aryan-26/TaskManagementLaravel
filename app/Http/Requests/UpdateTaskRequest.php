<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $taskId = $this->route('task')->id; // Get the task ID from the route parameter
    
        return [
            'name' => 'required|string|max:255|unique:tasks,name,' . $taskId,
            'description' => 'required|string',
            'status' => ['required', new Enum(StatusEnum::class)],
            'project_id' => 'required|exists:projects,id',
            'assigned_to' => 'nullable|exists:users,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ];
    }
    

    /**
     * Get the fields that should be updated in the database.
     *
     * @return array
     */
    public function getUpdateableFields(): array
    {
        return [
            'name' => $this->input('name'),
            'description' => $this->input('description'),
            'status' => $this->input('status'),
            'project_id' => $this->input('project_id'),
            'assigned_to' => $this->input('assigned_to'),
            'updated_by' => Auth::id(),
            'start_date' => $this->input('start_date'),
            'end_date' => $this->input('end_date'),
        ];
    }
}
