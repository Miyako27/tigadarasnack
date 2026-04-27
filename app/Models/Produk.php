<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'produk_id';
    protected $table = 'produk';

    protected $fillable = [
        'foto_produk',
        'nama_produk',
        'harga_produk',
        'deskripsi_produk',
        'best_seller',
    ];

    public function scopeFilter(Builder $query, $request, array $searchableColumns): Builder
    {

        if ($request->filled('search')){
            $query->where(function ($q) use ($request, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'like', '%' . $request->input('search') . '%');
                }
            });
        }
        return $query;
    }
}
