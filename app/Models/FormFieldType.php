<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldType extends Model
{
    use HasFactory;

    public $fillable = [
        'html_tag_name',
        'html_type',
        'friendly_name',
        'allow_multiple_options'
        ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function allBasic()
    {
        return self::select('slug', 'friendly_name', 'id')->get();
    }
}
