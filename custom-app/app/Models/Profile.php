<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    const PROFILE_ADMIN = 'administrador';
    const PROFILE_ARTIST = 'artista';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perfiles';

    /**
     * @param string $profile
     * @return int
     */
    public static function getIdByKey(string $profile): int
    {
        return (self::where('nombre', $profile)->first())->id;
    }
}
