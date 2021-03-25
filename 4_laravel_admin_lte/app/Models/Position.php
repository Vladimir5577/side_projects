<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Position.
 *
 * @property int $id
 * @property string $name
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Employee[] $employees
 * @property-read int|null $employees_count
 *
 * @method static Builder|Position findByName($name)
 * @method static Builder|Position newModelQuery()
 * @method static Builder|Position newQuery()
 * @method static Builder|Position query()
 * @method static Builder|Position whereAdminCreatedId($value)
 * @method static Builder|Position whereAdminUpdatedId($value)
 * @method static Builder|Position whereCreatedAt($value)
 * @method static Builder|Position whereId($value)
 * @method static Builder|Position whereName($value)
 * @method static Builder|Position whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Position extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * Find by name.
     *
     * @param Builder $q
     * @param string  $name
     *
     * @return mixed
     */
    public function scopeFindByName(Builder $q, string $name) : Builder
    {
        return $q->where('name', 'LIKE', "%$name%");
    }

    /**
     * Employees.
     *
     * @return HasMany
     */
    public function employees() : HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
