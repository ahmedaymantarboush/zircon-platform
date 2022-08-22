<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BalanceCard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Str;

class UserController extends Controller
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
    public function genarateCode()
    {
        $code = Str::random(16);
        while (User::where('code', $code)->count() > 0) {
            $code = Str::random(16);
        }
        return apiResponse(true, _('تم انشاء الكود بنجاح'), ['code' => $code]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function getBalance()
    {
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $student = User::find($id);
        if (!$student) :
            return apiResponse(false, _('لم يتم العثور على الطالب'), [], 404);
        endif;
        if ($user->role->number >= 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الطالب'), [], 403);
        endif;
        return apiResponse(true, _('تم العثور على الطالب'), [
            'id' => $student->id,
            'name' => $student->name,
            'balance' => $student->balance,
        ]);
    }
    public function editBalance()
    {
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $student = User::find($id);
        if (!$student) :
            return apiResponse(false, _('لم يتم العثور على الطالب'), [], 404);
        endif;
        if ($user->role->number >= 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الطالب'), [], 403);
        endif;
        $student->balance = $data['balance'] ?? 0;
        $student->save();
        return apiResponse(true, _('تم تعديل الطالب بنجاح'), [
            'id' => $student->id,
            'name' => $student->name,
            'balance' => $student->balance,
        ]);
    }

    public function getCode()
    {
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $student = User::find($id);
        if (!$student) :
            return apiResponse(false, _('لم يتم العثور على الطالب'), [], 404);
        endif;
        if ($user->role->number >= 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الطالب'), [], 403);
        endif;
        return apiResponse(true, _('تم العثور على الطالب'), [
            'id' => $student->id,
            'name' => $student->name,
            'code' => $student->code,
        ]);
    }
    public function editCode()
    {
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $student = User::find($id);
        if (!$student) :
            return apiResponse(false, _('لم يتم العثور على الطالب'), [], 404);
        endif;
        if ($user->role->number >= 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الطالب'), [], 403);
        endif;
        $code = $data['code'] ?? 0;
        if (User::where('code',$code)->first()):
            return apiResponse(false, _('الكود موجود بالفعل'), [], 404);
        endif;
        $student->code = $code;
        $student->save();
        return apiResponse(true, _('تم تعديل الطالب بنجاح'), [
            'id' => $student->id,
            'name' => $student->name,
            'code' => $student->code,
        ]);
    }
    public function getStudentCardData(){
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $student = User::find($id);
        if (!$student) :
            return apiResponse(false, _('لم يتم العثور على الطالب'), [], 404);
        endif;
        if ($user->role->number < 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الطالب'), [], 403);
        endif;
        return apiResponse(true, _('تم العثور على الطالب'), [
            'image' => $student->image,
            'role' => $student->role->title,
            'name' => $student->name,
            'grade' => $student->grade->name,
            'phoneNumber' => $student->phone_number,
            'parentPhoneNumber' => $student->parent_phone_number,
            'governorate' => $student->governorate->name,
            'center' => $student->center->name,
            'code' => $student->code,
        ]);
    }

    public function hanging()
    {
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $student = User::find($id);
        if (!$student) :
            return apiResponse(false, _('لم يتم العثور على الطالب'), [], 404);
        endif;
        if ($user->role->number >= 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الطالب'), [], 403);
        endif;
        if ($user->id == $student->id):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الطالب'), [], 403);
        endif;
        $student->hanging = !$student->hanging;
        $student->save();
        return apiResponse(true, _('تم تعديل الطالب بنجاح'), [
            'id' => $student->id,
            'hanging' => $student->hanging,
        ]);
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
