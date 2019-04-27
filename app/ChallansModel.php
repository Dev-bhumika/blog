<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;

class ChallansModel extends Model
{
    protected $fillable = ['challan_id','dcno','coating_type','company_dcno','nos','weight','weight_unit','date','created_at','updated_at'];
    protected $table = 'challans';

    public $timestamp = false;

    /* Get challan details */
    public static function getChallan($id=NULL)
    {
        if(!empty($id)){
            $sql = DB::table('challans')->where('id',$id)->first();            
        } else {
            $sql = DB::table('challans')->get();            
        }
        return $sql;
    }
 
    /* Add challan details */
    public function addChallan($data)
    {             
        if(!empty($data)){
                           
            $fields = [
                'company_id' => $data['val_company'], 
                'coating_type' => $data['val_coating_type'],               
                'company_dcno' => $data['val_company_dcno'],                               
                'nos' => $data['val_nos'],                                       
                'weight' => $data['val_weight'],     
                'weight_unit' => $data['val_weight_unit'],
                'date' => $data['val_date'],
            ];

            $sql = DB::table('challans')->insert($fields);
            $challanid = DB::getPdo()->lastInsertId();
                            
            if(!empty($challanid)){
                $request = [
                    'dcno' => $challanid,
                ];
                DB::table('challans')->where('id',$challanid)->update($request);
                  return $challanid;
            }                      
        }
    }

    /* Update challan details */
    public function updateChallan($data,$id)
    {                   
        if(!empty($data)){
                           
            $fields = [
                'company_id' => $data['val_company'], 
                'coating_type' => $data['val_coating_type'],               
                'company_dcno' => $data['val_company_dcno'],                               
                'nos' => $data['val_nos'],                                       
                'weight' => $data['val_weight'],     
                'weight_unit' => $data['val_weight_unit'],
                'date' => $data['val_date'],
            ];

            $sql = DB::table('challans')->where('id',$id)->update($fields);
            return $id;                                  
        }
    }
 
  
    /* Delete challan */
    public function deleteChallan($id=NULL)
    {        
        if(!empty($id)){
            $sql = DB::table('challans')->where('id',$id)->delete();                 
            return $sql;       
        }         
    } 
}
