<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Filters\AbstractFilter;
use App\Http\Filters\UserFilter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Carbon\Carbon;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'group_id',
        'first_name',
        'second_name',
        'birthday',
        'address',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'address' => 'array',
        'password' => 'hashed',
    ];

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class)->withPivot('assessment');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    protected function color(): Attribute
    {
        return new Attribute(
            get: function (){
                $minGrade = $this->subjects->min('pivot.assessment');
                return match ($minGrade){
                    "4" => "table-warning",
                    "5" => "table-success",
                    default => "table-danger",
                };
            }
        );
    }

    protected function birthday(): Attribute
    {
        return Attribute::make(
            get: function($value) {
                return Carbon::parse($value)->format('d-m-Y');
            }
        );
    }

    protected function fullAddress(): Attribute
    {
        return Attribute::make(
            get: function() {
                return is_null($this->address) ? '-' : implode(', ', $this->address);
            },
        );
    }

    public function scopeFilter(Builder $query): void
    {
        if (request()->has('userName')) {
            $query->where(DB::raw("concat_ws(' ', first_name, second_name, middle_name)"),
                    'like',
                    "%".request()->input('userName')."%");
        }

        if($userBirthday = request()->get('userBirthday')){
             $query->whereDate(
                 'birthday',
                 '=',
                 Carbon::parse($userBirthday)
             );
        }
    }
}
