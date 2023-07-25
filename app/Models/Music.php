<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * App\Models\Music
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Music newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Music newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Music query()
 * @method static \Illuminate\Database\Eloquent\Builder|Music whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Music whereName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Dance> $dances
 * @property-read int|null $dances_count
 * @mixin \Eloquent
 */
class Music extends Model
{
    protected $table = 'music';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

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

    public function dances(): HasMany
    {
        return $this->hasMany(Dance::class);
    }

    /**
     * @return Collection
     */
    public function getDances(): Collection
    {
        return $this->dances;
    }

    /**
     * @return string
     */
    public function getDancesName(): string
    {
        $result       = '';
        $dances       = $this->getDances();
        $dancesAmount = count($dances);
        foreach ($dances as $key => $dance) {
            $result .= $dance->getName() . ($dancesAmount !== $key + 1 ? ', ' : '');
        }
        return $result;
    }

    public function getMusicMoves(): Collection
    {
        $dances = $this->getDances()->pluck('id');
        return DanceMove::whereIn('dance_id', $dances)->get();
    }

    public function getMovesName(): string
    {
        $result       = '';
        $danceMoves       = $this->getMusicMoves();
        $danceMovesAmount = count($danceMoves);
        foreach ($danceMoves as $key => $danceMove) {
            $move = $danceMove->getMove();
            $moveBodyPart = $move->getBodyPart();
            $result .= $moveBodyPart->getName() . ': ' . $move->getName() . ($danceMovesAmount !== $key + 1 ? ', ' : '');
        }
        return $result;
    }
}
