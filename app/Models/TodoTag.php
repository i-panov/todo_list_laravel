<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $item_id
 * @property string $name
 */
class TodoTag extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'id' => 'int',
        'item_id' => 'int',
    ];

    protected $fillable = ['name'];
}
