<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('API-KEY'); // Ambil API Key dari request header

        if ($apiKey !== env('API_SECRET_KEY')) { // Bandingkan dengan API Key di .env
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
