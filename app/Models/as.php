<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class as
 * @package App\Models
 * @version May 14, 2023, 7:08 pm UTC
 *
 * @property string $dpi
 * @property string $nombre
 * @property string $fecha
 */
class as extends Model
{

    use HasFactory;

    public $table = 'visitante';
    
    public $timestamps = false;



    protected $primaryKey = 'id';

    public $fillable = [
        'dpi',
        'nombre',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dpi' => 'string',
        'nombre' => 'string',
        'fecha' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dpi' => 'nullable|string|max:50',
        'nombre' => 'nullable|string|max:50',
        'fecha' => 'nullable'
    ];

    
}
