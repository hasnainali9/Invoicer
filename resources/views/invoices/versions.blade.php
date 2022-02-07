@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Invoices (E{{$Invoice->no_of_edits}}-{{$Invoice->airline_provided_unique_id}}) Versions List</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table style-1" id="ListDatatableView">
                    <thead>
                        <tr>

                            <th>Version Id</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Versions as $key=>$Invoice)
                        <tr>
                            <td>
                                <h6>#{{($key+1)}}</h6>
                            </td>
                           
                            <td>
                                {{Carbon\Carbon::parse($Invoice->created_at)->diffForHumans()}}
                            </td>
                            <td>
                                {{Carbon\Carbon::parse($Invoice->updated_at)->diffForHumans()}}
                            </td>
                        
                            <td>
                                <div class="d-flex action-button">
                                    @if(CheckRolePermission('airway_versions_view_single'))
                                    <a href="{{route('invoices.view.single.versions.show',['id'=>base64_encode($Invoice->id)])}}"  class="btn btn-primary btn-xs light mx-3 px-2 edit-trigger">
                                       <i class="fa fa-eye"></i>
                                    </a>
                                    @endif
                                    @if(CheckRolePermission('airway_versions_roll_back'))
                                    <a  href="{{route('invoices.view.single.versions.roll.back',['id'=>base64_encode($Invoice->id)])}}"  class="btn btn-secondary btn-xs light mx-2 px-2 edit-trigger">
                                        <i class="fas fa-sync"></i>
                                     </a>
                                    @endif
                                    @if(CheckRolePermission('airway_versions_delete'))
                                    <a href="{{route('invoices.view.single.versions.destroy',['id'=>base64_encode($Invoice->id)])}}" class="ms-2 btn btn-xs px-2 light btn-danger">
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
