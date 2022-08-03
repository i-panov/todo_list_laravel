<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $list_id
 * @property int $user_id
 * @property int $value
 *
 * @property-read TodoList $list
 * @property-read User $user
 */
class TodoRight extends Model
{
    use HasFactory;

    const CAN_READ = 1, CAN_WRITE = 2;

    public $timestamps = false;

    protected $casts = [
        'id' => 'int',
        'list_id' => 'int',
        'user_id' => 'int',
        'value' => 'int',
    ];

    protected $fillable = ['user_id', 'value'];

    public function list() {
        return $this->belongsTo(TodoList::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
