<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testCOntroller extends Controller
{
    public function show($id = 111)
    {
        echo "your id is Number" . $id;



        return "\nyour id is that no $id";
    }
}
