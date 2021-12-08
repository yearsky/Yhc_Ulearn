<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGetMapelProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE GetMapel(IN instructorId VARCHAR(50))
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          SELECT course_title AS Maple, CONCAT(first_name, ' ',last_name) AS Nama FROM courses INNER JOIN instructors ON courses.instructor_id = instructors.id WHERE instructors.id = instructorId;
        END;$$
        ";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "DROP PROCEDURE IF EXISTS GetMapel";
        DB::connection()->getPdo()->exec($sql);
    }
}
