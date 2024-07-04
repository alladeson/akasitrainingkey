<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    const pending_en = 'pending';
    const pending_fr = 'En attente';
    const approved_en = 'approved';
    const approved_fr = 'Approuvée';
    const declined_en = 'declined';
    const declined_fr = 'Déclinée';
    const canceled_en = 'canceled';
    const canceled_fr = 'Annulée';
    const refunded_en = 'refunded';
    const refunded_fr = 'Remboursée';
    const transferred_en = 'transferred';
    const transferred_fr = 'Transférée';
    // const mode_kkiapay = 'KKIAPAY';
    const mode_kkiapay = 'Mobile Money';
    // const mode_fedapay = 'FEDAPAY';
    const mode_fedapay = 'Mobile Money';
    // const mode_stripe = 'STRIPE';
    const mode_stripe = 'Credit/Bank Card';
    const currency_fcfa = 'fcfa';
    const currency_euro = 'euro';

    protected $fillable = [
        'student_id',
        'schedule_id',
        'status_en',
        'status_fr',
        'mode',
        'amount',
        'amount_euro',
        'amount_fcfa',
        'amount_total_euro',
        'amount_total_fcfa',
        'quantity',
        'translation_id',
        'currency',
        'invoice_number',
        'receipt_number',
        'payment_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
