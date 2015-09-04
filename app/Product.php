<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = array('nome',
    'descricao', 'valor', 'quantidade');

    protected $guarded = ['id'];
}
