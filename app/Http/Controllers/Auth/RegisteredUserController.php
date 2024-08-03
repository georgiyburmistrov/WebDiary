<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use App\Events\UserRegistration;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\SentPassword;
use App\Models\Group;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use function Laravel\Prompts\password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $groups = Group::all();

        return view('auth.register', compact('groups'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $password = $validated['password'];

        $user = User::create($validated);

        event(new Registered($user));

        event(new UserRegistration($user, $password));

        Auth::login($user);

        return redirect()->route('users.edit', $user);
    }
}
