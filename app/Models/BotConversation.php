<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotConversation extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'question_id', 'message', 'response'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function question()
    {
        return $this->belongsTo(BotQuestion::class);
    }
}