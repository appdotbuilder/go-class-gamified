<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PelanggaranSiswa
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $pelanggaran_jenis_id
 * @property \Illuminate\Support\Carbon $tanggal
 * @property int $guru_id
 * @property string|null $catatan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SiswaData $siswa
 * @property-read \App\Models\PelanggaranJenis $pelanggaranJenis
 * @property-read \App\Models\User $guru
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa wherePelanggaranJenisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PelanggaranSiswa whereUpdatedAt($value)

 * 
 * @mixin \Eloquent
 */
class PelanggaranSiswa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'siswa_id',
        'pelanggaran_jenis_id',
        'tanggal',
        'guru_id',
        'catatan',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pelanggaran_siswa';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the siswa that owns the pelanggaran siswa.
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(SiswaData::class, 'siswa_id');
    }

    /**
     * Get the pelanggaran jenis that owns the pelanggaran siswa.
     */
    public function pelanggaranJenis(): BelongsTo
    {
        return $this->belongsTo(PelanggaranJenis::class, 'pelanggaran_jenis_id');
    }

    /**
     * Get the guru that recorded the pelanggaran.
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}