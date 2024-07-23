<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class IfExists implements ValidationRule
{
    public function __construct(protected User $user) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $isExistsSubjectUser = DB::table('subject_user')->where('subject_id', $value)->where('user_id', ($this->user->id))->get();

        if(count($isExistsSubjectUser) > 0){
            $fail('Оценка уже проставлена.');
        }
    }
}
