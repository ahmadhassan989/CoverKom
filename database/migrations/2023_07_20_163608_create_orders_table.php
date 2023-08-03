<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('used_acount')->nullable();

            $table->string('seller_name')->nullable();
            $table->string('seller_acount')->nullable();
            $table->string('seller_phone')->nullable();
            $table->text('seller_address')->nullable();
            $table->string('category_id')->nullable();
            $table->string('duration')->nullable();
            $table->string('amount')->nullable();
            $table->string('total')->nullable();

            $table->enum('pay_status', ['p', 'np', 'r', 'h'])->default('np'); //   [p=>'paid', np=>'notpaid', r=>'refund', h=>'hold']
            $table->enum('seller_pay_status', ['r','nr', 'h'])->default('nr'); // //   [r=>'received', nr =>'notreceived',  h=>'hold']
            $table->enum('status', ['n', 'c', 'd', 'p'])->default('n'); //   [n=>'new', c=>'canceled', d=>'done', p=>'processing']

            $table->string('order_ticket')->nullable()->unique();

            $table->text('user_message')->nullable();
            $table->text('seller_message')->nullable();
            $table->text('admin_message')->nullable();

            $table->string('documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
