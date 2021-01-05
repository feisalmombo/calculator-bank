@extends('layouts.app')

@section('title', 'Currencies')

@section('content')


<div class="col-lg-12">
<h1 class="page-header">Currencies</h1>
</div>
<section class="content">
<div class="row">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
    <div class="panel-heading">
        View Currencies
        <a href="{{ url('/admin/manage/currency/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Currency</a>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        @if(count($currencies)>0)

        <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Currency Name</th>
                <th>Account Name</th>
                <th>Show</th>
                <th>Delete</th>
                <th>Duration</th>
            </tr>
            </thead>
            <tbody>
                    @foreach($currencies as $key=>$currency)
                    <tr class="odd gradeX">
                        <td>{{ $key + 1 }}</td>
                        <td class="center">{{ $currency->currency_name }}</td>
                        <td class="center">{{ $currency->accountType_name }}</td>
                        <td>
                            <a class="btn btn-info" data-toggle="modal" href='#{{ $currency->id."show" }}'>More Details</a>
                            <div class="modal fade" id="{{ $currency->id."show" }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Account Details</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Currency Name: </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $currency->currency_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Account Name: </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $currency->accountType_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Duration: </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="center-block">
                                                        <div class="form-group">
                                                            {{date("F jS, Y", strtotime($currency->created_at))}}  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                                <a href='#{{ $currency->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                <div class="modal fade" id="{{ $currency->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Delete</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete Currency? <h9 style="color: blue;">{{ $currency->currency_name }}</h9>
                                            </div>
                                            <form action="/admin/manage/account/types/{{ $currency->id  }}" method="POST" role="form">
    
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
    
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
    
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </td>
                        <td>
                            {{date("F jS, Y", strtotime($currency->created_at))}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>No Currencies found</strong>
        </div>
        @endif
    </div>
</div>
</div>
</div>
</section>
@endsection
