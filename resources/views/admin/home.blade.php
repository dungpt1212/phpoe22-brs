@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        <p>Dashboard for your website</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <a href="#"><h4>Users</h4></a>
                <p><b>{{ $numberUser }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-book fa-3x"></i>
            <div class="info">
                <a href="{{ route('chart.book') }}"><h4>Books</h4></a>
                <p><b>{{ $numberBook }}</b></p>
            </div>
        </div>
    </div>
</div>
@endsection

