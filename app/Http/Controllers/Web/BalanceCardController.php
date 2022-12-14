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
        $user = Auth::user();
        $data = request()->all();
        $cards = BalanceCard::where('publisher_id', $user->id);
        if (request()->value && request()->value != 'all') {
            $cards = $cards->where('value', request()->value);
        }
        if (request()->status && request()->status != 'all') {
            if (request()->status == 'hanging') {
                $cards = $cards->where('hanging', 1);
            } elseif (request()->status == 'used') {
                $cards = $cards->where('user_id', '!=', null);
            } elseif (request()->status == 'published') {
                $cards = $cards->where('user_id', null)->where('hanging', 0);
            }
        }
        if (isset($data['q']) ? $data['q'] != '' : false) {
            $code = $data['q'];
            $code = explode('code', $code);
            if (count($code) >= 2) {
                $code = trim(str_replace(':', '', explode('value', $code[1])[0]));
            } else {
                $code = trim($code[0]);
            }
            $cards = $cards->whereHas('user', function ($user) use ($data) {
                $user->where('name', 'like', '%' . $data['q'] . '%')->orWhere('email', 'like', '%' . $data['q'] . '%')->orWhere('phone_number', 'like', '%' . $data['q'] . '%')->orWhere('code', 'like', '%' . $data['q'] . '%');
            })->orWhere('code', 'like', '%' . trim($code) . '%');
        }
        if ($user) :
            return view('Admin.allCards', ['cards' => $cards->get()]);
        else :
            return abort(404);
        endif;
    }
    public function recharge()
    {
        $code = request()->code;

        $code = explode('code', $code);
        if (count($code) >= 2) {
            $code = trim(str_replace(':', '', explode('value', $code[1])[0]));
        } else {
            $code = trim($code[0]);
        }

        $user = Auth::user();
        if ($user) :
            $balanceCard = BalanceCard::where('code', $code)->first();

            if (!$balanceCard) :
                return redirect()->back()->with(['msg' => "?????????? ???????? ???????????? ?????? ???????? ?????????? ???????????? $user->balance ??.??", 'success' => false]);
            elseif ($balanceCard->hanging) :
                return redirect()->back()->with(['msg' => "???? ???????? ?????? ?????? ????????????", 'success' => false]);
            elseif ($balanceCard->used_at) :
                return redirect()->back()->with(['msg' => "?????? ???????????? ???????????? ????????????", 'success' => false]);
            elseif ($balanceCard->expiry_date < now()) :
                return redirect()->back()->with(['msg' => "?????? ???????????? ?????????? ????????????????", 'success' => false]);
            endif;
            $user->balance += $balanceCard->value;
            $balanceCard->user_id = $user->id;
            $balanceCard->used_at = now();
            $user->save();
            $balanceCard->save();
            return redirect()->back()->with(['msg' => "???? ?????? ???????????? ?????????? ?????????? ???????????? $user->balance ??.??", 'success' => true]);
        else :
            return redirect()->back()->with(['msg' => "?????? ?????????? ???????????? ???????????? ???????????? ??????????", 'success' => false]);
        endif;
        return redirect()->back()->with(['msg' => "?????? ?????? ?????????? ?????? ????????????", 'success' => false]);
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
            return redirect(route('admin.balancecards.create'))->with($data);
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
