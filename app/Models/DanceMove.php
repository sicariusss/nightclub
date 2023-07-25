<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\DanceMove
 *
 * @property int $id
 * @property int $dance_id
 * @property int $move_id
 * @method static \Illuminate\Database\Eloquent\Builder|DanceMove newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DanceMove newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DanceMove query()
 * @method static \Illuminate\Database\Eloquent\Builder|DanceMove whereDanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DanceMove whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DanceMove whereMoveId($value)
 * @property-read \App\Models\Dance $dance
 * @property-read \App\Models\Move $move
 * @mixin \Eloquent
 */
class DanceMove extends Model
{
    protected $table = 'dance_moves';

    public $timestamps = false;

    protected $fillable = [
        'dance_id',
        'move_id',
    ];

    /**
     * @return int
     */
    public function getDanceId(): int
    {
        return $this->dance_id;
    }

    /**
     * @param int $dance_id
     */
    public function setDanceId(int $dance_id): void
    {
        $this->dance_id = $dance_id;
    }

    /**
     * @return int
     */
    public function getMoveId(): int
    {
        return $this->move_id;
    }

    /**
     * @param int $move_id
     */
    public function setMoveId(int $move_id): void
    {
        $this->move_id = $move_id;
    }

    public function dance(): BelongsTo
    {
        return $this->belongsTo(Dance::class, 'dance_id', 'id');
    }

    /**
     * @return Dance
     */
    public function getDance(): Dance
    {
        return $this->dance;
    }

    public function move(): BelongsTo
    {
        return $this->belongsTo(Move::class, 'move_id', 'id');
    }

    /**
     * @return Move
     */
    public function getMove(): Move
    {
        return $this->move;
    }


}
