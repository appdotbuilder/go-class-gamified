<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\SiswaData
 *
 * @property int $id
 * @property int $user_id
 * @property string $nis
 * @property string $kelas
 * @property int $total_bintang
 * @property int $total_badge
 * @property int|null $current_level_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Level|null $currentLevel
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AktivitasSiswa> $aktivitasSiswa
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PelanggaranSiswa> $pelanggaranSiswa
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SiswaBadge> $siswaBadges
 * @property-read int $aktivitasSiswaCount
 * @property-read int $pelanggaranSiswaCount  
 * @property-read int $siswaBadgesCount
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData query()
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData whereNis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData whereKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData whereTotalBintang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData whereTotalBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData whereCurrentLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaData whereUpdatedAt($value)
 * @method static \Database\Factories\SiswaDataFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class SiswaData extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'nis',
        'kelas',
        'total_bintang',
        'total_badge',
        'current_level_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total_bintang' => 'integer',
        'total_badge' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the siswa data.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the current level of the siswa.
     */
    public function currentLevel(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'current_level_id');
    }

    /**
     * Get the aktivitas siswa for the siswa.
     */
    public function aktivitasSiswa(): HasMany
    {
        return $this->hasMany(AktivitasSiswa::class, 'siswa_id');
    }

    /**
     * Get the pelanggaran siswa for the siswa.
     */
    public function pelanggaranSiswa(): HasMany
    {
        return $this->hasMany(PelanggaranSiswa::class, 'siswa_id');
    }

    /**
     * Get the badges for the siswa.
     */
    public function siswaBadges(): HasMany
    {
        return $this->hasMany(SiswaBadge::class, 'siswa_id');
    }

    /**
     * Update the level of the siswa based on total stars and badges.
     */
    public function updateLevel(): void
    {
        $level = Level::where('min_bintang', '<=', $this->total_bintang)
            ->where('min_badge', '<=', $this->total_badge)
            ->orderBy('min_bintang', 'desc')
            ->orderBy('min_badge', 'desc')
            ->first();

        if ($level) {
            $this->update(['current_level_id' => $level->id]);
        }
    }
}