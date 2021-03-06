@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Users List</h4>
            </div>
            @if(CheckRolePermission('user_add'))
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#AddModal" class="btn btn-info">+ Add User</a>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table style-1" id="ListDatatableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Date</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Users as $key=>$User)
                        <tr>
                            <td>
                                <h6>{{($key+1)}}.</h6>
                            </td>
                            <td>
                                <div class="media style-1">
                                    <div class="media-body">
                                        <h6>{{$User->name}}</h6>
                                        <span>{{$User->email}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{getRoleNameFromId($User->role_id)}}
                            </td>
                            <td>
                                {{Carbon\Carbon::parse($User->created_at)->diffForHumans()}}
                            </td>
                            <td>
                                <div class="d-flex action-button">
                                    @if(CheckRolePermission('user_edit'))
                                    <a href="javascript:void(0);" data-id="{{$User->id}}" data-name="{{$User->name}}" data-email="{{$User->email}}" data-role_id="{{$User->role_id}}"  class="btn btn-info btn-xs light px-2 edit-trigger">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    @endif
                                    @if(CheckRolePermission('user_delete'))
                                    <a href="{{route('airports.destroy',['id'=>$User->id])}}" class="ms-2 btn btn-xs px-2 light btn-danger">
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
@if(CheckRolePermission('user_add'))
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('users.create')}}" method="POST">
                    <div class="modal-body">
                        @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" required name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" required name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" required name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select name="role_id" class="form-control">
                                        @foreach(\App\Models\Role::where('id',"!=",'1')->get() as $Role)
                                        <option value="{{$Role->id}}">{{$Role->name}}</option>
                                        @endforeach
                                    </select>
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


@if(CheckRolePermission('user_edit'))
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('airports.update')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" required id="name" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" required id="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>

 
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach(\App\Models\Role::where('id',"!=",'1')->get() as $Role)
                                <option value="{{$Role->id}}">{{$Role->name}}</option>
                                @endforeach
                            </select>
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
                    $("#name").val($(this).attr('data-name'));
                    $("#email").val($(this).attr('data-email'));
                    $("#role_id").val($(this).attr('data-role_id'));
                    $("#EditModal").modal('toggle');
            });
    });
</script>
@endsection