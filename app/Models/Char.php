<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

/**
 * App\Models\Char
 *
 * @property int $id
 * @property int $gender
 * @property int $move_set_id
 * @method static \Illuminate\Database\Eloquent\Builder|Char newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Char newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Char query()
 * @method static \Illuminate\Database\Eloquent\Builder|Char whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Char whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Char whereMoveSetId($value)
 * @property-read \App\Models\CharMoveSet $moveSet
 * @mixin \Eloquent
 */
class Char extends Model
{
    protected $table = 'chars';

    public $timestamps = false;
    public const MALE   = 0;
    public const FEMALE = 1;

    protected $fillable = [
        'gender',
        'move_set_id',
    ];

    /**
     * @return int
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return int
     */
    public function getMoveSetId(): int
    {
        return $this->move_set_id;
    }

    /**
     * @param int $move_set_id
     */
    public function setMoveSetId(int $move_set_id): void
    {
        $this->move_set_id = $move_set_id;
    }

    public function moveSet(): BelongsTo
    {
        return $this->belongsTo(CharMoveSet::class, 'move_set_id', 'id');
    }

    /**
     * @return CharMoveSet
     */
    public function getMoveSet(): CharMoveSet
    {
        return $this->moveSet;
    }

    public function canDance($musicId): bool
    {
        $result         = false;
        $moveSet        = $this->getMoveSet();
        $musicMoves     = Music::find($musicId)->getMusicMoves();
        $bodyPartsMoves = [];
        /** @var DanceMove $musicMove */
        foreach ($musicMoves as $musicMove) {
            $bodyPartId                    = $musicMove->getMove()->getBodyPartId();
            $bodyPartsMoves[$bodyPartId][] = $musicMove->getMoveId();
        }
        $bodyMoveId = $moveSet->getBodyId();
        $headMoveId = $moveSet->getHeadId();
        $armMoveId  = $moveSet->getArmId();
        $legMoveId  = $moveSet->getLegId();
        $bodyMove   = Arr::get($bodyPartsMoves, BodyPart::BODY, []);
        $headMove   = Arr::get($bodyPartsMoves, BodyPart::HEAD, []);
        $armsMove   = Arr::get($bodyPartsMoves, BodyPart::ARMS, []);
        $legsMove   = Arr::get($bodyPartsMoves, BodyPart::LEGS, []);
        if ((in_array($bodyMoveId, $bodyMove) || (!$bodyMoveId && !$bodyMove)) &&
            (in_array($headMoveId, $headMove) || (!$headMoveId && !$headMove)) &&
            (in_array($armMoveId, $armsMove) || (!$armMoveId && !$armsMove)) &&
            (in_array($legMoveId, $legsMove) || (!$legMoveId && !$legsMove))) {
            $result = true;
        }
        return $result;

    }


}
