<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    protected $table = 'to_do_lists';
    
    public $fillable = ['name', 'description', 'is_done'];
}
