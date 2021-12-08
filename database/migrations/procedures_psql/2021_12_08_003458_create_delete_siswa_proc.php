<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteSiswaProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE deleteSiswa(user_id INT(10))
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          DELETE users,role_user FROM users INNER JOIN role_user ON users.id = role_user.user_id WHERE users.id=user_id;
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
        $sql = "DROP PROCEDURE IF EXISTS deleteSiswa";
        DB::connection()->getPdo()->exec($sql);
    }
}
