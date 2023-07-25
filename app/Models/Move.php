<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Move
 *
 * @property int $id
 * @property string $name
 * @property int $body_part_id
 * @method static \Illuminate\Database\Eloquent\Builder|Move newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Move newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Move query()
 * @method static \Illuminate\Database\Eloquent\Builder|Move whereBodyPartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Move whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Move whereName($value)
 * @property-read \App\Models\BodyPart $bodyPart
 * @mixin \Eloquent
 */
class Move extends Model
{
    protected $table = 'moves';

    public $timestamps = false;

    protected $fillable = [
        'body_part_id',
        'name',
    ];

    /**
     * @return int
     */
    public function getBodyPartId(): int
    {
        return $this->body_part_id;
    }

    /**
     * @param int $body_part_id
     */
    public function setBodyPartId(int $body_part_id): void
    {
        $this->body_part_id = $body_part_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function bodyPart(): BelongsTo
    {
        return $this->belongsTo(BodyPart::class, 'body_part_id', 'id');
    }

    /**
     * @return BodyPart
     */
    public function getBodyPart(): BodyPart
    {
        return $this->bodyPart;
    }

}
