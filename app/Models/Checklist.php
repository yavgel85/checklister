<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['checklist_group_id', 'name', 'user_id', 'checklist_id'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function user_tasks(): HasMany
    {
        return $this->hasMany(Task::class)->where('user_id', auth()->id());
    }
}
