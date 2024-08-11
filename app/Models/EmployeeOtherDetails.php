<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeOtherDetails extends Model
{
    use HasFactory;
    protected $table = 'employee_other_details';

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id'); // Adjust 'employee_id' as needed
    }
}
