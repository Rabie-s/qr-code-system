<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QrCode extends Model
{
    protected $fillable = ['name', 'foreground', 'background', 'image_path'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function qrTargets(): HasMany
    {
        return $this->hasMany(QrTarget::class);
    }
}
