<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];
    //protected $fillable = ['id', 'block_id', 'content'];
    protected $hidden = ['created_at', 'updated_at'];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

}
