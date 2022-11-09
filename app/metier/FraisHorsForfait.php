<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class Frais extends Model
{
    protected $table = 'fraishorsforfait';
    public $timestamps = false;
    private $id_frais;
    protected $fillable = [
        'id_fraishorsforfait',
        'id_frais',
        'date_fraishorsforfait',
        'montant_fraishorsforfait',
        'lib_fraishorsforfait'
    ];

    public function __construct()
    {
        $this->id_frais = 0;
    }
}
