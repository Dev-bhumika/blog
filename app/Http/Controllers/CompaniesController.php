<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompaniesModel;

class CompaniesController extends Controller
{
	public $companyModel;
	
	public function __construct()
    {
        $this->companyModel = new CompaniesModel();        
    }

    /* Get all companies */
	public function index()
	{
	   	$data['title'] = 'Companies';
        $data['listAsset'] = true;
        $data['companies'] = $this->companyModel->getCompany(); 
        
        return view('layouts.companies.listing',$data);
	}

    /* Add companies details */
    public function company( request $request,$idparam = NULL)
    {
   		$id = has_decode($idparam); 
        
        if(has_encode($id) != $idparam){
            return view('errors.unauthorized');
        }
 
        if(!empty($request->input())){            
            $data = $request->input();
                
            if(!empty($id)){                                                     
                $companyid = $this->companyModel->updateCompany($data,$id); 
               
                $data['message'] = 'Record Updated successfully';  
                $data['class'] = 'success';      
            } else {                
                $companyid = $this->companyModel->addCompany($data);
                 
                if(is_numeric($companyid)){                                  
                    $data['message'] = 'Record Inserted successfully';      
                    $data['class'] = 'success';                      
                } else {
                	return false;
                }                                
            }                     
        }
        if(!empty($idparam)){ 
            $data['id'] = $idparam;                                  
            $data['company'] = $this->companyModel->getCompany($id);                               
            $data['title'] = 'Edit Company';
        } else {     
            $data['title'] = 'Add Company';
        }        
        return view('layouts.companies.company',$data);
    }

    /* Delete company */
    public function delete($id)
    {                        
        if(!empty($id))          
            $this->companyModel->deleteCompany($id);        
        return json_encode(array("status"=>'success',"message" => 'Successfully deleted record'));            
    }
}