<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function thongTin(){

        // $sinhvien = [
        //     [
        //         'ten'=>'sam',
        //         'tuoi'=>'20',
        //         'masv'=>'ph44600',
        //         'truong'=>'caodangfpt'
        //     ],
            
        // ];

        $ten = 'sam';
        $tuoi = '20';
        $masv = 'ph44600';
        $truong = 'caodangfpt';

       

        return view('thongtin',compact('ten','tuoi','masv','truong'));
        
    }
}
