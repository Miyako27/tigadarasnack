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
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'like', '%' . $request->input('search') . '%');
                }
            });
        }

        return $query;
    }

    public static function normalizeHarga(mixed $value): int
    {
        $rawValue = strtolower(trim((string) $value));

        if ($rawValue === '') {
            return 0;
        }

        if (str_contains($rawValue, 'k')) {
            $numberPart = preg_replace('/[^0-9,\.]/', '', $rawValue);
            $numberPart = str_replace(',', '.', $numberPart);

            return (int) round(((float) $numberPart) * 1000);
        }

        $numericValue = preg_replace('/[^\d]/', '', $rawValue);

        if ($numericValue === '') {
            return 0;
        }

        $parsedValue = (int) $numericValue;

        if (preg_match('/^\d+$/', $rawValue) && $parsedValue < 1000) {
            return $parsedValue * 1000;
        }

        return $parsedValue;
    }

    public function getHargaProdukNumberAttribute(): int
    {
        return self::normalizeHarga($this->harga_produk);
    }

    public function getHargaProdukRupiahAttribute(): string
    {
        return number_format($this->harga_produk_number, 0, ',', '.');
    }
}
