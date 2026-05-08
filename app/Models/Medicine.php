<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'description', 'quantity'])]
class Medicine extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
}
