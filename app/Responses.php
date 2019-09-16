<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    
    protected $fillable = [
        'question_id',
        'response',
        'hash_path'
    ];

    public function scopeQuestionID($query, $id) {

        return $query->where('question_id', $id);
    }

    public function scopeHashPath($query, $hashPath) {

        return $query->where('hash_path', $hashPath);
    }
}
