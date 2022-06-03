<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cluster;
use App\Models\Expense;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {

    }

    public function finishRedirect(Request $request)
    {   
        return $request;
    }
    
    public function unfinishRedirect(Request $request)
    {
        return $request;
    }
    public function errorRedirect(Request $request)
    {
        return $request;
    }
}
