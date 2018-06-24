<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529826183ExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            if(Schema::hasColumn('expenses', 'amount')) {
                $table->dropColumn('amount');
            }
            
        });
Schema::table('expenses', function (Blueprint $table) {
            
if (!Schema::hasColumn('expenses', 'amount')) {
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
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn('amount');
            
        });
Schema::table('expenses', function (Blueprint $table) {
                        $table->string('amount');
                
        });

    }
}
