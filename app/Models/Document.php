<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'original_name',   // nombre original del archivo
        'stored_name',     // nombre con el que se guarda en storage
        'disk',            // disco usado (ej: 'local' o 'public')
        'path',            // ruta interna
        'mime',            // tipo MIME (application/pdf, image/png, etc.)
        'size',            // tamaño en bytes
        'uploaded_by',     // ID del usuario que subió el documento
    ];

    // Relación con el usuario que subió el documento
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'uploaded_by');
    }
}
