<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QrTarget extends Model
{
    protected $fillable = ['type','short_code','target_url'];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function qrCode():BelongsTo{
        return $this->belongsTo(QrCode::class);
    }

    public function qrHits():HasMany{
        return $this->hasMany(QrHit::class);
    }
}
