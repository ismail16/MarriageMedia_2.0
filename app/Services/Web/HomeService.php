<?php

namespace App\Services\Web;

use App\Http\Traits\ApiResponser;

class HomeService
{
    use ApiResponser;
    public function homeIndex()
    {
        return "homeIndex";
    }
}
