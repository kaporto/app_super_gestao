<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$metodo_autenticaco, $perfil): Response
    {
        /*
        if($metodo_autenticaco == 'padrao'){
            echo 'Verificar o usuario e senha no banco de dados '.$perfil.'<br>';
        }else if($metodo_autenticaco == 'ldap'){
            echo 'Verificar o usuario e senha no AD '.$perfil.'<br>';
        }

        if(false){
            return $next($request);
        }else{
            return Response('Acesso negado');
        }
        */
        session_start();
        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        }else{
            return redirect()->route('site.login', ['erro' => 2]);
        }
        
    }
}
