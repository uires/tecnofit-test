<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Movement extends Model
{
    use HasFactory;

    protected $table = 'movement';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];
}
