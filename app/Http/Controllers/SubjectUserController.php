<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectUserRequest;
use App\Http\Requests\UpdateSubjectUserRequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SubjectUserController extends Controller
{

    public function create(User $user): View
    {
        $subjects = Subject::all();

        return view('subjects_users.create', compact('user', 'subjects'));
    }

    public function store(StoreSubjectUserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        $user->subjects()->attach($validated['subject_id'], ['assessment' => $validated['assessment']]);

        return redirect()->route('users.show', compact('user'))->with('success', 'Assessment created successfully');
    }

    public function edit(User $user, Subject $subject): View
    {
        return view('subjects_users.edit', compact('user', 'subject'));
    }

    public function update(UpdateSubjectUserRequest $request, User $user, Subject $subject): RedirectResponse
    {
        $validated = $request->validated();

        $user->subjects()->updateExistingPivot($validated['subject_id'], ['assessment' => $validated['assessment']]);

        return redirect()->route('users.show', compact('user'))->with('success', 'Assessment updated successfully');
    }

    public function destroy(Request $request, User $user, Subject $subject): RedirectResponse
    {
        $user->subjects()->detach($subject->id);

        return redirect()->route('users.show', compact('user'))->with('success','Assessment deleted successfully');
    }
}
