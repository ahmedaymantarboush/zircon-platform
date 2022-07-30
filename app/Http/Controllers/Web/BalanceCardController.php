<?php

namespace App\Http\Controllers;

use App\Models\BalanceCard;
use App\Http\Requests\StoreBalanceCardRequest;
use App\Http\Requests\UpdateBalanceCardRequest;

class BalanceCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBalanceCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBalanceCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BalanceCard  $balanceCard
     * @return \Illuminate\Http\Response
     */
    public function show(BalanceCard $balanceCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BalanceCard  $balanceCard
     * @return \Illuminate\Http\Response
     */
    public function edit(BalanceCard $balanceCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBalanceCardRequest  $request
     * @param  \App\Models\BalanceCard  $balanceCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBalanceCardRequest $request, BalanceCard $balanceCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BalanceCard  $balanceCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceCard $balanceCard)
    {
        //
    }
}
