<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        $customersCount = Customer::count();
//        $customersData = $this->getCustomersData();
//        $bigGraphData = $this->getBigGraphData();

        return view('dashboard.home', get_defined_vars());
    }


}
