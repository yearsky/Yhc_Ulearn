<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteGuruProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE deleteGuru(id_user INT(10))
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          DELETE users, role_user, instructors FROM users INNER JOIN role_user ON users.id = role_user.user_id INNER JOIN instructors ON users.id=instructors.user_id WHERE users.id = id_user;
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
        $sql = "DROP PROCEDURE IF EXISTS deleteGuru";
        DB::connection()->getPdo()->exec($sql);
    }
}
