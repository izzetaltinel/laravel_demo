<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    /**
     * Table name (opsiyonel)
     * Laravel zaten 'users' olarak varsayar
     */
    protected $table = 'user';

    /**
     * Mass assign edilebilir alanlar
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'birthdate',
    ];

    /**
     * Cast işlemleri
     */
    protected $casts = [
        'birthdate' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * JSON çıktılarda gizlenecek alanlar (şimdilik yok)
     */
    protected $hidden = [];
}
