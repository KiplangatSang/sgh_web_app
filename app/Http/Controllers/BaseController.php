<?php

namespace App\Http\Controllers;

use App\Models\CountriesList;

use App\Http\Repositories\AppRepository;
use App\Models\User;

class BaseController extends Controller
{
    //

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    //gets retails list sent to home controller for choosing


    public function formatPhoneNumber($code, $phone_number)
    {
        # code...
        $phoneNo = null;
        if (strlen($phone_number)  == 9) {
            $phoneNo = '254' . $phone_number;
        } else if (strlen($phone_number)  == 10) {
            $phone_number =  trim($phone_number, "0");
            $phoneNo = $code . $phone_number;
        } else {
            return $phoneNo;
        }
        return $phone_number;
    }
    public function user()
    {
        $user = User::where('id', auth()->id())
            ->first();
        return $user;
    }

    public function admin()
    {
        $admin = User::where('email', env('ADMIN_EMAIL'))
            ->first();
        return $admin;
    }


    public function appRepository()
    {
        # code...
        $baseRepo = new AppRepository();
        return $baseRepo;
    }


    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    function calculate_profile($profile)
    {
        if (!$profile) {
            return 0;
        }
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($profile->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;

        foreach ($profile->toArray() as $key => $value) {
            if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
                $total += $per_column;
            }
        }
        $total = number_format($total, 2);
        return $total;
    }

}
