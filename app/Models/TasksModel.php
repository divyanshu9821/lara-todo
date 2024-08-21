<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasksModel extends Model
{
    use HasFactory;

    protected $table='todo_list';

    protected $fillable = [
        'task',
        'status'
    ];
}
