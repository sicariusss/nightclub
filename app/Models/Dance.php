<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Dance
 *
 * @property int $id
 * @property string $name
 * @property int $music_id
 * @method static \Illuminate\Database\Eloquent\Builder|Dance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dance whereMusicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dance whereName($value)
 * @property-read \App\Models\Music $music
 * @mixin \Eloquent
 */
class Dance extends Model
{
    protected $table = 'dances';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'music_id',
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

    /**
     * @return int
     */
    public function getMusicId(): int
    {
        return $this->music_id;
    }

    /**
     * @param int $music_id
     */
    public function setMusicId(int $music_id): void
    {
        $this->music_id = $music_id;
    }


    public function music(): BelongsTo
    {
        return $this->belongsTo(Music::class, 'music_id', 'id');
    }

    /**
     * @return Music
     */
    public function getMusic(): Music
    {
        return $this->music;
    }


}
