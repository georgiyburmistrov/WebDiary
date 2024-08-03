<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class UserRole: int extends Enum { // или пример из кода Кузьмина?

    const Admin = 1;
    const Teacher = 2;
    const Student = 3;

}
