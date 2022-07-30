<?php

namespace App\Http\Controllers;

use App\Models\MonthUser;
use App\Http\Requests\StoreMonthUserRequest;
use App\Http\Requests\UpdateMonthUserRequest;

class MonthUserController extends Controller
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
     * @param  \App\Http\Requests\StoreMonthUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonthUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonthUser  $monthUser
     * @return \Illuminate\Http\Response
     */
    public function show(MonthUser $monthUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonthUser  $monthUser
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthUser $monthUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonthUserRequest  $request
     * @param  \App\Models\MonthUser  $monthUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonthUserRequest $request, MonthUser $monthUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthUser  $monthUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthUser $monthUser)
    {
        //
    }
}
