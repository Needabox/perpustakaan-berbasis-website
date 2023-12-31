<?php

namespace App\Models\Backsite\Operational;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'category';

    protected $fillable = [
        'name',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'ILIKE', '%' . $search . '%');
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
    
}
