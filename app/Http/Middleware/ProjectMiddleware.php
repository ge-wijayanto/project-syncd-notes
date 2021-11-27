<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route()->parameter('id');
        $project = Project::find($id);
        $participant = Participant::where('project_id', $id)
                        ->where('user_id', Auth::id())
                        ->first();

        $owned = $project->user_id === Auth::id();
        $member = $participant !== null;

        if ($owned || $member) {
            return $next($request);
        }
        
        return redirect('dashboard');
    }
}
