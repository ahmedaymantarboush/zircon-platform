<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestimonialCollection;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('degree','desc')->get();
        if ($testimonials){
            return apiResponse(true,_('تم العثور على آراء الطلبة'),new TestimonialCollection($testimonials));
        }else{
            return apiResponse(false,_('لا يوجد آراء للطلبة'),[],401);
        }
    }

    public function fastEdit(){
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $testimonial = Testimonial::find($id);
        if (!$testimonial) :
            return apiResponse(false, _('لم يتم العثور على الشهادة'), [], 404);
        endif;
        return apiResponse(true, _('تم العثور على الشهادة'), [
            'studentName' => $testimonial->student_name,
            'degree' => $testimonial->degree,
            'image' => $testimonial->image,
            'content' => $testimonial->content,
        ]);
    }

    public function topTestimonials()
    {
        $testimonials = Testimonial::orderBy('degree','desc')->take(4)->get();
        if ($testimonials){
            return apiResponse(true,_('تم العثور على آراء الطلبة'),new TestimonialCollection($testimonials));
        }else{
            return apiResponse(false,_('لا يوجد آراء للطلبة'),[],401);
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
    public function destroy()
    {
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $testimonial = Testimonial::find($id);
        if (!$testimonial) :
            return apiResponse(false, _('لم يتم العثور على الشهادة'), [], 404);
        endif;
        $testimonial->delete();
        return apiResponse(true,_('تم حذف الشهادة بنجاح'),[]);
    }
}
