<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;


#[Fillable(['medicine_id', 'student_id', 'staff_id', 'quantity_given', 'notes'])]
class MedicineLog extends Model
{
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
