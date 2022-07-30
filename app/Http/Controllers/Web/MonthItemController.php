<?php

namespace App\Http\Controllers;

use App\Models\MonthItem;
use App\Http\Requests\StoreMonthItemRequest;
use App\Http\Requests\UpdateMonthItemRequest;

class MonthItemController extends Controller
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
     * @param  \App\Http\Requests\StoreMonthItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonthItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonthItem  $monthItem
     * @return \Illuminate\Http\Response
     */
    public function show(MonthItem $monthItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonthItem  $monthItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthItem $monthItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonthItemRequest  $request
     * @param  \App\Models\MonthItem  $monthItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonthItemRequest $request, MonthItem $monthItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthItem  $monthItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthItem $monthItem)
    {
        //
    }
}
