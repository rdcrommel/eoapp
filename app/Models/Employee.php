<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee'; // Ensure the table name is correct
    protected $primaryKey = 'employee_id'; // Specify the primary key if it's not 'id'

    public static function getEmployeeDetails($options = array()) {
        $employee_id = array_key_exists("employee_id", $options) ? $options["employee_id"] : null;

        if ($employee_id) {
            return self::where('employee_id', $employee_id)->first();
        }

        return null;
    }
    
}