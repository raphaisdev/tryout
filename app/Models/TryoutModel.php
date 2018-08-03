<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TryoutModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tryout';

    protected $fillable = ['nome', 'email', 'senha', 'telefone'];

    public $timestamps = false;
}
