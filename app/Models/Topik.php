<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    protected $table = 'topik';

    protected $fillable = ['nama_topik', 'bidang_ilmu', 'kata_kunci', 'deskripsi'];

    public const BIDANG = ['Sistem Informasi', 'Teknologi Informasi', 'Informatika'];
}
