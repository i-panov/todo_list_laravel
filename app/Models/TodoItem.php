<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $text
 *
 * @property-read TodoTag[] $tags
 */
class TodoItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'id' => 'int',
    ];

    protected $fillable = ['text'];

    public function tags() {
        return $this->hasMany(TodoTag::class);
    }
}
