<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CenterCollection;
use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::latest()->get();
        if ($centers){
            return apiResponse(true,_('تم العثور على مراكز تعليمية'),new CenterCollection($centers));
        }else{
            return apiResponse(false,_('لا يوجد مراكز تعليمية'),new CenterCollection($centers),401);
        }
    }

    public function centers()
    {
        $centers = Center::where('id','!=',1)->latest()->get();
        if ($centers){
            return apiResponse(true,_('تم العثور على مراكز تعليمية'),new CenterCollection($centers));
        }else{
            return apiResponse(false,_('لا يوجد مراكز تعليمية'),new CenterCollection($centers),401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
