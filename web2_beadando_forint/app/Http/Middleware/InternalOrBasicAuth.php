<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InternalOrBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Hitelesítés nélkül továbbítja, belső kérésekhez
        $internalHeader = $request->header('X-Internal-Request') === 'true';
        if ($internalHeader) {
            return $next($request); 
        }

        // Basic Auth hitelesítés külső kérésekhez
        $authHeader = $request->header('Authorization');
        if (preg_match('/Basic (.*)/i', $authHeader, $matches)) {
            $credentials = base64_decode($matches[1]);
            [$email, $passw] = explode(':', $credentials);

            $user = \App\Models\User::where('email', $email)->first();

            if (!$user) {
                error_log("User not found for email: {$email}");
                return response()->json(['message' => 'Unauthorized'], 401);
            }
    
            if (!password_verify($passw, $user->password)) {
                error_log("Password does not match for user: {$email}");
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            return $next($request);
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
