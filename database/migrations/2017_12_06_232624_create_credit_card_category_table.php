<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_card_category', function (Blueprint $table) {
	    $table->timestamps();

	    # FK's to credit_card and category
	    $table->integer('credit_card_id')->unsigned();
	    $table->integer('category_id')->unsigned();
	    $table->foreign('credit_card_id')->references('id')->on('credit_cards')->onDelete('cascade');
	    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        $table->primary(['credit_card_id', 'category_id']);

	    # Earn rate
	    $table->decimal('earn_rate', 3, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_card_category');
    }
}
