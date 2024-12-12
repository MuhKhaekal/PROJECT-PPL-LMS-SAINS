<?php

namespace App\Http\Controllers;

use App\Charts\Chart2;
use App\Charts\MonthlyUsersChart;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(MonthlyUsersChart $chart, Chart2 $chart2){
        if(Auth::check()){
            if (Auth::user()->role == 'admin'){
                $users = User::all()->count();
                $faculties = Faculty::all()->count();
                $groups = Course::all()->count();
                return view('dashboard.admin.home-admin',
                [
                    'PieChart' => $chart->buildPie(),
                    'BarChart' => $chart->buildBar (),
                    'LineChart' => $chart->buildLine(),
                ], compact('users', 'faculties', 'groups'));
            } elseif(Auth::user()->role == 'asisten'){
                return view('dashboard.asisten.home-asisten');
            } else{
                return view('dashboard.user.home-user');
            }
        } else {
            return redirect('login');
        }
    }
}
