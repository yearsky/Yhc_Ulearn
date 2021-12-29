<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePMapelProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE P_Mapel(IN instructorsId VARCHAR)
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          SELECT course_title AS Maple, CONCAT(instructors.first_name, ' ', instructors.last_name) AS Nama FROM courses INNER JOIN instructors ON courses.instructor_id = instructors.id INNER JOIN users ON instructors.user_id = users.id WHERE instructors.user_id = instructorsId; 
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
        $sql = "DROP PROCEDURE IF EXISTS P_Mapel";
        DB::connection()->getPdo()->exec($sql);
    }
}
