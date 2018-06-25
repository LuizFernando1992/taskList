<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'mytasks';
    protected $fillable = ['titulo', 'descricao', 'data', 'status'];
    public $timestamps = false;
}
