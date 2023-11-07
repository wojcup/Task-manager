<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model{
    use HasFactory;

    protected $table = 'task';
    protected $primaryKey = 'task_id';
    protected $guarded = [];

    public function getRouteKeyName(){
        return 'uuid';
    }

    public function user(){
        return $this->belongsTo( User::class, 'owner_id', 'id' );
    }
}
