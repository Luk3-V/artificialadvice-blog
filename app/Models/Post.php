<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['writer', 'category'];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) => 
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('body', 'like', '%'.$search.'%')));

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) => // Posts that have a category
                $query->where('slug', $category))); // & where the category->slug === $category

        $query->when($filters['writer'] ?? false, fn($query, $writer) =>
                $query->whereHas('writer', fn($query) => // Posts that have an writer
                    $query->where('slug', $writer))); // & where the writer->name === $author
    }
    
    public function writer() {
        return $this->belongsTo(Writer::class, 'writer_id');
    }
    
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
