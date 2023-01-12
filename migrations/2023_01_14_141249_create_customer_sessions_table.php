<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;
use App\Enum\DatabaseEnum;
class CreateCustomerSessionsTable extends Migration
{

    /** @var string  */
    protected string $connection = DatabaseEnum::CUSTOMER_CONNECTION;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip',20)->comment('会话ip');
            $table->string('cookie',255)->comment('临时cookie');
            $table->tinyInteger('status')->comment('0 会话中 1 关闭会话 2 已解决');
            $table->integer('to_id')->comment('接待客服id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_sessions');
    }
}
