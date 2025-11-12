<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'article', 'slug', 'user_id', 'category_id'];

    protected $with = ['user', 'category'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    #[Scope]
    protected function filter(Builder $query, array $filters) : void
    {
        
        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where('title', 'LIKE', '%'.$search.'%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', fn (Builder $query) =>
                $query->where('slug', $category));
        });

        $query->when($filters['user'] ?? false, function($query, $user){
            return $query->whereHas('user', fn (Builder $query) =>
                $query->where('username', $user));
        });

    }
}
