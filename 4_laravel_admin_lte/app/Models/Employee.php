<?php

namespace App\Models;

use Eloquent;
use App\Traits\Mediable;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

/**
 * App\Models\Employee.
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property int $position_id
 * @property string $salary
 * @property int|null $head_id
 * @property Carbon $date
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Employee[] $allChild
 * @property-read int|null $all_child_count
 * @property-read Collection|Employee[] $child
 * @property-read int|null $child_count
 * @property-read array $array_of_child_identifiers
 * @property-read int $head_count
 * @property-read int $max_child_count
 * @property string|null $photo
 * @property-read Employee|null $head
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Position $position
 *
 * @method static Builder|Employee findByName($name)
 * @method static Builder|Employee newModelQuery()
 * @method static Builder|Employee newQuery()
 * @method static Builder|Employee query()
 * @method static Builder|Employee whereAdminCreatedId($value)
 * @method static Builder|Employee whereAdminUpdatedId($value)
 * @method static Builder|Employee whereCreatedAt($value)
 * @method static Builder|Employee whereDate($value)
 * @method static Builder|Employee whereEmail($value)
 * @method static Builder|Employee whereHeadId($value)
 * @method static Builder|Employee whereId($value)
 * @method static Builder|Employee whereName($value)
 * @method static Builder|Employee wherePhone($value)
 * @method static Builder|Employee wherePositionId($value)
 * @method static Builder|Employee whereSalary($value)
 * @method static Builder|Employee whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Employee extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Mediable {
        Mediable::registerMediaConversions insteadof InteractsWithMedia;
    }

    public const MAX_LENGTH_BRANCH_TREE = 5;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'phone', 'email', 'salary', 'date'];

    /**
     * @var string[]
     */
    protected $dates = ['date'];

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
     * Get float in string format.
     *
     * @return string
     */
    public function getSalaryAttribute() : string
    {
        return number_format($this->attributes['salary'], 3);
    }

    /**
     * Recursively get highest count branch.
     *
     * @return int
     */
    public function getMaxChildCountAttribute() : int
    {
        $counts = $this->allChild->pluck('max_child_count')->toArray();

        return count($counts) ? max($counts) + 1 : 0;
    }

    /**
     * Get array of child identifiers.
     *
     * @return array
     */
    public function getArrayOfChildIdentifiersAttribute() : array
    {
        $idArray = [];

        foreach ($this->allChild->pluck('array_of_child_identifiers') as $array) {
            $idArray = array_merge($array, $idArray);
        }

        return array_merge($idArray, [$this->id]);
    }

    /**
     * Count parent branch.
     *
     * @return int
     */
    public function getHeadCountAttribute() : int
    {
        return $this->head ? $this->head->head_count + 1 : 1;
    }

    /**
     * Set date.
     *
     * @param string $date
     */
    public function setDateAttribute(string $date) : void
    {
        $this->attributes['date'] = Carbon::createFromIsoFormat('DD.MM.YY', $date);
    }

    /**
     * Employee position.
     *
     * @return BelongsTo
     */
    public function position() : BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Subordinates.
     *
     * @return HasMany
     */
    public function child() : HasMany
    {
        return $this->hasMany(self::class, 'head_id', 'id');
    }

    /**
     * All subordinates.
     *
     * @return HasMany
     */
    public function allChild() : HasMany
    {
        return $this->child()->with('allChild');
    }

    /**
     * Chief.
     *
     * @return BelongsTo
     */
    public function head() : BelongsTo
    {
        return $this->belongsTo(self::class, 'head_id', 'id');
    }
}
