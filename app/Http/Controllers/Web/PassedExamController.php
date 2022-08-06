<?php

namespace App\Http\Controllers;

use App\Models\PassedExam;
use App\Http\Requests\StorePassedExamRequest;
use App\Http\Requests\UpdatePassedExamRequest;

class PassedExamController extends Controller
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
     * @param  \App\Http\Requests\StorePassedExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePassedExamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PassedExam  $passedExam
     * @return \Illuminate\Http\Response
     */
    public function show(PassedExam $passedExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PassedExam  $passedExam
     * @return \Illuminate\Http\Response
     */
    public function edit(PassedExam $passedExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePassedExamRequest  $request
     * @param  \App\Models\PassedExam  $passedExam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePassedExamRequest $request, PassedExam $passedExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PassedExam  $passedExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(PassedExam $passedExam)
    {
        //
    }
}
