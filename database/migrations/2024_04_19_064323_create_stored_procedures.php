<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE PROCEDURE insertRecord(
                IN p_name VARCHAR(100),
                IN p_age VARCHAR(10),
                IN p_phone VARCHAR(10)
                )
                BEGIN 
                    INSERT INTO sp1 (name,age,phone) VALUES (p_name, p_age, p_phone);
                END
        ');

        DB::unprepared('
                CREATE PROCEDURE updateRecord(
                    IN p_id INT,
                    IN p_name VARCHAR(100),
                    IN p_age VARCHAR(10),
                    IN p_phone VARCHAR(10)
                )
                BEGIN
                    IF p_name IS NOT NULL THEN
                        UPDATE sp1 SET name = p_name WHERE id = p_id;
                    END IF;
                    IF p_age IS NOT NULL THEN
                        UPDATE sp1 SET age = p_age WHERE id = p_id; 
                    END IF;
                    IF p_phone IS NOT NULL THEN
                        UPDATE sp1 SET phone = p_phone WHERE id = p_id;
                    END IF;
                END

        ');
        DB::unprepared('
                CREATE PROCEDURE deleteRecord(
                    IN p_id INT
                )
                BEGIN
                    DELETE FROM sp1 WHERE id = p_id;
                END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stored_procedures');
        DB::unprepared('DROP PROCEDURE IF EXISTS insertRecord');
        DB::unprepared('DROP PROCEDURE IF EXISTS updateRecord');
    }
};
