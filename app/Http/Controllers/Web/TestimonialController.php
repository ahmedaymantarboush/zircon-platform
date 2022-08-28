<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : false):
            return view('Admin.testimonials', ['testimonials' => Testimonial::all()]);
        else:
            return abort(404);
        endif;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        $user = Auth::user();
        if ($user->role->number >= 4):
            return abort(403);
        endif;
        $data = $request->all();
        $testimonial = Testimonial::create([
            'student_name' => $data['name'],
            'image' => asset('imgs/user.png'),
            'degree' => $data['degree'],
            'subject_degree' => $data['subjectDegree'],
            'content' => removeCustomTags($data['content']),
            'subject_id' => env('DEFAULT_SUBJECT_ID'),
            'grade_id' => $data['grade'],
            'teacher_id' => $user->id,
        ]);
        if ($request->hasFile('image')):
            $testimonial->image = uploadFile($request,'image',$data['name'].$testimonial->id);
            $testimonial->save();
        endif;
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestimonialRequest  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, $id)
    {
        $user = Auth::user();
        if ($user->role->number >= 4):
            return abort(403);
        endif;
        $data = $request->all();
        $testimonial = Testimonial::find($id);
        if (!$testimonial):
            return abort(404);
        endif;
        $testimonial->update([
            'student_name' => $data['newName'],
            'degree' => $data['newDegree'],
            'subject_degree' => $data['newSubjectDegree'],
            'content' => removeCustomTags($data['newContent']),
            'subject_id' => env('DEFAULT_SUBJECT_ID'),
            'grade_id' => $data['newGrade'],
            'teacher_id' => $user->id,
        ]);
        if ($request->hasFile('newImage')):
            $testimonial->image = uploadFile($request,'newImage',$data['newName'].$testimonial->id,$testimonial->image);
            $testimonial->save();
        endif;
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
