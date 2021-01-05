@extends('layouts.app')

@section('title', 'Add Currency')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add Account</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create Currency<a href="{{ url('/admin/manage/currency') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/admin/manage/currency') }}" method="POST">
									{{ csrf_field() }}
									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Account Type Information</h2>
										<div class="form-group">
											<label>Currency Name: </label>
											<input type="text" class="form-control" name="currencyName" id="currencyName" required="required"  placeholder="eg: USD">
                                        </div>

                                        <div class="form-group">
											<label>Account Type: </label>
											<select class="form-control"  required="required" name="accountType">
												@foreach($accountTypes as $accountType)
												<option value="{{ $accountType->accountType_name }}">{{ $accountType->accountType_name }}</option>
												@endforeach
											</select>
                                        </div>

										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Save
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
</section>
@endsection
