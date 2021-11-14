<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `Absensi`;
        CREATE DEFINER=`".env('DB_USERNAME')."`@`".env('DB_HOST')."` PROCEDURE `Absensi`()
            BEGIN SELECT Absensi.id, Concat(instructors.first_name, ' ', instructors.last_name) AS Guru, Concat(Users.first_name,' ',Users.last_name) As Siswa, table_kelas.nama as Kelas ,course_title as Mapel,keterangan FROM Absensi INNER JOIN Instructors ON Absensi.id_instructor = Instructors.id  INNER JOIN Users ON Absensi.id_siswa = Users.id INNER JOIN Courses ON Absensi.id_course = Courses.id INNER JOIN table_kelas ON Absensi.id_kelas = table_kelas.id; 
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
        $sql = "DROP PROCEDURE IF EXISTS Absensi";
        DB::connection()->getPdo()->exec($sql);
    }
}
