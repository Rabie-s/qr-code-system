<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QrHit extends Model
{
    protected $fillable = ['ip_visitor'];

    public function qrTarget():BelongsTo{
        return $this->belongsTo(QrTarget::class);
    }
}
