<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('general_settings')->insert(array('id' => '1','name' => 'Liva Dermatology','title' => 'Liva Dermatology','address' => 'address','phone' => '36954820','email' => 'admin@medprohis.com','currency' => 'BHD','currency_symbol' => 'BHD','country' => 'Bahrain','mane_logo' => 'logo.png','fab_logo' => 'fab_logo.png','print_logo' => 'print_logo.png','leaveform_print_logo' => 'leaveformlogo.png','facebook' => NULL,'twitter' => NULL,'linked_in' => NULL,'youtube' => NULL,'instagram' => NULL,'pinterest' => NULL,'snapchat' => NULL,'vk' => NULL,'website' => 'medprohis.com','create_by' => '1','created_at' => NULL,'updated_at' => NULL));


        DB::table('users')->insert([
            ['id' => '1', 'username' => 'superadmin', 'employee_id' => '1000', 'name' => 'Super Admin', 'role_id' => null, 'developer' => 'yes','doctor' => null,  'email' => 'admin@gmail.com', 'phone' => NULL,  'department_id' => null, 'service_id' => null, 'counter_id' => null, 'room_id' => null, 'date_of_birth' => NULL, 'note' => NULL, 'gender' => NULL,  'id_card_number' => NULL,  'image' => 'profile.jpg', 'isban' => 'active', 'last_seen' => '2023-11-09 19:04:57', 'email_verified_at' => NULL, 'password' => bcrypt( 'Mnbvcxz@123' ), 'remember_token' => bcrypt( 'Mnbvcxz@123' ), 'created_at' => '2023-07-19 22:12:56', 'updated_at' => '2023-11-09 19:04:57']
        ]);
    }
}
