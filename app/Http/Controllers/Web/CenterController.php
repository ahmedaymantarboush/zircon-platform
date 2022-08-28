<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Http\Requests\StoreCenterRequest;
use App\Http\Requests\UpdateCenterRequest;
use Illuminate\Support\Facades\Auth;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : false) {
            $centers = Center::all();
            return view('Admin.centers', compact('centers'));
        } else {
            return abort(404);
        }
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
     * @param  \App\Http\Requests\StoreCenterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCenterRequest $request)
    {
        $data = $request->all();
        $user = Auth::user();
        if (!$user) :
            return abort(401);
        endif;
        if ($user->role->number >= 4) :
            return abort(403);
        endif;

        $center = Center::create([
            'name' => $data['name'],
            'url' => $data['url'],
            'governorate_id' =>  $data['governorate']
        ]);

        if ($request->hasFile('image')) :
            $center->image = uploadFile($request, 'image', $center->name . $center->id);
            $center->save();
        endif;
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCenterRequest  $request
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCenterRequest $request)
    {
        $data = $request->all();
        $center = Center::find($data['id']);
        $user = Auth::user();
        if (!$user) :
            return abort(401);
        endif;
        if ($user->role->number >= 4) :
            return abort(403);
        endif;
        if (!$center):
            return abort(404);
        endif;

        $center->name = $data['newName'];
        $center->url = $data['newUrl'];
        $center->governorate_id =  $data['newGovernorate'];
        if ($request->hasFile('newImage')) :
            $center->image = uploadFile($request, 'newImage', $center->name . $center->id,explode('/storage/',$center->image)[1] ?? '');
            $center->save();
        endif;
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $data = request()->all();
        $center = Center::find($data['id']);
        $user = Auth::user();
        if (!$user) :
            return abort(401);
        endif;
        if ($user->role->number >= 4) :
            return abort(403);
        endif;
        if (!$center):
            return abort(404);
        endif;

        $center->delete();
        return redirect()->back();
    }
}
