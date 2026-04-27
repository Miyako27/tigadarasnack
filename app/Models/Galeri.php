<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galeri extends Model
{
    use HasFactory;

    protected $primaryKey = 'galeri_id';
    protected $table = 'galeri';

    protected $fillable = [
        'galeri',
    ];

    public function scopeFilter(Builder $query, $request, array $filterableColumns, array $searchableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                if ($column == 'birthday') {
                    $query->whereRaw('YEAR(birthday) = '.$request->birthday);

                    // $query->whereYEAR('birthday', $request->birthday);
                } else {
                $query->where($column, $request->input($column));
                }
            }

        }

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
