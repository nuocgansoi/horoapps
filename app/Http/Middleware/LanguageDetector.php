<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;

class LanguageDetector
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session('app.locale')) {
            session()->put('app.locale', config('app.locale'));
        }
        $supportedLanguages = array_keys(config('languages'));
        if (auth()->check() && in_array(auth()->user()->language, $supportedLanguages)) {
            session()->put('app.locale', $this->getUserLocale(auth()->user()));
        }

        $currentLanguage = session('app.locale');
        if ($request->has('lang') && in_array($request->input('lang'), $supportedLanguages) && $currentLanguage != $request->input('lang')) {
            $currentLanguage = $request->get('lang');
            session()->put('app.locale', $currentLanguage);
        }

        //Set locale language
        app()->setLocale($currentLanguage);
        $locale = substr(config('app.locale'), 0, strpos(config('app.locale'), '_'));
        Carbon::setLocale($locale);

        return $next($request);
    }

    public function getUserLocale(User $user)
    {
        return $user->language . '_' . strtoupper($user->location);
    }
}
