<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\PelanggaranJenis
 *
 * @property int $id
 * @property string $jenis
 * @property string|null $deskripsi
 * @property int $pengurang_bintang
 * @property int $pengurang_badge
 * @property string $tingkat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PelanggaranSiswa> $pelanggaranSiswa
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis query()
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis wherePengurangBintang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis wherePengurangBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis whereTingkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranJenis whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class PelanggaranJenis extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'jenis',
        'deskripsi',
        'pengurang_bintang',
        'pengurang_badge',
        'tingkat',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pelanggaran_jenis';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'pengurang_bintang' => 'integer',
        'pengurang_badge' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the pelanggaran siswa for the pelanggaran jenis.
     */
    public function pelanggaranSiswa(): HasMany
    {
        return $this->hasMany(PelanggaranSiswa::class, 'pelanggaran_jenis_id');
    }
}