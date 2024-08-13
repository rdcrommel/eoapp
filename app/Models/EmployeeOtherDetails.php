<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeOtherDetails extends Model
{
    use HasFactory;
    protected $table = 'employee_other_details';
    protected $primaryKey = 'employee_other_detail_id'; // Specify the primary key if it's not 'id'

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_other_detail_id', 'employee_id');
    }
}
