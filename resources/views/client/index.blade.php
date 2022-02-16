@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Clients List</h4>
            </div>
            @if(CheckRolePermission('client_add'))
                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#AddModal" class="btn btn-info">+ Add Client</a>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table style-1" id="ListDatatableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Clients as $key=>$Client)
                        <tr>
                            <td>
                                <h6>{{($key+1)}}.</h6>
                            </td>
                            <td>
                                <div class="media style-1">
                                    <div class="media-body">
                                        <p>{{$Client->line_1}}</p>
                                        <p>{{$Client->line_2}}</p>
                                        <p>{{$Client->line_3}}</p>
                                        <p>{{$Client->line_4}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{Carbon\Carbon::parse($Client->created_at)->diffForHumans()}}
                            </td>
                            <td>
                                <div class="d-flex action-button">
                                    @if(CheckRolePermission('client_edit'))
                                    <a href="javascript:void(0);" data-id="{{$Client->id}}" data-line_1="{{$Client->line_1}}" data-line_2="{{$Client->line_2}}" data-line_3="{{$Client->line_3}}" data-line_4="{{$Client->line_4}}" class="btn btn-info btn-xs light px-2 edit-trigger">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    @endif
                                    @if(CheckRolePermission('client_delete'))
                                    <a href="{{route('client.destroy',['id'=>$Client->id])}}" class="ms-2 btn btn-xs px-2 light btn-danger">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    

    <!--**********************************
            Modals Start
        ***********************************-->
@if(CheckRolePermission('client_add'))
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data"> 
                    <div class="modal-body">
                        @csrf
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input type="text" maxlength="42" name="line_1" class="form-control" placeholder="Line 1">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input type="text" maxlength="42" name="line_2" class="form-control" placeholder="Line 2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input type="text" maxlength="42" name="line_3" class="form-control" placeholder="Line 3">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input type="text" maxlength="42" name="line_4" class="form-control" placeholder="Line 4">
                                </div>
                            </div>
                           
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif


@if(CheckRolePermission('client_edit'))
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('client.update')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="text" maxlength="42" id="line_1" name="line_1" class="form-control" placeholder="Line 1">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="text" maxlength="42" id="line_2" name="line_2" class="form-control" placeholder="Line 2">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="text" maxlength="42" id="line_3" name="line_3" class="form-control" placeholder="Line 3">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="text" maxlength="42" id="line_4" name="line_4" class="form-control" placeholder="Line 4">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endif

    
    <!--**********************************
            Modals Ends
        ***********************************-->
@endsection

@section('scripts')
<script>
    $(function(){
            $('body').delegate('.edit-trigger','click',function(){
                    $("#id").val($(this).attr('data-id'))
                    $("#line_1").val($(this).attr('data-line_1'));
                    $("#line_2").val($(this).attr('data-line_2'));
                    $("#line_3").val($(this).attr('data-line_3'));
                    $("#line_4").val($(this).attr('data-line_4'));
                    $("#EditModal").modal('toggle');
            });
    });
</script>
@endsection