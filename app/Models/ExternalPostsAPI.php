<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalPostsAPI extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function apiable()
    {
        # code...
        return $this->morphTo();
    }


    public const  ESPNSoccerparameters = [
        "eng.1", "eng.2", "eng.3",
        "fra.1", "fra.2",
        "ger.1", "ger.2",
        "usa.1",
        "bel.1",
        "esp.1", "esp.2",
        "ita.1", "ita.2"
    ];
}
