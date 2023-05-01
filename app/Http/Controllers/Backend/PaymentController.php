<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    
    public function chartMonths(){

        $month = 12;

        $successPayments = Payment::spanningPayment($month , true)->get();
        $unsuccessPayments = Payment::spanningPayment($month , false)->get();

        
        
        $lastMonthsJalali = $this->getLastmonths($month);
        
        $successPayments = $this->checkCount($successPayments , $month , $lastMonthsJalali);
        $unsuccessPayments = $this->checkCount($unsuccessPayments , $month , $lastMonthsJalali);
       

        return [
            "success_payment" => $successPayments,
            "Unsuccess_payment" => $unsuccessPayments,
            "LastMonths" =>$lastMonthsJalali,
        ];


    }


    public function getLastmonths($month){

        
        for($i=0 ; $i< $month ; $i++){
            $label[] = \Morilog\Jalali\Jalalian::forge("now - {$i} months")->format('%B');
        }
        return array_reverse($label);
    }

    private function checkCount($array , $month , $lastMonthsJalali){

        for ($i=0 ; $i < $month ; $i++){
            $newArray[$i]['published'] = empty($array[$i]) ? 0 : $array[$i]['published'] ;
            $newArray[$i]['month'] = $lastMonthsJalali[$i];
        }
        return array_reverse($newArray);
    }

}
