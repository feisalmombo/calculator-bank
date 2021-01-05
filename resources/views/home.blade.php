@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Main content -->
@if(Auth::user()->hasRole('developer') ||
Auth::user()->hasRole('manager') ||
Auth::user()->hasRole('administrator') ||
Auth::user()->hasRole('financial agent'))
<section class="content">
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                {{--  <h3>{{ $comparisonCount[0]->comparisonCount }}</h3>  --}}

                <p>No of Bank</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
              <div class="inner">
                {{--  <h3>{{ $applicationsCount[0]->applicationsCount }}</h3>  --}}
                <p>No of Type of Account</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
              <div class="inner">
              {{--  <h3>{!! $loanappliedDashboardCount !!}</h3>  --}}

                <p>No of Currency</p>
              </div>
            </div>
          </div>
        </div>
        <br>
</section>
@endif

@endsection
