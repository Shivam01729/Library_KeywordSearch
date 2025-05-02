<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryResource extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'author',
        'description',
        'shelf',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Search scope for filtering resources
     */
    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', "%$searchTerm%")
                   ->orWhere('author', 'like', "%$searchTerm%")
                   ->orWhere('description', 'like', "%$searchTerm%");
    }
}