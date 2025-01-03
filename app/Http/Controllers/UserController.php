<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Throwable;
use Inersia;
class UserController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        // $this->\App\Http\Middleware\RoleMiddleware('role:admin')->except(['index', 'show']);
    }

    public function index(): View
    {
        $users = $this->userRepository->getAll();
        // dd($users);
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user = $this->userRepository->getById($user->id);
        return view('users.show', compact('user'));
    }

    public function create(): View
    {
        
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->userRepository->store($request->getInsertableFields());
            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Added Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('users.create')->with('error', $e->getMessage());
        }
    }

    public function edit(User $user): View
    {
        $user = $this->userRepository->getById($user->id);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request,User $user)
    {
        // dd('eguguig');
        DB::beginTransaction();
        try {
            $this->userRepository->update($user->id, $request->getUpdateableFields());
            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Updated Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('users.edit', $user->id)->with('error', $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $this->userRepository->destroy($user->id);
            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Deleted Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
    }
}
