<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class PatientMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Session::has('patient_id')) {
            $patient = \App\Models\Patient::find(Session::get('patient_id'));
            view()->share('patient', $patient);
        }

        return $next($request);
    }
}
