<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\AktivitasSiswa
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $aktivitas_id
 * @property string $status
 * @property string|null $catatan
 * @property \Illuminate\Support\Carbon|null $tanggal_selesai
 * @property int|null $dinilai_oleh
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SiswaData $siswa
 * @property-read \App\Models\Aktivitas $aktivitas
 * @property-read \App\Models\User|null $penilai
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa whereAktivitasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa whereTanggalSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa whereDinilaiOleh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AktivitasSiswa whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class AktivitasSiswa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'siswa_id',
        'aktivitas_id',
        'status',
        'catatan',
        'tanggal_selesai',
        'dinilai_oleh',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aktivitas_siswa';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_selesai' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the siswa that owns the aktivitas siswa.
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(SiswaData::class, 'siswa_id');
    }

    /**
     * Get the aktivitas that owns the aktivitas siswa.
     */
    public function aktivitas(): BelongsTo
    {
        return $this->belongsTo(Aktivitas::class, 'aktivitas_id');
    }

    /**
     * Get the user who evaluated the aktivitas.
     */
    public function penilai(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dinilai_oleh');
    }
}