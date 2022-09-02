@extends('layouts.errorLayout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('css/noAccess.css')}} " class="rel">
@endsection
@section('content')
<section class="header">
    <h2 class='pageName'> الوصول لهذه الصفحة ممنوع </h2>
</section>
<div class="errorImage">
    <img src="{{URL::asset('imgs/error403.png')}}" alt="">
</div>
@endsection
@section('javascript')
<script src="{{URL::asset('js/noAccess.js')}}"></script>
@endsection
