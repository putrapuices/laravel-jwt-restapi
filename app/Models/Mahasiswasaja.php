<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswasaja extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $guarded = [];
    // protected $fillable = [
    //     'tanggal_lahir','nim','nama','alamat'
    // ];
}
