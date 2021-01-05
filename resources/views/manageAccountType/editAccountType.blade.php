@extends('layouts.app')

@section('title', 'Edit Account Type')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Edit Account Type</h1>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Account Type<a href="{{ url('/admin/manage/account/types') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form" action="{{ url('/admin/manage/account/types/'.$accountTypes->id) }}" method="POST" class="form-horizontal">

									{{ csrf_field() }}
									{{ method_field('PATCH') }}

									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Account Information</h2>
										<div class="form-group">
											<label>Account Name: </label>
											<input class="form-control" name="accountType"  value="{{ isset($accountTypes->accountType_name) ? $accountTypes->accountType_name : old('accountType') }}">
                                        </div>

                                        <div class="form-group">
											<label>Bank Type: </label>
											<select class="form-control" required="required" name="bankID" id="bankID">
                                                @foreach($banks as $bank)
                                                <option value="{{ $bank->id}}" {{ $bank->id == old('bankID') ? 'selected' : ''}}>{{ $bank->bank_name }}</option>
                                                {{-- <option value="{{ $bank->id}}" {{ $bank->id == $accountTypes->id ? 'selected' : ''}}>{{ $bank->bank_name }}</option> --}}
                                                @endforeach
                                            </select>
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
