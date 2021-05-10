<?php
/**
 * Created by PhpStorm.
 * User: duonght6255
 * Date: 5/10/2021
 * Time: 10:07 PM
 */
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS_DONE = 1;
    const STATUS_UNDONE = 0;

    protected $table = "tasks";

    protected $fillable = [
        'name',
        'start_date',
        'due_date',
//        'status',
//        'created_at',
//        'updated_at',
    ];
}

