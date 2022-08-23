<?php

namespace App\Http\Controllers\Web;

use App\Models\BalanceCard;
use App\Http\Requests\StoreBalanceCardRequest;
use App\Http\Requests\UpdateBalanceCardRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
    public function recharge()
    {
        $code = request()->code;
        $user = Auth::user();
        if ($user) :
            $balanceCard = BalanceCard::where('code', $code)->first();

            if (!$balanceCard) :
                return redirect()->back()->with(['msg' => "الكود الذي أدخلته غير صحيح رصيدك الحالي $user->balance ج.م", 'success' => false]);
            elseif ($balanceCard->used_at) :
                return redirect()->back()->with(['msg' => "هذا الكارت مستخدم بالفعل", 'success' => false]);
            elseif ($balanceCard->expiry_date < now()) :
                return redirect()->back()->with(['msg' => "هذا الكارت منتهي الصلاحية", 'success' => false]);
            endif;
            $user->balance += $balanceCard->value;
            $balanceCard->user_id = $user->id;
            $balanceCard->used_at = now();
            $user->save();
            $balanceCard->save();
            return redirect()->back()->with(['msg' => "تم شحن الرصيد بنجاح رصيدك الحالي $user->balance ج.م", 'success' => true]);
        else :
            return redirect()->back()->with(['msg' => "يجب تسجيل الدخول للقيام بعملية الشحن", 'success' => false]);
        endif;
        return redirect()->back()->with(['msg' => "حدث خطأ أثناء شحن الكارت", 'success' => false]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : false) :
            return view('Admin.addCoupons');
        else :
            return abort(404);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBalanceCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBalanceCardRequest $request)
    {
        $user = Auth::user();
        $data = $request->all();
        if ($user ? $user->role->number < 4 : false) :
            $balanceCards = BalanceCard::factory($data['count'])->create([
                'value' => $data['value'],
                'center_id' => $data['center'],
                'publisher_id' => $user->id,
            ]);
            $data['balanceCards'] = $balanceCards;
            return redirect(route('Admin.balancecards.create'))->with($data);
        else :
            return abort(404);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BalanceCard  $balanceCard
     * @return \Illuminate\Http\Response
     */
    public function show(BalanceCard $balanceCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BalanceCard  $balanceCard
     * @return \Illuminate\Http\Response
     */
    public function edit(BalanceCard $balanceCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBalanceCardRequest  $request
     * @param  \App\Models\BalanceCard  $balanceCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBalanceCardRequest $request, BalanceCard $balanceCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BalanceCard  $balanceCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceCard $balanceCard)
    {
        //
    }
}
