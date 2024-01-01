<?php

namespace App\Models\Backsite\Operational;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'book';

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'stock',
        'file_path',
        'image_path',
        'user_id',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
