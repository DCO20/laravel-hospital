<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Occupation extends Model
{
    use SoftDeletes;

    /**
     * Tabela do banco de dados
     *
     * @var string
     */
    protected $table = 'occupations';

    /**
     * Atributos da tabela do banco de dados
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
     * obtêm os funcionários
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
