<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Useraddresses;
use App\Models\User;
use App\Models\SiteInfo;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            ['name'  => 'Admin','email' => 'admin@admin.com','password' =>bcrypt('password')],
            ['name'  => 'Superadmin','email' => 'superadmin@ecommerceaibot.com','password' =>bcrypt('Jwz4sivpkPBBLUPOphe')],
        ];
        $useliost = [
            ['name'  => 'Username','email' => 'Username@admin.com','password' =>bcrypt('password'),'status'=>1,'gender'=>'Male','phoneNumber'=>'701877447','bio'=>'Hello','Countrycode'=>'+91','dob'=>'1998-03-21'],
        ];
        $SiteInfo = [
            ['site_id'  =>  \Str::random(10),'site_title' => 'ecommerceaibot','currency' => '$'],
        ];
        $useaddress = [
            ['user_id'  => '1','First_name' => 'Test','last_name' =>'Exotica','is_shipping_addre'=>true,'Addresstype'=>'Office','Phone_Number'=>'701877447','country_id'=>'101','country'=>'India','state_id'=>'4015','state'=>'Punjab','address1'=>'Test Address1','address2'=>'Test Address2','city_id'=>'132980','city'=>'Mohali','pincode'=>'160059'
        ],
        ];
        Admin::insert($admin);
        User::insert($useliost);
        SiteInfo::insert($SiteInfo);
        Useraddresses::insert($useaddress);
    }
}
