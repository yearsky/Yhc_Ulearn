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
        CREATE OR REPLACE PROCEDURE insertUsers(IN first_name VARCHAR(255), IN last_name VARCHAR(255), IN email VARCHAR(120), IN password VARCHAR(60), IN is_active TINYINT(1), IN role_id INT(10), IN user_id INT(10), IN kelas_id INT(10))
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          INSERT INTO users(first_name, last_name, email, password, is_active) VALUES(first_name, last_name, email, password, is_active);
          SET user_id := LAST_INSERT_ID();
          INSERT INTO role_user(role_id, user_id, kelas_id) VALUES(role_id, user_id, kelas_id);
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
