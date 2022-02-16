@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Role List</h4>
            </div>
            @if(CheckRolePermission('role_add'))
                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#AddModal" class="btn btn-info">+ Add Role</a>
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
                        @foreach ($Roles as $key=>$Role)
                        <tr>
                            <td>
                                <h6>{{($key+1)}}.</h6>
                            </td>
                            <td>
                                <div class="media style-1">
                                    <div class="media-body">
                                        <h6>{{$Role->name}}</h6>
                                    </div>
                                </div>
                            </td>
                           
                            <td>
                                {{Carbon\Carbon::parse($Role->created_at)->diffForHumans()}}
                            </td>
                            <td>
                                <div class="d-flex action-button">
                                    @if(CheckRolePermission('role_edit'))
                                    <a href="javascript:void(0);" data-id="{{$Role->id}}" data-name="{{$Role->name}}"   class="btn btn-info btn-xs light px-2 edit-trigger">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    @endif
                                    @if(CheckRolePermission('role_delete'))
                                    <a href="{{route('airports.destroy',['id'=>$Role->id])}}" class="ms-2 btn btn-xs px-2 light btn-danger">
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
@if(CheckRolePermission('role_add'))
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('roles.create')}}" method="POST">
                    <div class="modal-body">
                        @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Role Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Role Name">
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="client_view" value="on" id="client_view" checked>
                                <label class="form-check-label" for="client_view">
                                  Client List View
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="client_add" id="client_add" checked>
                                <label class="form-check-label" for="client_add">
                                    Client List Create
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="client_edit" id="client_edit" checked>
                                <label class="form-check-label" for="client_edit">
                                    Client List Update
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="client_delete" id="client_delete" checked>
                                <label class="form-check-label" for="client_delete">
                                    Client List Delete
                                </label>
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="company_view" id="company_view" checked>
                                <label class="form-check-label" for="company_view">
                                    Company List View
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="company_add" id="company_add" checked>
                                <label class="form-check-label" for="company_add">
                                    Company List Create
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="company_edit" id="company_edit" checked>
                                <label class="form-check-label" for="company_edit">
                                    Company List Update
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="company_delete" id="company_delete" checked>
                                <label class="form-check-label" for="company_delete">
                                    Company List Delete
                                </label>
                            </div>



                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airline_view" id="airline_view" checked>
                                <label class="form-check-label" for="airline_view">
                                    Airline List View
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airline_add" id="airline_add" checked>
                                <label class="form-check-label" for="airline_add">
                                    Airline List Create
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airline_edit" id="airline_edit" checked>
                                <label class="form-check-label" for="airline_edit">
                                    Airline List Update
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airline_delete" id="airline_delete" checked>
                                <label class="form-check-label" for="airline_delete">
                                    Airline List Delete
                                </label>
                            </div>




                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airport_view" id="airport_view" checked>
                                <label class="form-check-label" for="airport_view">
                                    Airport List View
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airport_add" id="airport_add" checked>
                                <label class="form-check-label" for="airport_add">
                                    Airport List Create
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airport_edit" id="airport_edit" checked>
                                <label class="form-check-label" for="airport_edit">
                                    Airport List Update
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airport_delete" id="airport_delete" checked>
                                <label class="form-check-label" for="airport_delete">
                                    Airport List Delete
                                </label>
                            </div>




                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airway_view" id="airway_view" checked>
                                <label class="form-check-label" for="airway_view">
                                    Airway List View
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airway_add" id="airway_add" checked>
                                <label class="form-check-label" for="airway_add">
                                    Airway List Create
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airway_edit" id="airway_edit" checked>
                                <label class="form-check-label" for="airway_edit">
                                    Airway List Update
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airway_delete" id="airway_delete" checked>
                                <label class="form-check-label" for="airway_delete">
                                    Airway List Delete
                                </label>
                            </div>




                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airway_versions_view" id="airway_versions_view" checked>
                                <label class="form-check-label" for="airway_versions_view">
                                    Airway Version List View
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airway_versions_view_single" id="airway_versions_view_single" checked>
                                <label class="form-check-label" for="airway_versions_view_single">
                                    Airway Version View Single Bill
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airway_versions_roll_back" id="airway_versions_roll_back" checked>
                                <label class="form-check-label" for="airway_versions_roll_back">
                                    Airway Roll Back to Version
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="airway_versions_delete" id="airway_versions_delete" checked>
                                <label class="form-check-label" for="airway_versions_delete">
                                    Airway Version List Delete
                                </label>
                            </div>



                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="user_view" id="user_view" checked>
                                <label class="form-check-label" for="user_view">
                                    User List View
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="user_add" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    User List Create
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="user_edit" id="user_edit" checked>
                                <label class="form-check-label" for="user_edit">
                                    User List Update
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="user_delete" id="user_delete" checked>
                                <label class="form-check-label" for="user_delete">
                                    User List Delete
                                </label>
                            </div>




                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="role_view" id="role_view" checked>
                                <label class="form-check-label" for="role_view">
                                    Role List View
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" name="role_add" id="role_add" checked>
                                <label class="form-check-label" for="role_add">
                                    Role List Create
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" id="role_edit" name="role_edit" checked>
                                <label class="form-check-label" for="role_edit">
                                    Role List Update
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" id="role_delete" name="role_delete" checked>
                                <label class="form-check-label" for="role_delete">
                                    Role List Delete
                                </label>
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



