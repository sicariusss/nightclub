<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\CharMoveSet
 *
 * @property int $id
 * @property int|null $head_id
 * @property int|null $body_id
 * @property int|null $arm_id
 * @property int|null $leg_id
 * @method static \Illuminate\Database\Eloquent\Builder|CharMoveSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharMoveSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharMoveSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharMoveSet whereArmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharMoveSet whereBodyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharMoveSet whereHeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharMoveSet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharMoveSet whereLegId($value)
 * @mixin \Eloquent
 */
class CharMoveSet extends Model
{
    protected $table = 'char_move_sets';

    public $timestamps = false;

    protected $fillable = [
        'head_id',
        'body_id',
        'arm_id',
        'leg_id',
    ];

    /**
     * @return int|null
     */
    public function getHeadId(): ?int
    {
        return $this->head_id;
    }

    /**
     * @param int|null $head_id
     */
    public function setHeadId(?int $head_id): void
    {
        $this->head_id = $head_id;
    }

    /**
     * @return int|null
     */
    public function getBodyId(): ?int
    {
        return $this->body_id;
    }

    /**
     * @param int|null $body_id
     */
    public function setBodyId(?int $body_id): void
    {
        $this->body_id = $body_id;
    }

    /**
     * @return int|null
     */
    public function getArmId(): ?int
    {
        return $this->arm_id;
    }

    /**
     * @param int|null $arm_id
     */
    public function setArmId(?int $arm_id): void
    {
        $this->arm_id = $arm_id;
    }

    /**
     * @return int|null
     */
    public function getLegId(): ?int
    {
        return $this->leg_id;
    }

    /**
     * @param int|null $leg_id
     */
    public function setLegId(?int $leg_id): void
    {
        $this->leg_id = $leg_id;
    }

    /**
     * @return Move|null
     */
    public function getHead(): ?Move
    {
        return Move::find($this->getHeadId());
    }

    /**
     * @return Move|null
     */
    public function getBody(): ?Move
    {
        return Move::find($this->getBodyId());
    }

    /**
     * @return Move|null
     */
    public function getLegs(): ?Move
    {
        return Move::find($this->getLegId());
    }

    /**
     * @return Move|null
     */
    public function getArms(): ?Move
    {
        return Move::find($this->getArmId());
    }


}
