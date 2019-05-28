@extends('public.module.master')
@section('content')
 <div>
	 <h2>HOME PAGE</h2>
	 <!-- Insert Slider -->
	 @include('public.module.slide')
	 @include('public.pages.section1')
	 @include('public.pages.section2')
 </div>
@endsection
