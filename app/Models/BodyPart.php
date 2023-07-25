<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BodyPart
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|BodyPart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BodyPart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BodyPart query()
 * @method static \Illuminate\Database\Eloquent\Builder|BodyPart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BodyPart whereName($value)
 * @mixin \Eloquent
 */
class BodyPart extends Model
{
    protected $table = 'body_parts';

    public $timestamps = false;

    public const BODY = 1;
    public const ARMS = 2;
    public const LEGS = 3;
    public const HEAD = 4;

    protected $fillable = [
        'name'
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

}
