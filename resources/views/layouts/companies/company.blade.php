@extends('main')

@section('content')
<div class="content">
<!-- Fieldset legend -->
<div class="row">
        
    <div class="col-md-12">
        @if(isset($message) && isset($class) )                  
            <div class="alert alert-{{$class}} alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" id="error-msg">&times;</a>{{$message}}</div>
        @endif
        <!-- Advanced legend -->
        <div class="card">
        @if(isset($id))                    
            <form class="form-validate-jquery" action="{{url('companies/company').'/'.$id}}" method="POST">
        @else
            <form class="form-validate-jquery" action="{{url('companies/company')}}" method="POST">
        @endif
                @csrf
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Company</h5>
                    <div class="header-elements">
                        <div class="text-right">
                            <a class="btn btn-secondary" href="{{url('companies')}}">Back</a>
                            <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-body">                    
                    <fieldset>
                        <legend class="font-weight-semibold text-uppercase font-size-sm">
                            <i class="icon-file-text2 mr-2"></i>
                            General Information
                            <a class="float-right text-default" data-toggle="collapse" data-target="#demo1">
                                <i class="icon-circle-down2"></i>
                            </a>
                        </legend>

                        <div class="collapse show col-md-7" id="demo1">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-9">                                    
                                    <input type="text" class="form-control" id="val_name" value="{{ $company->name ?? '' }}" name="val_name" placeholder="Enter name" title="Please enter name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Contact Number </label>
                                <div class="col-lg-9">                                    
                                    <input type="text" class="form-control" id="val_contactno" value="{{ $company->contactno ?? '' }}" name="val_contactno" placeholder="Enter contact number" title="Plase enter contact number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">GST No </label>
                                <div class="col-lg-9">                                    
                                    <input type="text" class="form-control" id="val_gstno" value="{{ $company->gstno ?? '' }}" name="val_gstno" placeholder="Enter gst number">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address <span class="text-danger">*</span></label>
                                <div class="col-lg-9">                                    
                                    <textarea type="text" class="form-control" id="val_address" value="" name="val_address" placeholder="Enter address" title="Please enter address" required >{{ $company->address ?? '' }}</textarea>
                                </div>
                            </div>


                            @if(!empty($id))                            
                                <div class="form-group row">
                                  <label for="val_status" class="col-lg-3 col-form-label">Status <span class="text-danger">*</span> </label>
                                  <div class="col-lg-9">      
                                  <select class="form-control" id="val_status" name="val_status" required title="Plase choose any one">                          
                                    <option value="">Select Status</option>
                                    <?php 
                                      $pending = $active = $inactive = '';
                                      if( Config::get('constant.status.PENDING') == $company->status )
                                          $pending = 'selected';
                                      else if(Config::get('constant.status.ACTIVE') == $company->status )
                                          $active = 'selected';
                                      else if(Config::get('constant.status.INACTIVE') == $company->status )
                                          $inactive = 'selected';                                            
                                      ?>
                                      <option value="{{Config::get('constant.status.PENDING')}}" <?= $pending; ?>>{{Config::get('constant.status.PENDING')}}</option>
                                      <option value="{{Config::get('constant.status.ACTIVE')}}" <?= $active; ?>>{{Config::get('constant.status.ACTIVE')}}</option>                    
                                      <option value="{{Config::get('constant.status.INACTIVE')}}" <?= $inactive; ?>>{{Config::get('constant.status.INACTIVE')}}</option>                    
                                    </select>
                                </div>
                                </div>
                            @endif  
                             
                        </div>
                    </fieldset>

                </div>
            </form>
        </div>
        <!-- /a legend -->

    </div>
</div>
</div>
<!-- /fieldset legend -->
 
@endsection