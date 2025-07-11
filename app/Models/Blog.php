<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'foto',
        'titulo',
        'subtitulo',
        'descripcion',
        'categoria',
        'slug'
    ];

    protected static function booted()
    {
        static::saving(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->titulo, '-'); // Generar el slug a partir del título
            }
        });
    }
}
