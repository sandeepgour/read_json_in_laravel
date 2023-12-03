<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReadJsonController extends Controller
{
    public function index(Request $request)
    {
        try {
            /**
             * File::get() is using for getting context from any file.
             */
            //$json = File::get(base_path('public/simple.json'));

            /**
             * file_get_contents() is using for getting context from any file.
             */

            $json = file_get_contents(base_path('public/simple.json'));
            $json = json_decode($json, true);
            $json['sandy'] = [
               "name"=>"sandeep gour",
               "email"=>"sandeep@gmail.com",
               "mobile"=>"9087654321",
               "dob"=>"02-11-1998"
            ];

            /**
             * file_put_contents using for replace context in exist file or append context in file
             */
            $file = file_put_contents(base_path('public/simple.json'), json_encode($json), FILE_APPEND | LOCK_EX);
            echo "<pre>";
            print_r($json);
        } catch (\Exception $e) {
            return "file does't exist!";
        }
    }
}
