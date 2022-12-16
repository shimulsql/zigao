<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->query('q');
        
        if(strlen($name) <= 0) return [];

        $tags = Tags::where('name', 'like', '%'.$name.'%')->get();

        $selectable = Tags::selectable( $tags->toArray() );

        return json_encode($selectable);
    }
}
