<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Http\Requests\StorePartRequest;
use App\Http\Requests\UpdatePartRequest;
use Illuminate\Support\Facades\Auth;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = request()->q;
        if ($q){
            $parts = Part::where('name', 'LIKE', "%{$q}%")->orWhere('description', 'LIKE', "%{$q}%")->get();
        }else{
            $parts = Part::all();
        }

        return view('Admin.parts', compact('parts'));
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
     * @param  \App\Http\Requests\StorePartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartRequest $request)
    {
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : false) {
            $part = new Part();
            $part->name = $request->name;
            $part->description = $request->description ?? null;
            $part->grade_id = $request->grade_id;
            $part->subject_id = $request->subject_id ?? env('DEFAULT_SUBJECT_ID');
            $part->user_id = $user->id;
            $part->save();
            return redirect()->back();
        }else{
            return abort(403);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePartRequest  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartRequest $request)
    {
        $data = json_decode($request->data,true);
        $id = $data['id'];
        $user = Auth::user();
        $part = Part::find($id);
        if ($user ? $user->role->number < 4 : false) {
            $part->name = $request->name;
            $part->description = $request->description ?? null;
            $part->grade_id = $request->grade_id;
            $part->subject_id = $request->subject_id ?? env('DEFAULT_SUBJECT_ID');
            $part->save();
            return redirect()->back();
        }else{
            return abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $data = json_decode(request()->data, true);
        $id = $data['id'];
        $user = Auth::user();
        $part = Part::find($id);
        if ($user ? $user->role->number < 4 : false) {
            $part->delete();
            return redirect()->back();
        }else{
            return abort(403);
        }
    }
}
