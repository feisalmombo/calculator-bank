@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Edit Profile</h1>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Profile<a href="{{ url('/view-users') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form" id="sev" action="{{ url('/view-users/'.$users->id) }}" method="POST" class="form-horizontal">

									{{ csrf_field() }}
									{{ method_field('PATCH') }}

									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Profile Information</h2>
										<div class="form-group">
											<label>Name: </label>
											<input class="form-control" name="fullname"  value="{{ isset($users->full_name) ? $users->full_name : old('fullname') }}">
                                        </div>

										<div class="form-group">
											<label>Email: </label>
											<input class="form-control" name="useremail"  value="{{ isset($users->email) ? $users->email : old('useremail') }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Phone Number: </label>
                                                <input class="form-control" name="phonenumber"  value="{{ isset($users->phone_number) ? $users->phone_number : old('phonenumber') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Date of Birth: </label>
                                            <input class="form-control" name="dob"  value="{{ isset($users->date_of_birth) ? $users->date_of_birth : old('dob') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>NIDA Number: </label>
                                            <input class="form-control" name="nidanumber"  value="{{ isset($users->government_id_number) ? $users->government_id_number : old('nidanumber') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>City: </label>
                                            <input class="form-control" name="city"  value="{{ isset($users->city) ? $users->city : old('city') }}">
                                        </div>

										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Update
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
