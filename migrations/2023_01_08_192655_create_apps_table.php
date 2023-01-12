<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;
use App\Enum\DatabaseEnum;

class CreateAppsTable extends Migration
{
    protected string $connection = DatabaseEnum::SHOP_CONNECTION;

    public function getConnection(): string
    {
        return DatabaseEnum::CUSTOMER_CONNECTION;
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apps', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->string('app_id',30)->index()->comment('appid');
            $table->string('app_key',100)->comment('app key');
            $table->integer('end_time')->default(0)->comment('过期时间');
            $table->integer('user_id')->comment('创建人id');
            $table->string('name')->comment('创建人昵称');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apps', function (Blueprint $table) {
            //
        });
    }
}
