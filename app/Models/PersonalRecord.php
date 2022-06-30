<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property float $value
 * @property DateTime $date
 * @property BelongsToMany<User> $users
 * @property BelongsToMany<Movement> $movements
 */
class PersonalRecord extends Model
{
    use HasFactory;

    protected $table = 'personal_record';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * @var array<int, string>
     */
    protected $fillable = ['name', 'value', 'date', 'user_id', 'movement_id'];

    /**
     * @return BelongsToMany<User>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return BelongsToMany<Movement>
     */
    public function movements(): BelongsToMany
    {
        return $this->belongsToMany(Movement::class);
    }
}
