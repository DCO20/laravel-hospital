<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use SoftDeletes;

    /**
     * Tabela do banco de dados
     *
     * @var string
     */
    protected $table = 'attendances';

    /**
     * Atributos da tabela do banco de dados
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'description',
        'doctor_id',
        'pacient_id',
    ];

    /**
     * Atributos da tabela do banco de dados
     *
     *  @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * obtém o médico
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class)->withTrashed();
    }

    /**
     * obtém o paciente
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pacient()
    {
        return $this->belongsTo(Pacient::class)->withTrashed();
    }
}
