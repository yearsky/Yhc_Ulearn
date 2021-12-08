<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateSiswaProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE updateSiswa(IN n_depan VARCHAR(100), IN n_belakang VARCHAR(100), IN s_email VARCHAR(100), IN s_password VARCHAR(100), IN s_active TINYINT(1), IN role_id INT(10), IN user_id INT(10), IN kelas_id INT(10))
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          UPDATE users AS A INNER JOIN role_user AS B ON A.id=B.user_id SET A.first_name=n_depan, A.last_name=n_belakang, A.email=s_email, A.password=s_password, A.is_active=s_active, B.role_id=role_id, B.user_id=user_id, B.kelas_id=kelas_id WHERE A.id=user_id;
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
        $sql = "DROP PROCEDURE IF EXISTS updateSiswa";
        DB::connection()->getPdo()->exec($sql);
    }
}
