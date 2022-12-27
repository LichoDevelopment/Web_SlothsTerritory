<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebConsultingBackup extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'client_mail',
        'message'
    ];
}
