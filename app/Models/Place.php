<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(["name", "description", "notes", "category", "image_url"])]
class Place extends Model
{
    use HasUuids;

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
