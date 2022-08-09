<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
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


    public function checkCoupon(Request $request)
    {
        $jsonRequest = $request->json();

        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 403);
        endif;

        $couponCode = $jsonRequest['code'];
        $coupon = Coupon::where('code', $couponCode)->first();
        $couponValue = 0;
        if ($coupon->used_at) :
            return apiResponse(false, _("هذا الكوبون مستخدم بالفعل"), [], 401);
        elseif ($coupon) :
            $couponValue = $coupon->value;
        endif;

        $slug = $jsonRequest['lecture'];
        $lecture = Lecture::where('slug', $slug)->first();
        if (!$lecture) :
            return apiResponse(false, _('المحاضرة المطلوبة غير موجودة'), [], 404);
        endif;
        $price = getPrice($lecture);

        $balance = $user->balance + $couponValue;
        if ($balance < $price) :
            return apiResponse(false, _("الرصيد الحالي ($balance ج.م) لا يكفي لاتمام عملية الشراء"), [], 401);

        elseif ($balance >= $price) :

            return apiResponse(true, _("تمت عملية الشراء بنجاح"), [
                "price" => $price,
                "balance" => $user->balance,
                "couponCode" => $couponCode,
                "couponValue" => $couponValue,
            ], 200);
        endif;
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
