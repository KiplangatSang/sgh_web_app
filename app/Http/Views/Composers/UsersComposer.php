<?php

namespace App\Http\Views\Composers;

use App\Models\User;
use Carbon\Carbon;
use Faker\Core\Color;
use Illuminate\View\View;
use Faker\Generator as Faker;

class UsersComposer
{

    public function compose(View $view)
    {
        $registrationmonths = User::distinct('month')->orderBy('month','ASC')->get('month');

        $monthlyData = array();
        $users = array();
        $months = array();
        $userspdata= array();

        foreach ($registrationmonths as $month) {

            $userscount = count(User::where('month', $month->month)->get());
            $users[] = $userscount;
            $months[] = $month->month;

            //usersPdata = [{
                //         value: 40,
                //         color: "#ff0000",
                //         highlight: "#5AD3D1",
                //         label: "Complete"
                //     },
                //     {
                //         value: 60,
                //         color: "#7a97cc",
                //         highlight: "#000000",
                //         label: "In-Progress"
                //     }

            $userspdata[]  =  $this->pieChartData($userscount,$month->month);
        }

        $monthlyData['months'] = $months;
        $monthlyData['users'] = $users;





        $usersData = $monthlyData;

       // dd($monthlyData);



        $data = array(
            'usersData' => $usersData,
            'userspdata' => $userspdata,
        );



        $view->with('data', $data);
    }

    public function pieChartData($data,$month)
    {
        $pdata = array();
        # code...
        $color = $this->getColor();
        $value = $data;
        $highlight = $this->getColor();
        $label = $month;

        $pdata['color'] = $color;
        $pdata['value'] = $value;
        $pdata['highlight'] = $highlight;
        $pdata['label'] = $label;
        return $pdata;
    }


    public function getColor()
    {
       return '#'.str_pad(dechex(mt_rand(0,0xFFFFFF)),6 , '0' , STR_PAD_LEFT);
    }
}
