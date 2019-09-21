@extends('vendor.adminlte.page')

@section('title_prefix')
  {{-- {{$title_page}} --}}
@endsection   

@section('content')

 <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="lable_title" name="lable_title">
        {{$lable_title}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
{{--         <li class="active">{{$lable_title}}</li> --}}
      </ol>
    </section>

    <section class="content" id="content">
        @include($page)
    </section>

@endsection

