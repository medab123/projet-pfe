<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dotlogics\Grapesjs\App\Traits\EditableTrait;
use Dotlogics\Grapesjs\App\Contracts\Editable;
class Webinaire extends Model implements Editable
{
    use HasFactory;
    use EditableTrait;
    protected $fillable = [
        'name',
        'image',
        'description',
        'start_dt',
        'end_dt',
    ];
}
