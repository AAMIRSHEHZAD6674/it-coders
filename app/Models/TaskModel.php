<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tasks';
    protected $fillable = ['title', 'description'];
}
