<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;
use App\Enum\DatabaseEnum;
class CreateCustomerSessionMessagesTable extends Migration
{

    /** @var string  */
    protected string $connection = DatabaseEnum::CUSTOMER_CONNECTION;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_session_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('session_id')->index();
            $table->text('message')->comment('消息内容');
            $table->tinyInteger('status')->comment('0 未读 1 已读');
            $table->integer('customer_id')->index()->comment('客服id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_session_messages');
    }
}
