<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = ['nim', 'nama', 'tanggal_lahir', 'ipk'];
    use SoftDeletes;
}
