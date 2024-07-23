<?php

namespace App\Http\Controllers;

use App\Http\Filters\GroupFilter;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use App\Http\Filters;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PhpParser\Builder;


class GroupController extends Controller
{

    public function index(Request $request): View
    {
        $groups = Group::filter($request)->cursorPaginate(10);

        return view('groups.index', compact('groups'));
    }

    public function create(): View
    {
        return view('groups.create');
    }

    public function store(StoreGroupRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $group = Group::create($validated);

        return redirect()->route('groups.index')->with('groups', $group);
    }

    public function show(Group $group): View
    {
        $subjects = Subject::with([
            'users' => function($query) use ($group) {
                $query->where('group_id', $group->id);
            }
        ])->get();
        $subjects->each(fn ($subject) => $subject->avg = $subject->users->avg('pivot.assessment'));

        $users = $group->users;

        $aStudents = $users->filter(fn ($user) => $user->subjects->min('pivot.assessment') == 5);
        $bStudents = $users->filter(fn ($user) => $user->subjects->min('pivot.assessment') == 4);

        return view('groups.show',
            ['group' => $group,
            'users' => $users,
            'subjects' => $subjects,
            'aStudents' => $aStudents,
            'bStudents' => $bStudents,]);
    }

    public function edit(Group $group): View
    {
        return view('groups.edit', compact('group'));
    }

    public function update(UpdateGroupRequest $request, Group $group): RedirectResponse
    {
        $validated = $request->validated();
        $group->update($validated);
        return redirect()->route('groups.index')->with('success', 'Group updated successfully');
    }

    public function destroy(Group $group): RedirectResponse
    {
        $group->users()->delete();
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully');
    }
}
