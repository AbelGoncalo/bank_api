<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnforceJsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

         // Verifica se a rota está definida e se o middleware 'api' está presente
        if($request->route() != null && in_array('api',$request->route()->middleware())){

            // Define o cabeçalho 'Accept' para 'application/vnd.api+json'
            $request->headers->set('Accept', 'application/vnd.api+json');
        }

        // Passa a solicitação para o próximo middleware ou controlador
        return $next($request);
    }
}
