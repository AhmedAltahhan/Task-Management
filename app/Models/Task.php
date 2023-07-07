<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Tag;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
