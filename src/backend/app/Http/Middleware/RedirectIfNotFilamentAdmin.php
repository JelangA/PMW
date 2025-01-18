<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Database\Eloquent\Model;

class RedirectIfNotFilamentAdmin extends Middleware
{
    // protected function authenticate($request, array $guards)
    // {
    //     $auth = Filament::auth();

    //     if (!$auth->check()) {
    //         $this->unauthenticated($request, $guards);

    //         return;
    //     }

    //     $this->auth->shouldUse(Filament::getAuthGuard());

    //     /** @var Model $user */
    //     $user = $auth->user();

    //     // dd($user);

    //     if ($user->nim !== null) {
    //         // Jika pengguna memiliki nim, tolak akses dengan pesan error
    //         abort(403, 'Hanya admin yang dapat mengakses Admin Panel.');
    //     }

    //     $panel = Filament::getCurrentPanel();

    //     if ($user instanceof FilamentUser || $user->nim === null) {
    //         if (!$user->canAccessPanel($panel) && config('app.env') !== 'local') {
    //             return redirect(route('user.home'));
    //         }
    //     }
    // }

    protected function authenticate($request, array $guards): void
    {
        $guard = Filament::auth();

        if (! $guard->check()) {
            $this->unauthenticated($request, $guards);

            return; /** @phpstan-ignore-line */
        }

        $this->auth->shouldUse(Filament::getAuthGuard());

        /** @var Model $user */
        $user = $guard->user();

        if ($user->nim !== null) {
            // Jika pengguna memiliki nim, tolak akses dengan pesan error
            abort(403, 'Hanya admin yang dapat mengakses Admin Panel.');
        }

        $panel = Filament::getCurrentPanel();

        abort_if(
            $user instanceof FilamentUser ?
                (! $user->canAccessPanel($panel)) :
                (config('app.env') !== 'local'),
            403,
        );
    }

    protected function redirectTo($request): ?string
    {
            return Filament::getLoginUrl();
    }
}
