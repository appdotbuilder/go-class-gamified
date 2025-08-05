<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\BadgeDefinition
 *
 * @property int $id
 * @property string $nama
 * @property string|null $deskripsi
 * @property string|null $icon
 * @property string $color
 * @property string $kategori
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SiswaBadge> $siswaBadges
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition query()
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeDefinition whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class BadgeDefinition extends Model
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
        'icon',
        'color',
        'kategori',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the siswa badges for the badge definition.
     */
    public function siswaBadges(): HasMany
    {
        return $this->hasMany(SiswaBadge::class, 'badge_definition_id');
    }
}