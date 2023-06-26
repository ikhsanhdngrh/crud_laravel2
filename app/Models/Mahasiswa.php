<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'npm';
    public $table = "mahasiswa";
    protected $fillable = ['npm','nama', 'alamat', 'telepon'];
    protected $visible = ['npm','nama', 'alamat', 'telepon'];
}