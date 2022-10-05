<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * override default created_at variable
     */
    const CREATED_AT = 'start_at';

    /**
     * override default updated_at variable
     */
    const UPDATED_AT = 'finish_at';

    /**
     * @var string[]
     */
    protected $fillable = [
        'subject', 'description', 'priority', 'start_at', 'finish_at'
    ];
}
