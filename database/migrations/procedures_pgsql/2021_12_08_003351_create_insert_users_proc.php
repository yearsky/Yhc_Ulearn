<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsertUsersProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE insertUsers(IN first_name VARCHAR, IN last_name VARCHAR, IN email VARCHAR, IN password VARCHAR, IN is_active INT, IN role_id INT, IN id_user INT, IN kelas_id INT)
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          INSERT INTO users(first_name, last_name, email, password, is_active) VALUES(first_name, last_name, email, password, is_active) RETURNING id INTO id_user;
          INSERT INTO role_user(role_id, user_id, kelas_id) VALUES(role_id, id_user, kelas_id);
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
        $sql = "DROP PROCEDURE IF EXISTS insertUsers";
        DB::connection()->getPdo()->exec($sql);
    }
}
