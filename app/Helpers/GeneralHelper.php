<?php
use Hashids\Hashids;
     
function jsVariables(){
    $variables = [
        'var' => [
            'base_url' => url('/'),            
        ]
        
    ];

    echo '<script>';
    foreach($variables as $key => $value){
        foreach($value as $k => $v){             
            echo 'var '.$k .'='.'"'. $v.'";';
        }           
    } 
    echo '</script>';     
} 

/* Retrive detail of loged in node details */
function getAdmin($email)
{ 
    $sqluser = DB::table('wsmp_admin')                            
                ->where('a_email', $email)
                ->first();

    if ($sqluser) {        
        return $sqluser;
    }
    return false;         
}  

     
    function has_encode($paramater,$lenght = 16){
        $hashids = new Hashids('',$lenght,'abcdefghijklmnopqrstuvwxyz0123456789');
        return $hashids->encodeHex($paramater);
    }

    function has_decode($paramater,$lenght = 16){        
        $hashids = new Hashids('',$lenght,'abcdefghijklmnopqrstuvwxyz0123456789');
        $number = $hashids->decodeHex($paramater);
                
        return $number;         
    }    
    
    
    function hasController()
    {
        return $controllers = [            
            'dashboard',
            'companies',        
        ];
    }

    function setActive(string $path, string $class_name = "active",$show="")
    {   
        if(!empty($show)){
            if(Request::is($path .'/*') || !empty($show)){
                return $class_name;
            } else {
                return '';
            }
        } else {
            if (Request::is($path .'/*') || Request::path() === $path){
                return $class_name;
            } else {
                return '';
            }
        }                 
    }
?>