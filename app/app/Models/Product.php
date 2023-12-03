<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'article',
        'name',
        'status',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function prunable()
    {
        return static::where('deleted_at', '<=', now()->subHour());
    }

    public function scopeGetAvailable($query) {
        return $query->where('status', 'available')->orderBy('id')->get();
    }

    public function scopeGetProduct($query, $id) {
        $product =  $query->findOrFail($id, ['id', 'article', 'name', 'status', 'data']);
        return compact('product');
    }
}
