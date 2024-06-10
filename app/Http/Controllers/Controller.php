<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function beginTransaction()
    {
        return DB::transaction(function () {
            return true;
        });
    }

    protected function rollback()
    {
        return DB::rollBack();
    }

    protected function commit()
    {
        return DB::commit();
    }
}
