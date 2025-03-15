<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'position',
        'bio',
        'photo',
        'email',
        'phone',
        'linkedin',
        'twitter',
        'github',
        'order',
        'is_featured',
        'department',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    /**
     * Scope a query to only include featured team members.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orderBy('order');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get team members by department.
     */
    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department)->orderBy('order');
    }

    /**
     * Get the member's full social media profiles.
     */
    public function getSocialLinksAttribute()
    {
        $links = [];
        
        if ($this->linkedin) {
            $links['linkedin'] = $this->linkedin;
        }
        
        if ($this->twitter) {
            $links['twitter'] = $this->twitter;
        }
        
        if ($this->github) {
            $links['github'] = $this->github;
        }

        return $links;
    }
} 