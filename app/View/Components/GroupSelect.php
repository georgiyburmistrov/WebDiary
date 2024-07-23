<?php

namespace App\View\Components;

use App\Models\Group;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GroupSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $groups, public $selectedGroup = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render($selectedGroup = null): View|Closure|string
    {
        $groups = Group::all();

        return view('components.group-select', [
            'groups' => $groups,
            'selectedGroup' => $selectedGroup,
        ]);
    }
}
