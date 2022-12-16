<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
    ];

    public static function selectable( $items )
    {
        return array_map(function($item){
            return ['id' => $item['id'], 'text' => $item['name'], 'count' => 3510];
        }, $items);

    }


}
