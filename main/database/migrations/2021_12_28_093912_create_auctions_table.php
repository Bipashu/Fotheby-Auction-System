<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->string('auction_title');
            $table->string('has_catalogue');
            $table->string('auction_date');
            $table->string('isArchieved');
            $table->string('auction_status');
            $table->timestamps();
        });
        Schema::create('catalogues', function (Blueprint $table) {
            $table->id();
            $table->string('catalogue_title');
            $table->unsignedBigInteger('lot_number')->unique();
            $table->unsignedBigInteger('auction_id')->nullable();
            $table->string('isArchieved');
            $table->foreign('auction_id')->references('id')->on('auctions');
            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lot_reference_number')->unique();
            $table->unsignedBigInteger('catalogue_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('bid_id')->nullable();
            $table->string('category_name');
            $table->string('user_name');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->string('item_name');
            $table->string('item_status');
            $table->string('artist_name');
            $table->string('year_of_production');
            $table->string('subject_classification');
            $table->string('description');
            $table->unsignedBigInteger('start_price');
            $table->string('frame_status')->nullable();
            $table->string('isArchieved');
            $table->string('auction_date')->nullable();
            $table->string('dimension')->nullable();
            $table->string('medium')->nullable();
            $table->string('image_type')->nullable();
            $table->string('picture');
            $table->string('material_used')->nullable();
            $table->string('weight')->nullable();
            $table->foreign('catalogue_id')->references('id')->on('catalogues');
            $table->foreign('user_id')->references('id')->on('users');
          

            $table->timestamps();
        });
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bid_amount');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('buyer_id')->nullable();
           
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('buyer_id')->references('id')->on('users');

            $table->timestamps();
        });
        Schema::create('commisssions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commission_amount');
           
            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('bid_id')->nullable();
            $table->unsignedBigInteger('catalogue_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('bid_id')->references('id')->on('bids');
            $table->foreign('catalogue_id')->references('id')->on('catalogues');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    {   
        Schema::dropIfExists('commissions');
        Schema::dropIfExists('bids');
        Schema::dropIfExists('items');
       
        Schema::dropIfExists('catalogues');
        Schema::dropIfExists('auctions'); 
       
        
       
        
    }
}
