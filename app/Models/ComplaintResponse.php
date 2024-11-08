<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_id',
        'admin_id',
        'response',
        'image'
    ];

    function responseComplaint() {
        return $this->belongsTo(Complaint::class);   
    }

    
    function responseUser() {
        return $this->belongsTo(User::class);   
    }
}