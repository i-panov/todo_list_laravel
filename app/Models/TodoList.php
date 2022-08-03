<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 *
 * @property-read TodoRight[] $rights
 */
class TodoList extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'id' => 'int',
        'user_id' => 'int',
    ];

    protected $fillable = ['name'];

    public function rights() {
        return $this->hasMany(TodoRight::class, 'list_id');
    }
}
