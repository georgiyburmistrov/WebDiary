<?php

namespace App\Http\Controllers;

use App\Http\Filters\GroupFilter;
use App\Http\Filters\SubjectFilter;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubjectController extends Controller
{
    public function index(Request $request): View
    {
        $subjects = Subject::filter($request)->cursorPaginate(10);

        return view('subjects.index', compact('subjects'));
    }

    public function create(): View
    {
        return view('subjects.create');
    }

    public function store(StoreSubjectRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $subject = Subject::create($validated);

        return redirect()->route('subjects.index')->with('subjects', $subject);
    }

    public function show(Subject $subject): View
    {
        return view('subjects.show', $subject)->with('subjects', $subject);
    }

    public function edit(Subject $subject): View
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject): RedirectResponse
    {
        $validated = $request->validated();

        $subject->update($validated);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully');
    }

    public function destroy(Request $request, Subject $subject): RedirectResponse
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success','Subject deleted successfully');
    }
}
