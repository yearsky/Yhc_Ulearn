<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedurePMapel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `P_Mapel`;
        CREATE DEFINER=`".env('DB_USERNAME')."`@`".env('DB_HOST')."` PROCEDURE `P_Mapel`( IN instructorsId Varchar(50))
            BEGIN SELECT course_title AS Maple, CONCAT(instructors.first_name, ' ', instructors.last_name) AS Nama FROM courses INNER JOIN instructors ON courses.instructor_id = instructors.id INNER JOIN users ON instructors.user_id = users.id WHERE instructors.user_id = instructorsId; 
        END;";

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
