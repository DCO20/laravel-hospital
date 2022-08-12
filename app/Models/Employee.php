<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    /**
     * Tabela do banco de dados
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * Atributos da tabela do banco de dados
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'occupation_id',
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
     * obtém o cargo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function occupation()
    {
        return $this->belongsTo(Occupation::class)->withTrashed();
    }
}
