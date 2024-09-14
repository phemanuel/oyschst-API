<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckApiToken
{
    public function handle(Request $request, Closure $next)
    {
               
        Log::info('Middleware CheckApiToken executed', [
            'user' => $request->header('X-Api-User'),
            'token' => $request->header('X-Api-Token')
        ]);

        $user = $request->header('X-Api-User');
        $token = $request->header('X-Api-Token');


        $validUser = 'your-aoi-user';
        $validToken = 'your-api-token';

        if ($user !== $validUser || $token !== $validToken) {
            return response()->json(['error' => 'Unauthorized Access'], 401);
        }

        return $next($request);
    }
}

