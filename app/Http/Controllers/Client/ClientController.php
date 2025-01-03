<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseController;
use App\Repositories\ClientDetailRepository;
use Illuminate\Routing\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ClientController extends BaseController
{
   protected $userRepository;
   protected $clientDetailRepository;
    function __construct(UserRepository $userRepository,ClientDetailRepository $clientDetailRepository){
        $this->clientDetailRepository = $clientDetailRepository;
        return $this->userRepository = $userRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=$this->userRepository->getAllClients();
        $clientDetails = $this->clientDetailRepository->getAll();
        return view('client/index' , compact('clients','clientDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('client.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
