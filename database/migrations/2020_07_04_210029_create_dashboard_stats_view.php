<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDashboardStatsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE VIEW dashboard_stats
            AS
            SELECT
                customers.id,
                customers.name,
                customers.active_projects,
                client_type.name AS client_type,
                customers.address_1,
                customers.address_lng_lat
            FROM
                customers
            INNER JOIN client_type ON customers.client_type_id = client_type.id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('dashboard_stats_view');
    }
}
