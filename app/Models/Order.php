<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const ORDER_TYPE = 'Deal';

    protected $fillable = [
        'ext_id',
        'content_type',
        'user_id',
        'manager_id',
        'program_id',
        'order_num',
        'status',
        'total',
        'last_comment'
    ];

    static function prepareData(array $data): array
    {
        return [
            'ext_id'        => $data['id'],
            'content_type'  => $data['contentType'],
            'user_id'       => $data['contractor']['id'],
            'manager_id'    => $data['manager']['id'],
            'program_id'    => $data['program']['id'],
            'order_num'     => $data['name'],
            'status'        => $data['state']['name'],
            'total'         => $data['price']['value'],
            'last_comment'  => $data['lastComment']['content']
        ];
    }
}