@if(CheckRolePermission('role_edit'))
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('roles.update')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Airport Name">
                            </div>
                        </div>

                        



                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="client_view" value="on" id="e_client_view" checked>
                            <label class="form-check-label" for="e_client_view">
                              Client List View
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="client_add" id="e_client_add" checked>
                            <label class="form-check-label" for="e_client_add">
                                Client List Create
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="client_edit" id="e_client_edit" checked>
                            <label class="form-check-label" for="e_client_edit">
                                Client List Update
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="client_delete" id="e_client_delete" checked>
                            <label class="form-check-label" for="e_client_delete">
                                Client List Delete
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="company_view" id="e_company_view" checked>
                            <label class="form-check-label" for="e_company_view">
                                Company List View
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="company_add" id="e_company_add" checked>
                            <label class="form-check-label" for="e_company_add">
                                Company List Create
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="company_edit" id="e_company_edit" checked>
                            <label class="form-check-label" for="e_company_edit">
                                Company List Update
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="company_delete" id="e_company_delete" checked>
                            <label class="form-check-label" for="e_company_delete">
                                Company List Delete
                            </label>
                        </div>



                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airline_view" id="e_airline_view" checked>
                            <label class="form-check-label" for="e_airline_view">
                                Airline List View
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airline_add" id="e_airline_add" checked>
                            <label class="form-check-label" for="e_airline_add">
                                Airline List Create
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airline_edit" id="e_airline_edit" checked>
                            <label class="form-check-label" for="e_airline_edit">
                                Airline List Update
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airline_delete" id="e_airline_delete" checked>
                            <label class="form-check-label" for="e_airline_delete">
                                Airline List Delete
                            </label>
                        </div>




                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airport_view" id="e_airport_view" checked>
                            <label class="form-check-label" for="e_airport_view">
                                Airport List View
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airport_add" id="e_airport_add" checked>
                            <label class="form-check-label" for="e_airport_add">
                                Airport List Create
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airport_edit" id="e_airport_edit" checked>
                            <label class="form-check-label" for="e_airport_edit">
                                Airport List Update
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airport_delete" id="e_airport_delete" checked>
                            <label class="form-check-label" for="e_airport_delete">
                                Airport List Delete
                            </label>
                        </div>




                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airway_view" id="e_airway_view" checked>
                            <label class="form-check-label" for="e_airway_view">
                                Airway List View
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airway_add" id="e_airway_add" checked>
                            <label class="form-check-label" for="e_airway_add">
                                Airway List Create
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airway_edit" id="e_airway_edit" checked>
                            <label class="form-check-label" for="e_airway_edit">
                                Airway List Update
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airway_delete" id="e_airway_delete" checked>
                            <label class="form-check-label" for="e_airway_delete">
                                Airway List Delete
                            </label>
                        </div>




                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airway_versions_view" id="e_airway_versions_view" checked>
                            <label class="form-check-label" for="e_airway_versions_view">
                                Airway Version List View
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airway_versions_view_single" id="e_airway_versions_view_single" checked>
                            <label class="form-check-label" for="e_airway_versions_view_single">
                                Airway Version View Single Bill
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airway_versions_roll_back" id="e_airway_versions_roll_back" checked>
                            <label class="form-check-label" for="e_airway_versions_roll_back">
                                Airway Roll Back to Version
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="airway_versions_delete" id="e_airway_versions_delete" checked>
                            <label class="form-check-label" for="e_airway_versions_delete">
                                Airway Version List Delete
                            </label>
                        </div>



                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="user_view" id="e_user_view" checked>
                            <label class="form-check-label" for="e_user_view">
                                User List View
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="user_add" id="e_user_add" checked>
                            <label class="form-check-label" for="e_user_add">
                                User List Create
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="user_edit" id="e_user_edit" checked>
                            <label class="form-check-label" for="e_user_edit">
                                User List Update
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="user_delete" id="e_user_delete" checked>
                            <label class="form-check-label" for="e_user_delete">
                                User List Delete
                            </label>
                        </div>




                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="role_view" id="e_role_view" checked>
                            <label class="form-check-label" for="e_role_view">
                                Role List View
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" name="role_add" id="e_role_add" checked>
                            <label class="form-check-label" for="e_role_add">
                                Role List Create
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" id="e_role_edit" name="role_edit" checked>
                            <label class="form-check-label" for="e_role_edit">
                                Role List Update
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="on" id="e_role_delete" name="role_delete" checked>
                            <label class="form-check-label" for="e_role_delete">
                                Role List Delete
                            </label>
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
                   
                    $("#EditModal").modal('toggle');
            });
    });
</script>
@endsection