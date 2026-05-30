<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    protected $fillable = [
        'title',
        'is_completed',
        'user_id'
    ];
    protected $with = [
            'user'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeOwnedBy($query, $userId){
        return $query->where('user_id',$userId);
    }

    public function scopeCompleted($query){
        return $query->where('is_completed', true);
    }

    public function scopePending($query){
        return $query->where('is_completed', false);
    }

    public function scopeSearch($query, $search){
        return $query->where(
            'title',
            'like',
            '%'. $search . '%'
        );
    }
    //
}
