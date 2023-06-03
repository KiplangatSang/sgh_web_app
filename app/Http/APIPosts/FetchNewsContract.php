<?php

namespace App\Http\APIPosts;

use App\Accounts\Transaction;
use Illuminate\Support\Str;

interface FetchNewsContract
{

    public function fetchItems($params = null,$url = null);
    public function fetchItem($params = null,$url = null);
    public function fetchSports($params = null);
    public function fetchTechnology($params = null);
}
