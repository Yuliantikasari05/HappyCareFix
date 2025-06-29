<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotQuestion extends Model
{
    use HasFactory;
    
    protected $fillable = ['question', 'answer', 'category'];
    
    public function conversations()
    {
        return $this->hasMany(BotConversation::class, 'question_id');
    }
}