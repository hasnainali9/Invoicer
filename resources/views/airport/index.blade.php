@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Airports List</h4>
            </div>
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#AddModal" class="btn btn-info">+ Add Airport</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table style-1" id="ListDatatableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Unique Id</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Airports as $key=>$Airport)
                        <tr>
                            <td>
                                <h6>{{($key+1)}}.</h6>
                            </td>
                            <td>
                                <div class="media style-1">
                                    <div class="media-body">
                                        <h6>{{$Airport->name}}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span>{{$Airport->identification_no}}</span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span>{{$Airport->location}}</span>
                                </div>
                            </td>
                            <td>
                                {{Carbon\Carbon::parse($Airport->created_at)->diffForHumans()}}
                            </td>
                            <td>
                                @if($Airport->status)
                                   <a href="{!!route('airports.status.update',['id'=>base64_encode($Airport->id),'status'=>base64_encode('false')])!!}"><span class="badge badge-success">Active</span></a> 
                                @else
                                    <a href="{!!route('airports.status.update',['id'=>base64_encode($Airport->id),'status'=>base64_encode('true')])!!}"><span class="badge badge-danger">In-Active</span></a> 
                                @endif
                            </td>
                            <td>
                                <div class="d-flex action-button">
                                    <a href="javascript:void(0);" data-id="{{$Airport->id}}" data-name="{{$Airport->name}}" data-identifier="{{$Airport->identification_no}}" data-location="{{$Airport->location}}" class="btn btn-info btn-xs light px-2 edit-trigger">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <a href="{{route('airports.destroy',['id'=>$Airport->id])}}" class="ms-2 btn btn-xs px-2 light btn-danger">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
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
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('airports.store')}}" method="POST">
                    <div class="modal-body">
                        @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Airport Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Unique Id</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Airport Id " name="identification_no">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <textarea name="location" cols="30" rows="10" class="form-control"></textarea>
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
                                <input type="text" id="name" name="name" class="form-control" placeholder="Airport Name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Unique Id</label>
                            <div class="col-sm-9">
                                <input type="text" id="identification_no" class="form-control" placeholder="Airport Id " name="identification_no">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-9">
                                <textarea name="location" id="location" cols="30" rows="10" class="form-control"></textarea>
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
                    $("#identification_no").val($(this).attr('data-identifier'));
                    $("#location").val($(this).attr('data-location'));
                    $("#EditModal").modal('toggle');
            });
    });
</script>
@endsection