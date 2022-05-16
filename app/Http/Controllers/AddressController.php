<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAddressRequest;
use App\Interfaces\AddressRepositoryInterface;

class AddressController extends Controller
{
    protected $address_repository;

    public function __construct(AddressRepositoryInterface $address_repository)
    {
        $this->address_repository = $address_repository;
    }

    public function add()
    {
        return view('address.add');
    }

    public function store(AddAddressRequest $request)
    {
        $this->address_repository->store($request->cep, $request->address_number);
        return view('address.processed');
    }
}
