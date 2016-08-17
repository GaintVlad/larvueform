<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FormController extends Controller
{
    
    public function publish(Request $request)
    {
        
        // $this->validate($request, [
        //     'title' => 'required|min:3',
        //     'body' => 'required|min:10'
        // ]);
        // if ($request->ajax()) return;
        return 'Dasa barabasa';
    }
}
