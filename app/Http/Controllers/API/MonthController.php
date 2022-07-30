<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MonthCollection;
use App\Models\Month;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = Month::where('published',true)->orderBy('id','desc')->paginate(10);
        if ($months){
            return apiResponse(true,_('هناك شهور موجودة'),new MonthCollection($months));
        }else{
            return apiResponse(false,_('لا يوجد شهور'),[],401);
        }
    }

    public function lastMonths()
    {
        $months = [
            1 => Month::where(['grade_id'=>1,'published'=>true])->orderBy('id','desc')->first(),
            2 => Month::where(['grade_id'=>2,'published'=>true])->orderBy('id','desc')->first(),
            3 => Month::where(['grade_id'=>3,'published'=>true])->orderBy('id','desc')->first(),
        ];
        if ($months){
            return apiResponse(true,_('هناك شهور موجودة'),new MonthCollection($months));
        }else{
            return apiResponse(false,_('لا يوجد شهور'),[],401);
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
