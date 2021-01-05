@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="col-lg-12">
	<h1 class="page-header">My Profile</h1>
</div>
<section class="content">
    <div class="row">
       <div class="col-lg-12">
        {{-- @include('msgs.success') --}}

        <div id="alert-info"></div>

        <div class="panel panel-default">
         <div class="panel-heading">
            My Profile <a href="{{ url('/home') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="">
               <div class="">
                @foreach ($userProfile as $userProfiles)

                @endforeach

                <div class="panel-body">
                    <div class="">
                        <div class="" id="incident">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 style="color:black;">Information:</h4>
                                    <hr>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <span class="col-lg-2">Name : </span>
                                        <span class="col-lg-10">{{ $userProfiles->full_name }}</span>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <span class="col-lg-2">Email : </span>
                                        <span class="col-lg-10">{{ $userProfiles->email }}</span>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <span class="col-lg-2">Phone Number : </span>
                                        <span class="col-lg-10">{{ $userProfiles->phone_number }}</span>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <span class="col-lg-2">Date of Birth : </span>
                                        <span class="col-lg-10">{{ $userProfiles->date_of_birth }}</span>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <span class="col-lg-2">Government ID Number : </span>
                                        <span class="col-lg-10">{{ $userProfiles->government_id_number }}</span>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <span class="col-lg-2">City : </span>
                                        <span class="col-lg-10">{{ $userProfiles->city }}</span>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <span class="col-lg-2">Role : </span>
                                        <span class="col-lg-10">{{ $userProfiles->slug }}</span>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <span class="col-lg-2">Created at : </span>
                                        <span class="col-lg-10">{{date("F jS, Y", strtotime($userProfiles->created_at))}}</span>
                                    </div>
                                    <br>
                                </div>
                            </div>

                        </div>
                        {{-- @endforeach --}}
                    </div>
                    {{-- @else --}}
                    {{-- <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>No Customer found</strong>
                    </div>
                    @endif --}}
                    <!-- /.panel-body -->
                </div>

     </div>

 </div>

 <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-6 -->
</div>
<!-- /.col-lg-6 -->
</div>
</section>
@endsection
