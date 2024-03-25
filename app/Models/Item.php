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

    protected $fillable = ['item_code', 'description', 'unit_of_measure', 'img_url', 'department', 'end_user', 'requestor', 'specification'];

    protected function imgUrl() : Attribute {
        return Attribute::make(
            set: fn(string $value) => "storage/{$value}"
        );
    }

    public function toSearchableArray(): array
    {
        return [
            'item_code' => $this->item_code,
            'description' => $this->description,
            'unit_of_measure' => $this->unit_of_measure,
            'department' => $this->department,
            'end_user' => $this->end_user,
            'requestor' => $this->requestor,
            'specification' => $this->specification,
        ];
    }
}
