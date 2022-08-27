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
        $centers = Center::rderBy('id','desc')->get();
        if ($centers){
            return apiResponse(true,_('تم العثور على مراكز تعليمية'),new CenterCollection($centers));
        }else{
            return apiResponse(false,_('لا يوجد مراكز تعليمية'),new CenterCollection($centers),401);
        }
    }

    public function centers()
    {
        $centers = Center::where('id','!=',1)->where('id','!=',2)->orderBy('id','desc')->get();
        if ($centers){
            return apiResponse(true,_('تم العثور على مراكز تعليمية'),new CenterCollection($centers));
        }else{
            return apiResponse(false,_('لا يوجد مراكز تعليمية'),new CenterCollection($centers),401);
        }
    }

    public function fastEdit(){
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $center = Center::find($id);
        if (!$center) :
            return apiResponse(false, _('لم يتم العثور على السنتر'), [], 404);
        endif;
        if ($user->role->number >= 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل السنتر'), [], 403);
        endif;
        return apiResponse(true, _('تم العثور على السنتر'), [
            'name' => $center->name,
            'url' => $center->url,
            'governorate' => $center->governorate->id,
        ]);
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
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $center = Center::find($id);
        if (!$center) :
            return apiResponse(false, _('لم يتم العثور على السنتر'), [], 404);
        endif;
        if ($user->role->number >= 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل السنتر'), [], 403);
        endif;
        $center->delete();
        return apiResponse(true,_('تم حذف السنتر بنجاح'),[]);
    }
}
