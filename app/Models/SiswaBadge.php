<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\SiswaBadge
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $badge_definition_id
 * @property \Illuminate\Support\Carbon $tanggal_didapat
 * @property int $diberikan_oleh
 * @property string|null $catatan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SiswaData $siswa
 * @property-read \App\Models\BadgeDefinition $badgeDefinition
 * @property-read \App\Models\User $pemberi
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge query()
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge whereBadgeDefinitionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge whereTanggalDidapat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge whereDiberikanOleh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaBadge whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class SiswaBadge extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'siswa_id',
        'badge_definition_id',
        'tanggal_didapat',
        'diberikan_oleh',
        'catatan',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siswa_badges';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_didapat' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the siswa that owns the siswa badge.
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(SiswaData::class, 'siswa_id');
    }

    /**
     * Get the badge definition that owns the siswa badge.
     */
    public function badgeDefinition(): BelongsTo
    {
        return $this->belongsTo(BadgeDefinition::class, 'badge_definition_id');
    }

    /**
     * Get the user who gave the badge.
     */
    public function pemberi(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diberikan_oleh');
    }
}