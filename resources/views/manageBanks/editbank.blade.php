@extends('layouts.app')

@section('title', 'Edit Bank')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Edit Bank</h1>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Bank<a href="{{ url('/admin/manage/banks') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form" action="{{ url('/admin/manage/banks/'.$banks->id) }}" method="POST" class="form-horizontal">

									{{ csrf_field() }}
									{{ method_field('PATCH') }}

									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Bank Information</h2>
										<div class="form-group">
											<label>Bank Name: </label>
											<input class="form-control" name="bankname"  value="{{ isset($banks->bank_name) ? $banks->bank_name : old('bankname') }}">
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
