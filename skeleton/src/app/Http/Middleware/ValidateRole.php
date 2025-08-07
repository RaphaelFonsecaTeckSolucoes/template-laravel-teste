<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Json;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ValidateRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = $request->route()->uri;

        $permissions = [
            "cozinheiro",
            "parteira",
            "fuzileiro_naval",
            "gerente-rh",
            "gerente_geral",
            "manage-account",
            "uma_protection",
            "view:empresa"
        ];

        if(!Auth::hasAnyRole('account', $permissions)){
            throw new UnauthorizedHttpException('Não autorizado');
        }

        return $next($request);
    }
}
