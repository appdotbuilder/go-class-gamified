<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Aktivitas
 *
 * @property int $id
 * @property string $nama
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon $tanggal
 * @property int $bintang_reward
 * @property int $badge_reward
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AktivitasSiswa> $aktivitasSiswa
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas whereBintangReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas whereBadgeReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aktivitas aktif()

 * 
 * @mixin \Eloquent
 */
class Aktivitas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal',
        'bintang_reward',
        'badge_reward',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal' => 'date',
        'bintang_reward' => 'integer',
        'badge_reward' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the aktivitas siswa for the aktivitas.
     */
    public function aktivitasSiswa(): HasMany
    {
        return $this->hasMany(AktivitasSiswa::class, 'aktivitas_id');
    }

    /**
     * Scope a query to only include active aktivitas.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}