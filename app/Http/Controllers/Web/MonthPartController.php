<?php

namespace App\Http\Controllers;

use App\Models\MonthPart;
use App\Http\Requests\StoreMonthPartRequest;
use App\Http\Requests\UpdateMonthPartRequest;

class MonthPartController extends Controller
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
     * @param  \App\Http\Requests\StoreMonthPartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonthPartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonthPart  $monthPart
     * @return \Illuminate\Http\Response
     */
    public function show(MonthPart $monthPart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonthPart  $monthPart
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthPart $monthPart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonthPartRequest  $request
     * @param  \App\Models\MonthPart  $monthPart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonthPartRequest $request, MonthPart $monthPart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthPart  $monthPart
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthPart $monthPart)
    {
        //
    }
}
