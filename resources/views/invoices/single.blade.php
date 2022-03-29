@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">PDF Pages List</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <a href="{{route('invoices.view.download',base64_encode($Invoice->id))}}" class="btn btn-primary">Download Full PDF</a>
                <button class="btn btn-secondary">Download Selected</button>
            </div>
            <div class="table-responsive">
                <table class="table style-1" id="ListDatatableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Page</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($InvoicePages as $key=>$InvoicePage)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{$InvoicePage->id}}" class="form-check-input BulkCheck" name="BulkCheck">
                            </td>
                            <td>
                                <div class="media style-1">
                                    <div class="media-body">
                                        <h6>{{$InvoicePage->title}}</h6>
                                    </div>
                                </div>
                            </td>
                           
                            <td>
                                {{Carbon\Carbon::parse($InvoicePage->created_at)->diffForHumans()}}
                            </td>
                            <td>
                                {{Carbon\Carbon::parse($InvoicePage->updated_at)->diffForHumans()}}
                            </td>
                        
                            <td>
                                <div class="d-flex action-button">
                                    @if(CheckRolePermission('airway_view'))
                                    <a href="{{route('invoices.view.single',['id'=>base64_encode($InvoicePage->id)])}}"  class="btn btn-primary btn-xs light mx-2 px-2 edit-trigger">
                                       <i class="fa fa-download"></i>
                                    </a>
                                    @endif
                                    @if(CheckRolePermission('airway_view'))
                                    <a href="{{route('invoices.duplicate.add.show',['id'=>base64_encode($InvoicePage->id)])}}"  class="btn btn-info btn-xs light mx-2 px-2 edit-trigger">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    @endif
                                    @if(CheckRolePermission('airway_edit'))
                                    <a href="{{route('invoices.update.show',['id'=>base64_encode($InvoicePage->id)])}}"  class="btn btn-secondary btn-xs light mx-2 px-2 edit-trigger">
                                        <i class="fas fa-envelope"></i>
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

