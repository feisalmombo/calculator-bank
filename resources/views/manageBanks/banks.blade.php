@extends('layouts.app')

@section('title', 'Banks')

@section('content')


<div class="col-lg-12">
<h1 class="page-header">Bank</h1>
</div>
<section class="content">
<div class="row">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
    <div class="panel-heading">
        View Banks
        <a href="{{ url('/admin/manage/banks/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Bank</a>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        @if(count($banks)>0)

        <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Bank Name</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Duration</th>
            </tr>
            </thead>
            <tbody>
                    @foreach($banks as $key=>$bank)
                    <tr class="odd gradeX">
                        <td>{{ $key + 1 }}</td>
                        <td class="center">{{ $bank->bank_name }}</td>
                        <td>
                            <a class="btn btn-info" data-toggle="modal" href='#{{ $bank->id."show" }}'>More Details</a>
                            <div class="modal fade" id="{{ $bank->id."show" }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Bank Details</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Bank Name: </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $bank->bank_name }}
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
                                                            {{date("F jS, Y", strtotime($bank->created_at))}}  
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
                            <a href="{{ url('/admin/manage/banks/'.$bank->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                        </td>
                        <td>
                                <a href='#{{ $bank->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                <div class="modal fade" id="{{ $bank->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Delete</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete Bank? <h9 style="color: blue;">{{ $bank->bank_name }}</h9>
                                            </div>
                                            <form action="/admin/manage/banks/{{ $bank->id  }}" method="POST" role="form">
    
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
                            {{date("F jS, Y", strtotime($bank->created_at))}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>No Bank found</strong>
        </div>
        @endif
    </div>
</div>
</div>
</div>
</section>
@endsection
