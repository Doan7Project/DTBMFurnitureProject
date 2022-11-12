<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW viewOrder 
            AS
            SELECT
                order_masters.customer_id,
                order_masters.order_number,
                order_masters.created_at,
                order_masters.status,
                order_details.order_master_id,
                order_details.product_id,
                order_details.quantity,
                products.product_name,
                products.price,
                products.images,
                customers.email,
                customers.first_name,
                customers.last_name
            FROM order_masters, order_details, products, customers
            WHERE 
                order_masters.id = order_details.order_master_id AND 
                order_details.product_id = products.id AND
                order_masters.customer_id = customers.id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS viewOrder');
    }
};