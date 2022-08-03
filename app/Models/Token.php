<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property int $type
 * @property string $value
 * @property Carbon $expire_at
 * @property ?Carbon $created_at
 */
class Token extends Model
{
    use HasFactory;

    const TYPE_SIGNUP = 1, TYPE_RESET = 2;

    protected $fillable = ['type', 'value', 'expire_at'];

    protected $casts = [
        'id' => 'int',
        'user_id' => 'int',
        'type' => 'int',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
