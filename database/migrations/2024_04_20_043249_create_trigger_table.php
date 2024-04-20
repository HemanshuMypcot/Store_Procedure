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
            CREATE TRIGGER uppercase_name BEFORE INSERT ON sp1
            FOR EACH ROW
            BEGIN
                SET NEW.name=upper(NEW.name);
            END
        ');

        DB::unprepared('
            CREATE TRIGGER phone_change BEFORE INSERT ON sp1
            FOR EACH ROW
            BEGIN
                SET NEW.phone = CONCAT("+91",NEW.phone);
            END
        ');

        DB::unprepared('
            CREATE TRIGGER age_edit BEFORE INSERT ON sp1
            FOR EACH ROW
            BEGIN
                SET NEW.age = CONCAT(NEW.age," age");
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS uppercase_name');
        DB::unprepared('DROP TRIGGER IF EXISTS phone_change');
        DB::unprepared('DROP TRIGGER IF EXISTS age_edi');
    }
};
