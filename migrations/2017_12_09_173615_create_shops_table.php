<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address1', 100)->nullable()->default(null);
            $table->string('address2', 100)->nullable()->default(null);
            $table->string('city', 50)->nullable()->default(null);
            $table->string('country', 25)->nullable()->default(null);
            $table->string('country_code', 25)->nullable()->default(null);
            $table->string('country_name', 100)->nullable()->default(null);
            $table->dateTimeTz('created_at');
            $table->dateTimeTz('updated_at');
            $table->string('customer_email', 100)->nullable()->default(null);
            $table->string('currency', 10)->nullable()->default(null);
            $table->string('domain', 100)->nullable()->default(null);
            $table->string('email', 100)->nullable()->default(null);
            $table->string('google_apps_domain', 100)->nullable()->default(null);
            $table->boolean('google_apps_login_enabled')->nullable()->default(null);
            $table->decimal('latitude', 10, 6)->nullable()->default(null);
            $table->decimal('longitude', 10, 6)->nullable()->default(null);
            $table->string('money_format', 25)->nullable()->default(null);
            $table->string('money_with_currency_format', 25)->nullable()->default(null);
            $table->string('weight_unit', 10)->nullable()->default(null);
            $table->string('myshopify_domain', 100);
            $table->string('name', 50);
            $table->string('plan_name', 25);
            $table->boolean('has_discounts')->default(false);
            $table->boolean('has_gift_cards')->default(false);
            $table->string('plan_display_name', 25);
            $table->boolean('password_enabled')->default(false);
            $table->string('phone')->nullable()->default(null);
            $table->string('primary_locale', 25);
            $table->string('province', 50);
            $table->string('province_code', 10);
            $table->string('shop_owner', 50);
            $table->string('source', 50)->nullable()->default(null);
            $table->boolean('force_ssl')->default(true);
            $table->boolean('tax_shipping')->nullable()->default(null);
            $table->boolean('taxes_included')->nullable()->default(null);
            $table->boolean('county_taxes')->nullable()->default(null);
            $table->string('timezone', 50);
            $table->string('iana_timezone', 50);
            $table->string('zip', 15)->nullable()->default(null);
            $table->boolean('has_storefront')->default(true);
            $table->boolean('setup_required')->default(false);
            $table->string('access_token', 255)->nullable()->default(null);
            $table->string('scopes', 255)->nullable()->default(null);
            $table->timestamp('install_time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
