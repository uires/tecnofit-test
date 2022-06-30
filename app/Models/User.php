<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property BelongsToMany<PersonalRecord> $personal_records
 */
class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    /**
     * @return BelongsToMany<PersonalRecord>
     */
    public function personal_records(): BelongsToMany
    {
        return $this->belongsToMany(PersonalRecord::class);
    }
}
