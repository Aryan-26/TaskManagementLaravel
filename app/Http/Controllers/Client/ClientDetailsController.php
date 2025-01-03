<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseController;
use Illuminate\Routing\Controller;

use App\Models\ClientDetail;
use App\Repositories\ClientDetailRepository;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Throwable;

class ClientDetailsController extends BaseController
{
    protected ClientDetailRepository $clientDetailRepository;
    protected UserRepository $userRepository;

    public function __construct(ClientDetailRepository $clientDetailRepository ,UserRepository $userRepository)
    {
        $this->clientDetailRepository = $clientDetailRepository;
        $this->userRepository = $userRepository;
    }

    public function index(): View
    {
        $clientDetails = $this->clientDetailRepository->getPaginate(10);

        return view('clientDetails.index', compact('clientDetails'));
    }

    public function show(ClientDetail $clientDetail)
    {
        // $clientDetail = $this->clientDetailRepository->getById($clientDetail->id);
        return view('clientDetails.show', compact('clientDetail'));
    }

    public function create(): View
    {
        $clientDetails = $this->userRepository->getAllClients();
        return view('clientDetails.create', compact('clientDetails'));
    }

    public function store(StoreClientRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->userRepository->store($request->getInsertTableField());
            $this->clientDetailRepository->store($request->getInsertTableField2());
            
            DB::commit();
            return redirect()->route('client.index')->with('success', 'Client Detail Added Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('clientDetails.create')->with('error', $e->getMessage());
        }
    }

    public function edit(ClientDetail $clientDetail): View
    {
        $clientDetail = $this->clientDetailRepository->getById($clientDetail->id);
        return view('clientDetails.edit', compact('clientDetail'));
    }

    public function update(ClientDetail $clientDetail, UpdateClientRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->clientDetailRepository->update($clientDetail->id, $request->getInsertableFields());
            DB::commit();
            return redirect()->route('clientDetails.index')->with('success', 'Client Detail Updated Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('clientDetails.edit', $clientDetail->id)->with('error', $e->getMessage());
        }
    }

    public function destroy(ClientDetail $clientDetail)
    {
        DB::beginTransaction();
        try {
            $this->clientDetailRepository->destroy($clientDetail->id);
            DB::commit();
            return redirect()->route('clientDetails.index')->with('success', 'Client Detail Deleted Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('clientDetails.index')->with('error', $e->getMessage());
        }
    }
}
