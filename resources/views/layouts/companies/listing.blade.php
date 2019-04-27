@extends('main')

@section('content')
<div class="content">
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Companies</h5>
        <div class="header-elements">
            <h class="card-header-action" href="javascript:;" target="_blank" style="float: right;margin-right: 1.25rem">
                <input type="text" class="global_filter form-control-search custom-txtbox" id="global_filter" style="display:none">
                <button type="button" class="btn btn-info dt-search-filter"><i class="icon-search4"></i>&nbsp;Search</button> &nbsp;
            
                <a href="{{url('companies/company')}}" class="btn btn-dark"><i class="icon-plus2"></i>&nbsp;Add</a>
            </h>
        </div>
    </div>
        
    <table class="table datatable-responsive-row-control" id="DataTables_Table_3">
        <thead>
            <tr>        
                <th></th>                     
                <th>Name</th>                 
                <th>Conatact</th>                 
                <th>Status</th>                                
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>                                               
            @forelse($companies as $company)

            <tr id='tr-{{$company->id}}'>
                <td></td>                                                                               
                <td>{{ $company->name }}</td>                
                <td>{{ $company->contactno }}</td>
                
                <?php  
                $class = 'success';
                if($company->status == Config::get('constant.status.ACTIVE')) {
                    $class = 'success';
                } else if($company->status == Config::get('constant.status.INACTIVE')) {
                    $class = 'secondary';
                } else if($company->status == Config::get('constant.status.SUSPENDED')) {
                    $class = 'danger';
                } else if($company->status == Config::get('constant.status.PENDING')) {
                    $class = 'info';
                } 
                ?>
                
                <td><span class="badge badge-{{ $class }}">{{$company->status}}</span></td>                                                                                                                                         
                                                                            
                <td class="text-center">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="javascript:;" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"> 
                            <a class="dropdown-item" href="{{url('companies/company/'.has_encode($company->id))}}"><i class="icon-pencil7"></i>Edit</a>                                                                                                
                            <a class="deleterow dropdown-item" data-action="companies" data-id="{{ $company->id }}" data-token="{{ csrf_token() }}" ><i class="icon-trash"></i>Delete</a>												 
                            </div>
                        </div>
                    </div>
                </td>
            </tr>	  
            @empty
            <tr>No replies</tr>          
           	@endforelse		 
        </tbody>
    </table>
</div>
 </div>
@endsection