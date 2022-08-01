<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Lecture;
use App\Models\Lecture_Part;
use App\Models\Lecture_User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LectureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::where(['user_id'=>Auth::id()])->get();
        return view('pages.admin.lectures',['lectures'=>$lectures]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addLecture()
    {
        return view('pages.admin.addLecture');
    }

    protected function lectureData(Request $request, $fileName, $oldFile = null)
    {
        $data = $request->all();

        $data['description'] = preg_replace("/<iframe.*?>/", "", $data['description']);
        $data['description'] = preg_replace("/<link.*?>/", "", $data['description']);
        $data['description'] = preg_replace("/<script(.*?)>(.*?)<\/script>/", "", $data['description']);
        $data['description'] = preg_replace("/<py-script(.*?)>(.*?)<\/py-script>/", "", $data['description']);

        // $data['banner'] = array_key_exists('banner',$data) ? ($data['banner'] ?  $data['banner'] : $lecture->banner) : $lecture->banner;
        $poster = '';
        if (array_key_exists('banner', $data)) {

            if ($oldFile){
                $poster = uploadFile($request, $fileName, $oldFile->poster);
            }else{
                $poster = uploadFile($request, $fileName);
            }
            if ($poster) {
                if ($oldFile) {
                    $oldFile->poster = $poster;
                    $oldFile->save();
                }
            } else {
                return abort(502);
            }
        }

        return [
            'title' => $data['title'],
            'semester' => $data['semester'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'rate' => 0,
            'published' => array_key_exists('published', $data),
            'show_in_main' =>  array_key_exists('show_in_main', $data),
            'promotinal_video_url' => $data['promotinal_video_url'],
            'poster' => $poster,
            'meta_keywords' => $data['mete_keywords'],
            'meta_description' => $data['meta_description'],
            'slug' => $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']),
            'free' =>  array_key_exists('free', $data),
            'price' => $data['price'] > 0 ? $data['price'] : 0,
            'has_discount' =>  array_key_exists('has_discount', $data),
            'final_price' =>  array_key_exists('has_discount', $data) ? ($data['new_price'] > 0 ? $data['new_price'] : 0) : ($data['price'] > 0 ? $data['price'] : 0),
            'discount_expiry_date' => $data['discount_expiry_date'] ? $data['discount_expiry_date'] : now(),
            'duration' => '5 ساعات',
            'total_questions_count' => 1000,

            'subject_id' => $data['subject'],
            'grade_id' => $data['grade'],
            'user_id' => Auth::id(),
        ];
    }

    public function buy(Request $request, $slug)
    {
        $lecture = Lecture::where('slug', $slug)->first();
        if (!Lecture_User::where(['user_id' => Auth::id(), 'lecture_id' => $lecture->id])->first()) {
            $user = User::find(Auth::id());
            if ($request->coupon){
                $coupon = Coupon::where([
                    'name' => $request->coupon,
                    'deleted_at'=>null
                ])->first();
                $user->balance += $coupon ? $coupon->value : 0;
                $coupon->user_id = Auth::id();
                $coupon->save();
                $user->user();
                $coupon->delete();
            }
            buyLecture($lecture, User::find(Auth::id()));
        }
        return redirect()->back()->with(['success' => 'تمت عملية الشراء بنجاح']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validator($data)->validate();
        if ($data['price'] >= $data['new_price'] || $data['free']) {
            $lecture = Lecture::create($this->lectureData($request, 'banner'));
            foreach ($data['part'] as $part) {
                if (!empty($part)) {
                    Lecture_Part::firstOrCreate([
                        'lecture_id' => $lecture->id,
                        'part_id' => $part
                    ]);
                }
            }
        } else {
            return redirect()->beck();
        }
        if ($lecture) {
            return redirect(route('admin.lectures.editLecture', $lecture->slug))->with('lecture', $lecture);
        } else {
            return redirect()->beck();
        }
    }

    private function validator($data, $notRequired = Null)
    {
        return Validator::make($data, [
            'title' => [!$notRequired ? 'required' : '', 'string', 'max:50'],
            'semester' => !$notRequired ? ['string', "in:الفصل الدراسي الأول,الفصل الدراسي الثاني"] : "",
            'short_description' => [!$notRequired ? 'required' : '', 'string', 'max:50'],
            'description' => [!$notRequired ? 'required' : '', 'string'],
            'promotinal_video_url' => ['string', 'url'],
            'banner' => [!$notRequired ? 'required' : '', 'image'],
            'mete_keywords' => [!$notRequired ? 'required' : '', 'string'],
            'meta_description' => [!$notRequired ? 'required' : '', 'string'],
            'slug' => ['string', $notRequired ? (($data['slug'] != $notRequired->slug) ? 'unique:lectures,slug' : "") : 'unique:lectures,slug'],
            // 'price' => [!$notRequired ? 'required' : '','numeric'],
            // 'new_price' => [/*!$notRequired ? "required_if:has_discount,on" : "",'numeric',*/'lte:price'],
            // 'discount_expiry_date' => [/*!$notRequired ? "required_if:has_discount,on" : "",*/'date'],

            'subject' => [!$notRequired ? 'required' : '', 'exists:subjects,id'],
            'grade' => [!$notRequired ? 'required' : '', 'exists:grades,id'],
            'part' => [!$notRequired ? 'required' : '', 'exists:parts,id'],
        ], [
            'title.required' => 'عنوان المحاضرة مطلوب',
            'title.string' => 'يجب أن يكون العنوان عبارة عن نص',
            'title.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'semester.string' => 'يجب أن يكون الفصل الدراسي عبارة عن نص',
            'semester.in' => 'الرجاء إختيار فصل دراسي صحيح',

            'short_description.required' => 'الوصف القصير مطلوب',
            'short_description.string' => 'يجب أن يكون الوصف القصير عبارة عن نص',
            'short_description.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'description.required' => 'وصف المحاضرة مطلوب',
            'description.string' => 'يجب أن يكون الوصف عبارة عن نص',

            'promotinal_video_url.string' => 'يجب أن يكون الفيديو الترويجي عبارة عن نص',
            'promotinal_video_url.url' => 'الرجاء إدخال رابط صحيح',

            'banner.required' => 'الرجاء رفع الصورة المعبرة عن المحاضرة',
            'banner.image' => 'يجب أن يكون الملف عبارة عن صورة',

            'mete_keywords.required' => 'كلمات الMeta Tags مطلوبة',
            'meta_keywords.string' => 'يجب أن تكون كلمات الMeta Tags عبارة عن نص',

            'meta_description.required' => 'الMeta Description مطلوب',
            'meta_description.string' => 'يجب أن يكون الMeta Description عبارة عن نص',

            'slug.string' => 'يجب أن يكون الslug عبارة عن نص',
            'slug.unique' => 'هذا الslug متاح في محاضرة أخرى الرجاء إعادة اختيار slug مناسب',

            // 'free.boolean' => 'يجب أن يكون هذا الحق مفعل أو غير مفعل ولا يمكن استقبال أي قيم أخرى',

            // 'price.required' => 'السعر مطلوب',
            // 'price.numeric' => 'يجب أن يكون السعر عبارة عن رقم',

            // 'has_discount.boolean' => 'يجب أن يكون هذا الحق مفعل أو غير مفعل ولا يمكن استقبال أي قيم أخرى',

            'new_price.required_if' => 'السعر بعد الخصم مطلوب',
            'new_price.numeric' => 'يجب أن يكون السعر بعد الخصم عبارة عن رقم',
            'new_price.lte' => 'يجب أن يكون السعر بعد الخصم أقل من أو يساوي السعر الأصلي',

            'discount_expiry_date.required_if' => 'تاريخ انتهاء الخصم مطلوب',
            'discount_expiry_date.date' => 'يجب أن يكون تاريخ انتهاء الخصم عبارة عن تاريخ',


            'subject.required' => 'المادة الدراسية مطلوبة',
            'subject.exists' => 'الرجاء إختيار مادة دراسية صحيحة',

            'grade.required' => 'المرحلة الدراسية مطلوبة',
            'grade.exists' => 'الرجاء اختيار مرحلة دراسية صحيحة',

            'part.required' => 'الجزئية الدراسية مطلوبة',
            'part.exists' => 'الرجاء اختيار جزئية دراسية صحيحة',
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $lecture = Lecture::where('slug', $slug)->first();
        if ($lecture) {
            return view('pages.home.lecture', ['lecture' => $lecture]);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function editLecture($slug)
    {
        $lecture = Lecture::where('slug', $slug)->first();
        return view('pages.admin.editLecture', compact('lecture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = $request->all();
        $lecture = Lecture::where('slug', $slug)->first();
        $this->validator($data, $lecture)->validate();

        if ($data['price'] >= $data['new_price'] || $data['free']) {
            $lecture->update($this->lectureData($request, 'banner', $lecture));
            foreach (Lecture_Part::where(['lecture_id' => $lecture->id])->get() as $part) {
                if (!in_array($part->part_id, $data['part'])) {
                    $part->delete();
                }
            }
            foreach ($data['part'] as $part) {
                if (!empty($part)) {
                    Lecture_Part::firstOrCreate([
                        'lecture_id' => $lecture->id,
                        'part_id' => $part
                    ]);
                }
            }
        } else {
            return redirect()->back();
        }
        if ($lecture) {
            return redirect(route('admin.lectures.editLecture', $lecture->slug))->with('lecture', $lecture);
        } else {
            return redirect()->back();
        }
    }

    public function view($slug)
    {
        $lecture = \App\Models\Lecture::where('slug', $slug)->first();
        if (\App\Models\Lecture_User::where([
            'lecture_id' => $lecture->id,
            'user_id' => Auth::id()
        ])->first() || $lecture->publisher->id == Auth::id()) {
            return view('pages.home.lecture_viewer', compact('lecture'));
        } else {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lecture::findOrFail($id)->delete();
        return redirect()->back();
    }
}
