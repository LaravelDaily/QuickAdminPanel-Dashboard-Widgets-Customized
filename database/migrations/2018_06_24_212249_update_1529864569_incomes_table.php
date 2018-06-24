<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529864569IncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            if(Schema::hasColumn('incomes', 'amount')) {
                $table->dropColumn('amount');
            }
            
        });
Schema::table('incomes', function (Blueprint $table) {
            
if (!Schema::hasColumn('incomes', 'amount')) {
                $table->double('amount', 15, 2)->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->dropColumn('amount');
            
        });
Schema::table('incomes', function (Blueprint $table) {
                        $table->string('amount');
                
        });

    }
}
