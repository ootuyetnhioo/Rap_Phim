<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Film;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerLoginController extends Controller
{
    public function login()
    {
        Auth::logout();
        return view('customer/login');
    }

    public function loginProgress(Request $request)
    {
        $customerUsers = User::where('rolename', '=', 'customer')->get();

        foreach ($customerUsers as $customerUser) {
            if ($customerUser['email'] ==  $request->input('email')) {
                if (Hash::check($request->input('mat_khau'), $customerUser['password'])) {
                    $request->session()->start();
                    $request->session()->put('userId', $customerUser->id);
                    $request->session()->put('email', $customerUser->email);
                    $request->session()->put('password', $customerUser->password);
                    $customerId = CustomerModel::where('email', '=', $customerUser->email)->pluck('id')->first();
                    $request->session()->put('customerId', $customerId);
                    return redirect('/customerLoginSuccess');
                } else {
                    return "Sai mật khẩu";
                }
            }
        }
        return "Sai email";
    }
}
