<?php
    namespace App\Http\Middleware;
    
    use Closure;
    
    class Cors{
        public function handle($request, Closure $next){
        return $next($request)
        ->header('Access-Control-Allow-Origin','*')
        ->header('Access-Control-Allow-Methods','PUT, POST, GET, PATCH, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }
    }
