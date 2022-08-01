<?php

namespace App\Http\Controllers;

use App\Models\UserLesson;
use App\Http\Requests\StoreUserLessonRequest;
use App\Http\Requests\UpdateUserLessonRequest;

class UserLessonController extends Controller
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
     * @param  \App\Http\Requests\StoreUserLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserLessonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserLesson  $userLesson
     * @return \Illuminate\Http\Response
     */
    public function show(UserLesson $userLesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserLesson  $userLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLesson $userLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserLessonRequest  $request
     * @param  \App\Models\UserLesson  $userLesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserLessonRequest $request, UserLesson $userLesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserLesson  $userLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLesson $userLesson)
    {
        //
    }
}
