<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;

class CompaniesModel extends Model
{
    protected $fillable = ['name','contactno','address','gstno','status','created_at','updated_at'];
    protected $table = 'companies';

    public $timestamp = false;

    /* Get company details */
    public static function getCompany($id=NULL)
    {
        if(!empty($id)){
            $sql = DB::table('companies')->where('id',$id)->first();            
        } else {
            $sql = DB::table('companies')->get();            
        }
        return $sql;
    }

    /* Get name of companies */
    public function getCompanyName()
    {        
        $companies = $this->getCompany();         

        $result = [];
        foreach($companies as $company){
            $result[$company->id] = $company->name;    
        }         
        return $result;
    }
    
 
    /* Add company details */
    public function addCompany($data)
    {             

        if(!empty($data)){
                           
            $fields = [
                'name' => $data['val_name'],                   
                'contactno' => $data['val_contactno'],                               
                'address' => $data['val_address'],                                       
                'gstno' => $data['val_gstno'],                                        
                'status' => Config::get('constant.status.ACTIVE'),                                      
            ];

            $sql = DB::table('companies')->insert($fields);
            $companyid = DB::getPdo()->lastInsertId();
                            
            if(!empty($companyid)){
                  return $companyid;
            }                      
        }
    }

    /* Update company details */
    public function updateCompany($data,$id)
    {                   
        if(!empty($data)){
                           
            $fields = [
                'name' => $data['val_name'],                   
                'contactno' => $data['val_contactno'],                               
                'address' => $data['val_address'],                                       
                'gstno' => $data['val_gstno'],                                        
                'status' => $data['val_status'],                                      
            ];

            $sql = DB::table('companies')->where('id',$id)->update($fields);
            return $id;                                  
        }
    }
 
  
    /* Delete company */
    public function deleteCompany($id=NULL)
    {        
        if(!empty($id)){
            $sql = DB::table('companies')->where('id',$id)->delete();                 
            return $sql;       
        }         
    }
 
}
