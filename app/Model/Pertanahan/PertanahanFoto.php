<?php

namespace App\Model\Pertanahan;

use App\Model\AsetPoint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PertanahanFoto extends Model
{
    use HasFactory;
    protected $table = 'aset_point_foto';
    protected $fillable = [
        'aset_point_id',
        'foto_file',
    ];

    use SoftDeletes;

    public function tanah()
    {
        return $this->belongsTo(AsetPoint::class);
    }
}