<?php
use App\Agencyuser;


function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

 function count_agencyuser($id){

        $agencyuser = Agencyuser::where('aid', '=', $id)->count();
        return $agencyuser;
    
    }
    function get_last_host($nise_id){

        $lasthost =         Agencyuser::select('created_at')->where('aid', '=', $nise_id)->first();
      
        if($lasthost){
            return   $lasthost['created_at'];
        }else{
            // print_r($lasthost[0]['aid']);
            
            return   null;
        }
        


    }

?>