<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Ormawa;
use Exception;
use Illuminate\Http\Request;

class OrmawaController extends Controller
{
    public function list()
    {
        try {
            $data = Ormawa::select('id as ormawa_id', 'ormawa')->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Succes', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
