@extends('main')

@section('content')
<!-- Fieldset legend -->
<div class="content">
<div class="row">
        
    <div class="col-md-12">
        @if(isset($message) && isset($class) )                  
            <div class="alert alert-{{$class}} alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" id="error-msg">&times;</a>{{$message}}</div>
        @endif
        <!-- Advanced legend -->
        <div class="card">
        @if(isset($id))                    
            <form class="form-validate-jquery" action="{{url('challans/challan').'/'.$id}}" method="POST">
        @else
            <form class="form-validate-jquery" action="{{url('challans/challan')}}" method="POST">
        @endif
                @csrf
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Challan</h5>
                    <div class="header-elements">
                        <div class="text-right">
                            <a class="btn btn-secondary" href="{{url('challans')}}">Back</a>
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
                                <label for="val_status" class="col-lg-3 col-form-label">Company <span class="text-danger">*</span> </label>
                                <div class="col-lg-9">      
                                    <select class="form-control" id="val_company" name="val_company" required title="Plase choose any one">                          
                                        <option value="">Select Company</option>
                                        <?php 
                                        if(isset($companies)){ 
                                            foreach($companies as $company){ 
                                            $selected = '';
                                            if(isset($challan) && $company->id == $challan->company_id){
                                                $selected = 'selected';
                                            }
                                        ?>
                                        <option value="{{ $company->id }}" <?= $selected; ?>>{{$company->name}}</option>
                                        <?php } } ?>              
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="val_status" class="col-lg-3 col-form-label">Coating Type <span class="text-danger">*</span> </label>
                                <div class="col-lg-9">      
                                    <select class="form-control" id="val_coating_type" name="val_coating_type" required title="Plase choose any one">                          
                                        <option value="">Select Coating Type</option>
                                        <?php 

                                          $block = $phoshp = $zinc = '';
                                          if(isset($challan)){
                                          if( Config::get('constant.coatingtype.BLOCKODIZING') == $challan->coating_type )
                                              $block = 'selected';
                                          else if(Config::get('constant.coatingtype.PHOSPHATING') == $challan->coating_type )
                                              $phoshp = 'selected';
                                          else if(Config::get('constant.coatingtype.ZINC') == $challan->coating_type )
                                              $zinc = 'selected'; 
                                              }                                           
                                          ?>
                                        <option value="{{Config::get('constant.coatingtype.BLOCKODIZING')}}" <?= $block; ?>>{{Config::get('constant.coatingtype.BLOCKODIZING')}}</option>
                                        <option value="{{Config::get('constant.coatingtype.PHOSPHATING')}}" <?= $phoshp; ?>>{{Config::get('constant.coatingtype.PHOSPHATING')}}</option>                    
                                        <option value="{{Config::get('constant.coatingtype.ZINC')}}" <?= $zinc; ?>>{{Config::get('constant.coatingtype.ZINC')}}</option>                    
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">DCNO <span class="text-danger">*</span></label>
                                <div class="col-lg-9">                                    
                                    <input type="text" class="form-control" id="val_company_dcno" value="{{ $challan->company_dcno ?? '' }}" name="val_company_dcno" placeholder="Enter dcno" title="Please enter dcno" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">NOS </label>
                                <div class="col-lg-9">                                    
                                    <input type="text" class="form-control" id="val_nos" value="{{ $challan->nos ?? '' }}" name="val_nos" placeholder="Enter nos" title="Pelase enter nos" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Weight</label>
                                <div class="col-lg-9">                                    
                                    <input type="text" class="form-control" id="val_weight" value="{{ $challan->weight ?? '' }}" name="val_weight" placeholder="Enter weight" title="Please enter weight">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="val_status" class="col-lg-3 col-form-label">Weight Unit<span class="text-danger">*</span> </label>
                                <div class="col-lg-9">      
                                    <select class="form-control" id="val_weight_unit" name="val_weight_unit" required title="Plase choose any one">                          
                                        <option value="">Select Challan</option>
                                        <?php 
                                          $kilo = $gram = $kilogram = '';
                                            if( isset($challan) && Config::get('constant.measurement.KILO') == $challan->weight_unit )
                                              $kilo = 'selected';
                                            else if(isset($challan) && Config::get('constant.measurement.GRAM') == $challan->weight_unit )
                                                $gram = 'selected';  
                                            else if(isset($challan) && Config::get('constant.measurement.KILOGRAM') == $challan->weight_unit )
                                                $kilogram = 'selected';                                                                                
                                          ?>
                                        <option value="{{Config::get('constant.measurement.KILO')}}" <?= $kilo; ?>>{{Config::get('constant.measurement.KILO')}}</option>
                                        <option value="{{Config::get('constant.measurement.GRAM')}}" <?= $gram; ?>>{{Config::get('constant.measurement.GRAM')}}</option> 
                                        <option value="{{Config::get('constant.measurement.KILOGRAM')}}" <?= $kilogram; ?>>{{Config::get('constant.measurement.KILOGRAM')}}</option>                    
                                                     
                                    </select>
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date</label>
                                <div class="col-lg-9">                                    
                                    <input type="text" class="form-control" id="val_date" value="{{ $challan->date ?? '' }}" name="val_date" placeholder="Enter date" title="Please enter date">
                                </div>
                            </div>  
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
 </div>
@endsection