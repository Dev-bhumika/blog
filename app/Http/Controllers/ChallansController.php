<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChallansModel;
use App\CompaniesModel;
use PDF;

class ChallansController extends Controller
{
	public $challanModel;
    public $companyModel;
	
	public function __construct()
    {
        $this->challanModel = new ChallansModel();        
        $this->companyModel = new CompaniesModel();        
        
    }

    /* Get all challan */
	public function index()
	{
	   	$data['title'] = 'Challans';
        $data['listAsset'] = true;
        $data['challans'] = $this->challanModel->getChallan(); 
        $data['list_companies'] = $this->companyModel->getCompanyName();   
        
        return view('layouts.challans.listing',$data);
	}

    /* Get all challan view */
    public function view($idparam = NULL)
    {
        $id = has_decode($idparam);

        if(has_encode($id) != $idparam){
            return view('errors.unauthorized');
        }
        $data['title'] = 'View Challan';
        $data['listAsset'] = true;
        $data['id'] = $idparam;     
        $data['challans'] = $this->challanModel->getChallan($id); 
        $data['list_companies'] = $this->companyModel->getCompanyName();   
        
        return view('layouts.challans.view',$data);
    }
 
    public function generatePDF($idparam = NULL)
    {
        $id = has_decode($idparam);

        if(has_encode($id) != $idparam){
            return view('errors.unauthorized');
        }

   //     $data['challans'] = $this->challanModel->getChallan($id); 
   //     $data['list_companies'] = $this->companyModel->getCompanyName(); 
    //    $data['id'] = $idparam;   
        $data = ['title' => 'Welcome to HDTuto.com'];
        
        $pdf = PDF::loadView('layouts.challans.pdf',$data);

          
        return $pdf->download('tuts_notes.pdf');
    }

    /* Add challan details */
    public function challan( request $request,$idparam = NULL)
    {
   		$id = has_decode($idparam); 
        
        if(has_encode($id) != $idparam){
            return view('errors.unauthorized');
        }
 
        if(!empty($request->input())){            
            $data = $request->input();
                
            if(!empty($id)){                                                     
                $challanid = $this->challanModel->updateChallan($data,$id); 
               
                $data['message'] = 'Record Updated successfully';  
                $data['class'] = 'success';      
            } else {                
                $challanid = $this->challanModel->addChallan($data);
                 
                if(is_numeric($challanid)){                                  
                    $data['message'] = 'Record Inserted successfully';      
                    $data['class'] = 'success';
                    return redirect(url('challans/view/'.has_encode($challanid)));                      
                } else {
                	return false;
                }                                
            }                     
        }

        if(!empty($idparam)){ 
            $data['id'] = $idparam;                                  
            $data['challan'] = $this->challanModel->getChallan($id);                                            
            $data['title'] = 'Edit Challan';
        } else {     
            $data['title'] = 'Add Challan';
        }        

        $data['companies'] = $this->companyModel->getCompany(); 
    
        return view('layouts.challans.challan',$data);
    }

    /* Delete challan */
    public function delete($id)
    {                        
        if(!empty($id))          
            $this->challanModel->deleteChallan($id);        
        return json_encode(array("status"=>'success',"message" => 'Successfully deleted record'));            
    }
}