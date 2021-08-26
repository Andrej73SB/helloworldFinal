<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserIpController extends Controller
{
    public static function getUserIp(){
            // $ipaddress = $request->ip();
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
            if(isset($_GET['name']))
            {
                $name ='Have a beautiful day, '. $_GET['name'];
                return response()->json(['ip' => $ipaddress])->header('x-hello-world', 'AK')->header('greeting', $name);
            }
            else return response()->json(['ip' => $ipaddress])->header('x-hello-world', 'AK');
    }
}
