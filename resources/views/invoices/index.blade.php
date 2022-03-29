@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Invoices List</h4>
            </div>
            @if(CheckRolePermission('airway_add'))
            <a href="{{route('invoices.add')}}" class="btn btn-info">+ Add Invoice</a>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table style-1" id="ListDatatableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice No</th>
                            <th>Shipper Signature</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Invoices as $key=>$Invoice)
                        <tr>
                            <td>
                                <h6>{{($key+1)}}.</h6>
                            </td>
                            <td>
                                <div class="media style-1">
                                    <div class="media-body">
                                        <h6>E{{$Invoice->no_of_edits}}-{{$Invoice->airline_provided_unique_id}}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media style-1">
                                    <div class="media-body">
                                        <h6>{{$Invoice->shipper_signature}}</h6>
                                    </div>
                                </div>
                            </td>
                           
                            <td>
                                {{Carbon\Carbon::parse($Invoice->created_at)->diffForHumans()}}
                            </td>
                            <td>
                                {{Carbon\Carbon::parse($Invoice->updated_at)->diffForHumans()}}
                            </td>
                        
                            <td>
                                <div class="d-flex action-button">
                                    @if(CheckRolePermission('airway_view'))
                                    <a href="{{route('invoices.view.single',['id'=>base64_encode($Invoice->id)])}}"  class="btn btn-primary btn-xs light mx-2 px-2 edit-trigger">
                                       <i class="fa fa-eye"></i>
                                    </a>
                                    @endif
                                    @if(CheckRolePermission('airway_view'))
                                    <a href="{{route('invoices.duplicate.add.show',['id'=>base64_encode($Invoice->id)])}}"  class="btn btn-info btn-xs light mx-2 px-2 edit-trigger">
                                        <i class="fa fa-clone"></i>
                                    </a>
                                    @endif
                                    @if(CheckRolePermission('airway_edit'))
                                    <a href="{{route('invoices.update.show',['id'=>base64_encode($Invoice->id)])}}"  class="btn btn-info btn-xs light mx-2 px-2 edit-trigger">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    @endif
                                    @if(CheckRolePermission('airway_versions_view'))                                    
                                    <a  href="{{route('invoices.view.single.versions',['id'=>base64_encode($Invoice->id)])}}"  class="btn btn-secondary btn-xs light mx-2 px-2 edit-trigger">
                                        <i class="fa fa-list "></i>
                                     </a>
                                    @endif
                                    @if(CheckRolePermission('airway_delete'))
                                    <a href="{{route('invoices.destroy',['id'=>base64_encode($Invoice->id)])}}" class="ms-2 btn btn-xs px-2 light btn-danger">
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


@endsection

