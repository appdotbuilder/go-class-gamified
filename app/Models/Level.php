<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Level
 *
 * @property int $id
 * @property string $nama
 * @property int $min_bintang
 * @property int $min_badge
 * @property string|null $deskripsi
 * @property string|null $icon
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SiswaData> $siswaData
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level query()
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereMinBintang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereMinBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereUpdatedAt($value)
 * @method static \Database\Factories\LevelFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Level extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'min_bintang',
        'min_badge',
        'deskripsi',
        'icon',
        'color',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'min_bintang' => 'integer',
        'min_badge' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the siswa data for the level.
     */
    public function siswaData(): HasMany
    {
        return $this->hasMany(SiswaData::class, 'current_level_id');
    }
}