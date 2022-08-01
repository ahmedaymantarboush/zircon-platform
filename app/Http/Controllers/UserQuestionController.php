<?php

namespace App\Http\Controllers;

use App\Models\UserQuestion;
use App\Http\Requests\StoreUserQuestionRequest;
use App\Http\Requests\UpdateUserQuestionRequest;

class UserQuestionController extends Controller
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
     * @param  \App\Http\Requests\StoreUserQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserQuestion  $userQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(UserQuestion $userQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserQuestion  $userQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(UserQuestion $userQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserQuestionRequest  $request
     * @param  \App\Models\UserQuestion  $userQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserQuestionRequest $request, UserQuestion $userQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserQuestion  $userQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserQuestion $userQuestion)
    {
        //
    }
}
