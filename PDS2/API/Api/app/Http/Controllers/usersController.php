<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class usersController extends Controller
{
    private $user;


    public function __construct(User $user){

        $this->user=$user;

    }

    public function registrar(Request $request){

        // comando que esta fazendo salvar os dados no banco
        try{
        // cria variavel user_email
        // vai classe User, e faz uma requisição para pegar a primeira ocorrência do parametro da requisição
                                // email coluna do banco   // email que esta na requisição
        $user_email=User::where('email',$request->get('email'))->first();
        
        // verifica se ja tem email cadastrado atraves do comando acima
        if(!$user_email)
        {
            $this->user->create($request->all());
            return response()->json([
                'status'=>true
            
            ]);
        }
        else 
        {
            return response()->json([
                'status'=>false,
                // retorna mensagem de erro
                'erro'=>'Erro, email ja cadastrado!'
            ]);
        }

    }catch(\Exception $e)
    {
        return response()->json([
            'status'=>false,
            'erro'=>$e->getMessage()
        ]);
    }
        


        
    }
    public function logar(Request $request){
        
    $user_email=User::where('email',$request->get('email'))->first();
    
    if(!$user_email)
    {
        return response()->json([
            'status'=>false,
            // retorna mensagem de erro
            'erro'=>'Erro, email não existe!'
        ]);
        
        
        
    }
    else 
    {
        
        if($user_email->password == $request->get('password'))
        {
            return response()->json([
                'status'=>true,
                'menssage'=>'Login realizado com sucesso!',
                'data'=> $user_email
            ]);
        }
        else 
        {
            return response()->json([
                'status'=>false,
                // retorna mensagem de erro
                'erro'=>'Erro, senha incorreta!'
            ]);
        }
        
        
        
    }




    }
}
