<?php
namespace App\Supports ;

class Api {

  public function kota(){
    $curl = curl_init();
    curl_setopt_array($curl,array(
      CURLOPT_URL => "http://api.samarindakota.go.id/api/v1/kota",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
      // CURLOPT_ENCODING => "",
      CURLOPT_TIMEOUT => 300,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array (
        'Content-Type : application/json',
        'Authorization :'.$this->token(),
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "error = ".$err ;
    }else{
      $data = json_decode($response, true);
      return response()->json($data);
    }
  }

  public function token()
  {
    return 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImM4ZTcyNzViZTM1YmUzMWE0OTdmMTI0OWE1ODc3MjcyNWE3NTZhZDc4MGY4ODdmYmI2NTQ4MmIwZDMzMDUwYzk4MzFjNmYxOGM2NWZkMmVhIn0.eyJhdWQiOiIzIiwianRpIjoiYzhlNzI3NWJlMzViZTMxYTQ5N2YxMjQ5YTU4NzcyNzI1YTc1NmFkNzgwZjg4N2ZiYjY1NDgyYjBkMzMwNTBjOTgzMWM2ZjE4YzY1ZmQyZWEiLCJpYXQiOjE1MjA2Njg2MDMsIm5iZiI6MTUyMDY2ODYwMywiZXhwIjoxNTUyMjA0NjAzLCJzdWIiOiI0NiIsInNjb3BlcyI6WyJQcm92aW5zaSIsIkthYnVwYXRlblwvS290YSIsIktlY2FtYXRhbiIsIktlbHVyYWhhbiJdfQ.ozDOhmgTSVRIPr70QVaQLyrZdzpkgAlz06ifdDpZossi-d-u8hQ-zEKShunswgK2lKp6I8j9WH-mWs7PZZsgHxUQulvQ_96zaCrL5-Bgt9ihoLuJ1n2wDh2nCdmri_a8k3vA_nvoIom-IhUxr4MjWDyFgMYKuUDfTezvPHB1HBi_HV6Ui76g6DPlIk-6o0_PEV0q_E3yq7mwwdiLoKw5GYcWk0xDdMBBYXpjovrOrwCd82cchMOeNKnKGx0CGrTuVHfQYb6T9YBypOOy-JZNbm1LuSSRRHzSjaA71Drc9a_H0hNAvpQS30mvQjdMi9qL-BcRsQMB4JzGsR_pmLLOad_OXOM3yVxnpRwQUHUAsqy5QvP6P8MrHc8nNyO-0sYjgy_vvKSd7hNVY6rw_XAMsHZWc9G4RRnmNOoG035Q17-lmQvvmKQeG5BU1HprP1BhcP_WC4JJF-Fkyv7tv6UjgYsnyV0bbOu4ZiMRsyj_36yHL3A1V2bg1Edb2BSPpQ_i3_L6m8VRrh7pJKtWS06LhLT4Ktz65xIBLcp41rhLqeiuQFHm6K-aFYiYHumLddRr67nQ-501D4twa5egRLmlzNfJLvilGCpcx9dhiZowOnCtdUkApwTrMOEhvdkcMF6_rSrTe953YgfgAWn42pvHjsJIN-u39raZeFPyzTJrNUo';
  }
}