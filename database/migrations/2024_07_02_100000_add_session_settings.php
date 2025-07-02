<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        if (class_exists('Hacoidev\Settings\Setting')) {
            DB::table('settings')->insert([
                [
                    'key'         => 'session_lifetime',
                    'name'        => 'Session Lifetime',
                    'description' => 'Thời gian (phút) session được ghi nhớ sau khi đóng trình duyệt.',
                    'value'       => '15',
                    'field'       => '{"name":"value","label":"Value","type":"number"}',
                    'active'      => 1,
                    'group'       => 'key_access',
                ],
                [
                    'key'         => 'session_expire_on_close',
                    'name'        => 'Expire on Close',
                    'description' => 'Hết hạn session ngay khi đóng trình duyệt.',
                    'value'       => '0',
                    'field'       => '{"name":"value","label":"Value","type":"checkbox"}',
                    'active'      => 1,
                    'group'       => 'key_access',
                ]
            ]);
        }
    }

    public function down()
    {
        if (class_exists('Hacoidev\Settings\Setting')) {
            DB::table('settings')->whereIn('key', ['session_lifetime', 'session_expire_on_close'])->delete();
        }
    }
};
