<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateGuruProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE updateGuru(IN n_depan VARCHAR(100), IN n_belakang VARCHAR(100), IN email VARCHAR(100), IN pass VARCHAR(100), IN active TINYINT(1), IN id_role INT(10), IN id_user INT(10), IN id_kelas INT(10))
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          UPDATE users AS a INNER JOIN role_user AS b ON a.id = b.user_id INNER JOIN instructors AS c ON a.id = c.user_id SET a.first_name = n_depan, a.last_name = n_belakang, a.email = email, a.password = pass, a.is_active = active, b.role_id = id_role, b.user_id = id_user, b.kelas_id = id_kelas, c.first_name = n_depan, c.last_name = n_belakang, c.contact_email = email WHERE a.id = id_user;
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
        $sql = "DROP PROCEDURE IF EXISTS updateGuru";
        DB::connection()->getPdo()->exec($sql);
    }
}
