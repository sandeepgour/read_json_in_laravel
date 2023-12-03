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
            $json = [];
            if (File::exists(public_path('simple.json'))) {
                $json = file_get_contents(public_path('simple.json'));
                $json = json_decode($json, true);
                if ($json != null) {
                    $data = [
                        "name" => "sandeep gour",
                        "email" => "sandeep@gmail.com",
                        "mobile" => "9087654321",
                        "dob" => "02-11-1998"
                    ];
                    array_push($json, $data);
                    $newJsonString = json_encode($json);
                    file_put_contents(public_path('simple.json'), $newJsonString);
                } else {
                    $data[0] = [
                        "name" => "sandeep gour",
                        "email" => "sandeep@gmail.com",
                        "mobile" => "9087654321",
                        "dob" => "02-11-1998"
                    ];
                    $newJsonString = json_encode($data);
                    file_put_contents(public_path('simple.json'), $newJsonString);
                }
                $json_data = file_get_contents(public_path('simple.json'));
                $json_data = json_decode($json_data, true);
                echo "<pre>";
                print_r($json_data);
            } else {
                echo "file is not exist!";
            }
        } catch (\Exception $e) {
            return "file does't exist!";
        }
    }
}
