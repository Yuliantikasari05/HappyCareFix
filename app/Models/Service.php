<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'department_id',
        'description',
        'price',
        'duration',
        'image',
    ];

    /**
     * Get the department that the service belongs to.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
