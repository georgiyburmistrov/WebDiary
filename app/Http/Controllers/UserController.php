<?php

namespace App\Http\Controllers;

use App\Http\Filters\UserFilter;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\SentPassword;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::filter($request)->cursorPaginate(10);

        return view('users.index', compact('users'));
    }

    public function create(Group $group): View
    {
        $groups = Group::all();

        return view('users.create', ['groups' => $groups, 'selectedGroup' => null]);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        User::create($validated);

        return redirect()->route('users.index');
    }

    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        $groups = Group::all();

        $selectedGroup = $user->group_id;

        return view('users.edit', compact('user', 'groups', 'selectedGroup'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Group updated successfully');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
