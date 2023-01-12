<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;
use App\Enum\DatabaseEnum;

class CreateCustomerUsersTable extends Migration
{
    /** @var string  */
    protected string $connection = DatabaseEnum::CUSTOMER_CONNECTION;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('app_id')->index();
            $table->string('name',20)->comment('客服名称');
            $table->string('avatar',100)->comment('头像');
            $table->string('email',100)->comment('邮箱');
            $table->string('password',100)->comment('密码');
            $table->string('phone',11)->comment('联系方式');
            $table->string('wx',30)->comment('联系方式');
            $table->tinyInteger('six')->default(1)->comment('1 男 2 女');
            $table->tinyInteger('status')->default(0)->comment('0 在线 1 休息 2 离线 ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_users');
    }
}
