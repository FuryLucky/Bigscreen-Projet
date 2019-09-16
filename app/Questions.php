<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
	public function scopeAvailableAnswers($query, $id) {
        return $query->where('id', $id);
    }
}
