<?php

namespace App\Models;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('assessment');
    }

    public function scopeFilter(Builder $query): void
    {
        if (request()->has('subjectName')) {
            $query->where('name', 'like', "%" . request()->input('subjectName') . "%");
        }
    }
}
