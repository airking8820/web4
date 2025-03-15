<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'image',
        'category',
        'client',
        'website',
        'completion_date',
        'technologies',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'completion_date' => 'date',
        'technologies' => 'array',
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope a query to only include featured items.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Get related portfolio items.
     */
    public function related()
    {
        return $this->where('category', $this->category)
            ->where('id', '!=', $this->id)
            ->take(3)
            ->get();
    }
} 