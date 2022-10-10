<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Animal extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'animals';


    protected $fillable = ['name', 'species', 'colour', 'personality'];

    public $sortable = ['Name','Species', 'Age', 'Colour', 'Personality','Availability'];
}
