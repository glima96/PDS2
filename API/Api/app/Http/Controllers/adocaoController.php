<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adocao;
class adocaoController extends Controller
{
  
    private $adocao;


    public function __construct(Adocao $adocao){

        $this->adocao=$adocao;

    }

    public function registrarPET(Request $request){

       
           $this->adocao->create($request->all());
            return response()->json([
                'status'=>true
            
            ]);
        
       

        
    }
   
}
