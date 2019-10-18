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
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                         <h3 class="tile-title">Monthly books <span id="title_month">2019</span></h3>
                    </div>
                    <div class="col-xs- col-sm- col-md- col-lg-3"></div>
                    <div class="col-xs- col-sm- col-md- col-lg-3">
                        <div class="form-group">
                            <select class="form-control" id="selMonth">
                                @foreach($years as $year)
                                    <option value="{{ $year->year }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Number</div>
                <div class="div_chart">
                    <div class="panel-body">
                        <canvas id="line-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

