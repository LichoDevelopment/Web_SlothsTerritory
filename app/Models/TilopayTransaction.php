<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TilopayTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tilopay_transactions";
    protected $primaryKey = "id";

    protected $fillable = [
        'reserva_id',
        'order_hash',
        'transaction_code',
        'transaction_status',
        'auth_code',
        'amount',
        'commission_Tilopay_amount', 
        'commission_system_amount', 
        'currency',
        'billToFirstName',
        'billToLastName',
        'billToAddress',
        'billToAddress2',
        'billToCity',
        'billToState',
        'billToZipPostCode',
        'billToCountry',
        'billToTelephone',
        'billToEmail',
        'orderNumber',
        'capture',
        'subscription',
        'platform',
        'deleted_at',
    ];

    // Relación con la tabla reservas
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }
}
