<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BalanceCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceCardController extends Controller
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

    public function hanging()
    {
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 403);
        endif;
        $data = json_decode(request()->data, true);
        $id = $data['id'];
        $card = BalanceCard::find($id);
        if (!$card) :
            return apiResponse(false, _('لم يتم العثوؤ على الكارت'), [], 404);
        endif;
        $card->hanging = !$card->hanging;
        $card->save();
        return apiResponse(true,_('تم حفظ الكارت بنجاح'),[]);
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


    public function recharge(Request $request)
    {
        $jsonRequest = json_decode($request->data, true);
        $code = $jsonRequest['code'];

        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 403);
        endif;

        $balanceCard = BalanceCard::where('code', $code)->first();

        if (!$balanceCard) :
            return apiResponse(false, _("الكود الذي أدخلته غير صحيح رصيدك الحالي $user->balance ج.م"), [], 404);
        elseif ($balanceCard->used_at) :
            return apiResponse(false, _("هذا الكارت مستخدم بالفعل"), [], 401);
        elseif ($balanceCard->expiry_date < now()) :
            return apiResponse(false, _("هذا الكارت منتهي الصلاحية"), [], 401);
        endif;
        $user->balance += $balanceCard->value;
        $balanceCard->user_id = $user->id;
        $balanceCard->used_at = now();

        if ($user->save()) :
            if ($balanceCard->save()) :
                return apiResponse(true, _("تم شحن الرصيد بنجاح رصيدك الحالي $user->balance ج.م"), [
                    'code' => $balanceCard->code,
                    'value' => $balanceCard->value,
                    'balance' => $user->balance
                ], 200);
            endif;
        endif;

        return apiResponse(false, _("حدث خطأ أثناء شحن الكارت"), [
            'code' => $balanceCard->code,
            'value' => $balanceCard->value,
            'balance' => $user->balance
        ], 500);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 403);
        endif;
        $data = json_decode(request()->data, true);
        $id = $data['id'];
        $card = BalanceCard::find($id);
        if (!$card) :
            return apiResponse(false, _('لم يتم العثوؤ على الكارت'), [], 404);
        endif;
        $data = [
            'code' => $card->code,
            'start_date' => $card->created_at,
            'value' => $card->value,
            'end_date' => $card->expiry_date,
            'id' => $card->id,
        ];
        return apiResponse(true, _('تم العثور على الكارت بنجاح'),$data);
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
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 403);
        endif;
        $data = json_decode(request()->data, true);
        $id = $data['id'];
        $card = BalanceCard::find($id);
        if (!$card) :
            return apiResponse(false, _('لم يتم العثوؤ على الكارت'), [], 404);
        endif;
        $card->delete();
        return apiResponse(true, _('تم حذف على الكارت بنجاح'),[]);
    }
}
