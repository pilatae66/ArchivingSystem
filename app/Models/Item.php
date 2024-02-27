<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['item_code', 'description', 'unit_of_measure', 'img_url'];

    protected function imgUrl() : Attribute {
        return Attribute::make(
            set: fn(string $value) => "storage/{$value}"
        );
    }

    public function toSearchableArray(): array
    {
        return [
            'item_code' => $this->item_code,
            'description' => $this->description
        ];
    }
}
