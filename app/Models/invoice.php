<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $table = "invoices";
    protected $fillable = [
        'invoice_name',
        'invoice_id',
        'invoice_taka',
        'invoice_month',
        'invoice_status',
        'invoice_type',
        'invoice_note'
    ];
}
