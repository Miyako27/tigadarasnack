<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'pemesanan_id';

    protected $fillable = [
        'tanggal_pesanan',
        'nama_customer',
        'nomor_hp',
        'produk_id',
        'jumlah',
        'total_harga',
        'metode_pembayaran',
        'status_pemesanan',
        'tanggal_pengambilan_pengiriman',
        'alamat',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pesanan' => 'datetime',
            'tanggal_pengambilan_pengiriman' => 'date',
            'jumlah' => 'integer',
            'total_harga' => 'integer',
        ];
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }

    public function scopeFilter(Builder $query, $request): Builder
    {
        if ($request->filled('status_pemesanan')) {
            $query->where('status_pemesanan', $request->status_pemesanan);
        }

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function (Builder $builder) use ($search) {
                $builder->where('nama_customer', 'like', '%' . $search . '%')
                    ->orWhere('nomor_hp', 'like', '%' . $search . '%')
                    ->orWhereHas('produk', function (Builder $produkQuery) use ($search) {
                        $produkQuery->where('nama_produk', 'like', '%' . $search . '%');
                    });
            });
        }

        return $query;
    }

    public static function metodePembayaranOptions(): array
    {
        return ['Cash', 'Transfer', 'QRIS'];
    }

    public static function statusOptions(): array
    {
        return ['Diproses', 'Dibatalkan', 'Selesai'];
    }

    public function getTotalHargaRupiahAttribute(): string
    {
        return number_format((int) $this->total_harga, 0, ',', '.');
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status_pemesanan) {
            'Diproses' => 'bg-info text-dark',
            'Selesai' => 'bg-success',
            'Dibatalkan' => 'bg-danger',
            default => 'bg-secondary',
        };
    }
}
