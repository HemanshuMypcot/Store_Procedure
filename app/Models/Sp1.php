<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sp1 extends Model
{
    use HasFactory;
    protected $table='sp1';
    protected $fillable=[
        'name',
        'age',
        'phone'
    ];
    // Insert Data
    public static function insertRecord($name,$age,$phone){
        DB::statement("CALL insertRecord('$name','$age','$phone')");
    }

    // Show Data
    public static function showRecord(){
        DB::statement('CALL showRecord()');
    }

    // Update Data
    public static function updateRecord($id, $name, $age, $phone){
        DB::statement("CALL updateRecord('$id', '$name','$age','$phone')");
    }

    // Delete
    public static function deleteRecord($id){
        DB::statement("CALL deleteRecord('$id')");
    }
    
    
}
