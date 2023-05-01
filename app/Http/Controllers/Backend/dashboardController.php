<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\User;

class dashboardController extends Controller
{
    public function index(){
        

        
        // return $chart;

        // return bcrypt('123456');
        // auth()->loginUsingId(1);

        // return auth()->user()->roles()->sync([1]);
        // dd(Permission::whereName('show-comment')->first()->roles);
        //  dd(auth()->user()->hasRole(Permission::whereName('show-comment')->first()->roles));

        // dd(Permission::whe)


        // return auth()->user()->roles()->get();

        // return User::create([
        //     'name' => 'علی قاسمی',
        //     'phone' => '09125544555',
        //     'city' => 5,
        //     'email' => 'ali.gh@yahoo.com',
        //     'password' => '123456'
        // ]);


        // return Role::whereName('manager')->first()->permissions()->sync([1,2]);

        // return Role::whereName('manager')->first()->permissions()->get();


        // return Permission::create([
        //     'name' => 'edit-product',
        //     'label' => 'ویرایش محصولات'
        // ]);
        
        // $month = $chart['LastMonths'];
        
        // $month = [
        //     "دی",
        //     'بهمن',
        // ];

        // $month = implode(",", $month);

        // return $chart;
        
        


        $chart = app('\App\Http\Controllers\Backend\PaymentController')->chartMonths();

        return view('backend.dashboard',compact(['chart']));
    }
}
