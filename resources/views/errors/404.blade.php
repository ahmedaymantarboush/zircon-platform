@extends('layouts.errorLayout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('css/pageNotFound.css')}} " class="rel">
@endsection
@section('content')
    <section class="header">
        <h2 class='pageName'> الصفحة غير موجودة </h2>
    </section>
    <div class="errorImage">
        <img src="{{URL::asset('imgs/error404.png')}}" alt="">
    </div>
@endsection
@section('javascript')
<script src="{{URL::asset('js/pageNotFound.js')}}"></script>
@endsection

