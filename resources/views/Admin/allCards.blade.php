@extends('layouts.adminLayout')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

<!-- css file -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/allCards.css') }}" />
@endsection
@section('content')

<div class="page-heading white-box">
    <span class="page-icon"><i class="fa-solid fa-money-bill-transfer"></i></span>
    <h2 class="page-h">لائحة كروت الشحن</h2>
</div>
<div class="lectures-statistics row">
    <div class="col-lg-3 col-sm-6">
        <a href="#" class="add-new-lec" style="width: 100%">
            <div class="stc-box" data-bs-toggle="modal" data-bs-target="#quick-modify" id="addNewQuestion">
                <div class="stc-val-parent">
                    <span class="stc-value">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span data-bs-toggle="modal" data-bs-target="#quick-modify" class="stc-name">تحرير كروت جديدة
                    </span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a class="real-stc" style="width: 100%">
            <div class="stc-box second-stc">
                <div class="stc-val-parent">
                    <span class="stc-value"> 158ج.م </span>
                    <span class="stc-name">رصيد معلق بالكروت</span>
                </div>
                <div class="stc-icon">
                    <span class=""><i class="fa-solid fa-circle-xmark"></i></span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a class="real-stc" style="width: 100%">
            <div class="stc-box second-stc">
                <div class="stc-val-parent">
                    <span class="stc-value"> 3410ج.م </span>
                    <span class="stc-name">رصيد تم ايداعه</span>
                </div>
                <div class="stc-icon">
                    <span class="">
                        <i class="fa-solid fa-circle-check"></i></span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a class="real-stc" style="width: 100%">
            <div class="stc-box second-stc">
                <div class="stc-val-parent">
                    <span class="stc-value">
                        3410ج.م
                    </span>
                    <span class="stc-name">الرصيد الكالي</span>
                </div>
                <div class="stc-icon">
                    <span class=""><i class="fa-solid fa-question"></i></span>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="lectureTableParent">
    <form action="" class="lec-filter">
        <h3>سجل الكروت</h3>
        <div class="custome-row">
            <div class="row">
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">المحرر</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    جميع المراحل الدراسية
                                </option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">السنة</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    المادة
                                </option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">الشهر</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    الجزئية الدراسية
                                </option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">اليوم</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    جميع المدرس
                                </option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">الحالة</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    جميع المدرس
                                </option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-btn">
                <input type="submit" class="filter-btn" value="فلترة" />
            </div>
        </div>
        <div class="search-field">
            <div class="field search-select-box">
                <span>اظهار</span>
                <select name="" id="" data-live-search="true">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3333</option>
                </select>
                <span>من الحقول</span>
            </div>
            <div class="filter-search">
                <label for="">بحث :</label>
                <input type="search" />
            </div>
        </div>

    </form>
    <div class="lectures-table">
        <table class="">
            <thead>
                <tr>
                    <th>
                        #
                        <i class="fa-solid fa-sort"></i>
                    </th>
                    <th>الكود</th>
                    <th>قيمة الكارت</th>
                    <th>تاريخ التحرير</th>
                    <th>المستخدم للكارت</th>
                    <th>تاريخ الاستخدام</th>
                    <th class="features">اجراءات</th>
                </tr>
            </thead>
            <tbody>
                <tr class="redBg">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="الكود :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="question-mark"><i class="fa-solid fa-receipt"></i></span>

                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top" title="15sad4fe#">
                                    15sad4fe#
                                </button>
                            </div>
                            <div class="name-teacher">
                                <span class="job-teacher">:المحرر</span>
                                <span>أ. محمد
                                    عبدالمعبود</span>
                            </div>
                        </div>
                    </td>
                    <td data-lable="قيمة الكارت :" class="table-level-parent">
                        <span class="table-level">50ج.م</span>
                    </td>
                    <td data-lable="تاريخ التحرير :" class="students">
                        27/7/2022:17:50
                    </td>
                    <td data-lable="المستخدم للكارت :" class="table-sections">

                        عبدالرحمن مصطفى محمود

                    </td>
                    <td data-lable="تاريخ الاستخدام :" class="students">
                        31/7/2022:12:55
                    </td>

                    <td class="features" data-lable="اجراءات :">
                        <div class="btn-group">
                            <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>

                            <ul class="dropdown-menu feat-menu">
                                <li>
                                    <a class="dropdown-item" href="#">عرض لائحة
                                        الطلاب</a>
                                </li>

                                <li>
                                    <a class="dropdown-item q-modify" href="#">تعديل الامتحان
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item delete-lec" href="#">مسح الامتحان</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="greenBg">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="السؤال :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="question-mark"><i class="fa-solid fa-question"></i></span>
                                <!-- <span
															class="question-code"
														>
															ما هو التيار الكهربي
														</span> -->
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top"
                                    title="ماهو التيار واين يوجد التيار والي متي سوف يتم تواجد التيار">
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
                                </button>
                            </div>
                            <div class="name-teacher">
                                <span class="job-teacher">:المدرس</span>
                                <span>أ. محمد
                                    عبدالمعبود</span>
                            </div>
                        </div>
                    </td>
                    <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                        <span class="table-level">الصف الثالث الثانوي</span>
                    </td>
                    <td data-lable="المادة :" class="table-sections">
                        <div class="custome-parent">
                            الفيزياء
                        </div>
                    </td>
                    <td data-lable="الجزئية الدراسية :" class="students">
                        العزوم
                    </td>
                    <td data-lable="درجة الصعوبة :" class="views">
                        5
                    </td>
                    <td data-lable="إجابة صحيحة :" class="table-stat-parent">
                        <span class="table-stat not-active">530</span>
                    </td>
                    <td data-lable="اجابه خاطئة :" class="table-price-parent">
                        <span class="table-price not-free">1100</span>
                    </td>
                    <td class="features" data-lable="اجراءات :">
                        <div class="btn-group">
                            <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>

                            <ul class="dropdown-menu feat-menu">
                                <li>
                                    <a class="dropdown-item" href="#">عرض لائحة
                                        الطلاب</a>
                                </li>

                                <li>
                                    <a class="dropdown-item q-modify" href="#">تعديل الامتحان
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item delete-lec" href="#">مسح الامتحان</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="السؤال :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="question-mark"><i class="fa-solid fa-question"></i></span>
                                <!-- <span
															class="question-code"
														>
															ما هو التيار الكهربي
														</span> -->
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top"
                                    title="ماهو التيار واين يوجد التيار والي متي سوف يتم تواجد التيار">
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
                                </button>
                            </div>
                            <div class="name-teacher">
                                <span class="job-teacher">:المدرس</span>
                                <span>أ. محمد
                                    عبدالمعبود</span>
                            </div>
                        </div>
                    </td>
                    <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                        <span class="table-level">الصف الثالث الثانوي</span>
                    </td>
                    <td data-lable="المادة :" class="table-sections">
                        <div class="custome-parent">
                            الفيزياء
                        </div>
                    </td>
                    <td data-lable="الجزئية الدراسية :" class="students">
                        العزوم
                    </td>
                    <td data-lable="درجة الصعوبة :" class="views">
                        5
                    </td>
                    <td data-lable="إجابة صحيحة :" class="table-stat-parent">
                        <span class="table-stat not-active">530</span>
                    </td>
                    <td data-lable="اجابه خاطئة :" class="table-price-parent">
                        <span class="table-price not-free">1100</span>
                    </td>
                    <td class="features" data-lable="اجراءات :">
                        <div class="btn-group">
                            <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>

                            <ul class="dropdown-menu feat-menu">
                                <li>
                                    <a class="dropdown-item" href="#">عرض لائحة
                                        الطلاب</a>
                                </li>

                                <li>
                                    <a class="dropdown-item q-modify" href="#">تعديل الامتحان
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item delete-lec" href="#">مسح الامتحان</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="blueBg">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="السؤال :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="question-mark"><i class="fa-solid fa-question"></i></span>
                                <!-- <span
															class="question-code"
														>
															ما هو التيار الكهربي
														</span> -->
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top"
                                    title="ماهو التيار واين يوجد التيار والي متي سوف يتم تواجد التيار">
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
                                </button>
                            </div>
                            <div class="name-teacher">
                                <span class="job-teacher">:المدرس</span>
                                <span>أ. محمد
                                    عبدالمعبود</span>
                            </div>
                        </div>
                    </td>
                    <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                        <span class="table-level">الصف الثالث الثانوي</span>
                    </td>
                    <td data-lable="المادة :" class="table-sections">
                        <div class="custome-parent">
                            الفيزياء
                        </div>
                    </td>
                    <td data-lable="الجزئية الدراسية :" class="students">
                        العزوم
                    </td>
                    <td data-lable="درجة الصعوبة :" class="views">
                        5
                    </td>
                    <td data-lable="إجابة صحيحة :" class="table-stat-parent">
                        <span class="table-stat not-active">530</span>
                    </td>
                    <td data-lable="اجابه خاطئة :" class="table-price-parent">
                        <span class="table-price not-free">1100</span>
                    </td>
                    <td class="features" data-lable="اجراءات :">
                        <div class="btn-group">
                            <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>

                            <ul class="dropdown-menu feat-menu">
                                <li>
                                    <a class="dropdown-item" href="#">عرض لائحة
                                        الطلاب</a>
                                </li>

                                <li>
                                    <a class="dropdown-item q-modify" href="#">تعديل الامتحان
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item delete-lec" href="#">مسح الامتحان</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="delete-lecture" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    حذف سؤال
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <p class="sure-to-del">
                        هل انت متأكد انك تريد مسح السؤال
                        <span class="del-lesson"> ..... </span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">
                        مسح
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        الغاء
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<!--font awesome-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
    integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--jquery-->

<!-- bootstrap 4  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- bootstrap 5  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- text editor  -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

<!-- main js file -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="{{ asset('admin/assets/js/allCards.js') }}"></script>
@endsection