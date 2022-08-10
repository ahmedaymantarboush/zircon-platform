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


    public function useCoupon(Request $request)
    {

        $jsonRequest = json_decode($request->data, true);
        $code = $jsonRequest['code'];

        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 403);
        endif;

        $coupon = Coupon::where('code', $code)->first();

        if (!$coupon) :
            return apiResponse(false, _("الكود الذي أدخلته غير صحيح رصيدك الحالي $user->balance ج.م"), [], 404);
        elseif ($coupon->used_at) :
            return apiResponse(false, _("هذا الكوبون مستخدم بالفعل"), [], 401);
        elseif ($coupon->expiry_date < now()) :
            return apiResponse(false, _("هذا الكوبون منتهي الصلاحية"), [], 401);
        endif;

        $user->balance += $coupon->value;
        $coupon->user_id = $user->id;
        $coupon->used_at = now();
        if ($user->save()) :
            if ($coupon->save()) :
                return apiResponse(true, _("تم شحن الرصيد بنجاح رصيدك الحالي $user->balance ج.م"), [
                    'code' => $coupon->code,
                    'value' => $coupon->value,
                    'balance' => $user->balance
                ], 200);
            endif;
        endif;

        return apiResponse(true, _("حدث خطأ أثناء شحن الكوبون"), [
            'code' => $coupon->code,
            'value' => $coupon->value,
            'balance' => $user->balance
        ], 200);
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
