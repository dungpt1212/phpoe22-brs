@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
<h3 class="text-center">{{ trans('admin.dashboard') }}</h3>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Number</div>

                <div class="panel-body">
                    <canvas id="line-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

