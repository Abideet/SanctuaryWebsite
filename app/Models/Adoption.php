<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $table = 'adoptions';

    protected $fillable = ['fname', 'pet', 'adoptionReason', 'adoptionDecision'];

    public $sortable = ['fname','pet','age', 'adoptionReason',   'adoptionDecision'];

    public $timestamps = false;
}
