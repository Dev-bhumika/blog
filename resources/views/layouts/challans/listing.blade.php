@extends('main')

@section('content')
<div class="content">
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Challans</h5>
        <div class="header-elements">
            <h class="card-header-action" href="javascript:;" target="_blank" style="float: right;margin-right: 1.25rem">
                <input type="text" class="global_filter form-control-search custom-txtbox" id="global_filter" style="display:none">
                <button type="button" class="btn btn-info dt-search-filter"><i class="icon-search4"></i>&nbsp;Search</button> &nbsp;
            
                <a href="{{url('challans/challan')}}" class="btn btn-dark"><i class="icon-plus2"></i>&nbsp;Add</a>
            </h>
        </div>
    </div>
        
    <table class="table datatable-responsive-row-control" id="DataTables_Table_3">
        <thead>
            <tr>        
                <th></th>                     
                <th>Company</th>                 
                <th>Type</th>   
                <th>D.C.No</th>   
                <th>Nos</th>
                <th>Weight</th>                 
                                    
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>                                               
            @forelse($challans as $challan)

            <tr id='tr-{{$challan->id}}'>
                <td></td>                                                                                              
                <td>{{  $list_companies[$challan->company_id] }} </td>                  
                <td>{{ $challan->coating_type }}</td>
                <td>{{ $challan->company_dcno }}</td>
                <td>{{ $challan->nos . ' '. $challan->weight_unit }}</td>
                <td>{{ $challan->company_dcno * $challan->nos }}</td>
                
                                                                            
                <td class="text-center">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="javascript:;" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"> 
                            <a class="dropdown-item" href="{{url('challans/challan/'.has_encode($challan->id))}}"><i class="icon-pencil7"></i>Edit</a>                                                                                                
                            <a class="deleterow dropdown-item" data-action="challans" data-id="{{ $challan->id }}" data-token="{{ csrf_token() }}" ><i class="icon-trash"></i>Delete</a>												 
                            </div>
                        </div>
                    </div>
                </td>
            </tr>	  
            @empty
                      
           	@endforelse		 
        </tbody>
    </table>
</div>
 </div>
@endsection