<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\SkinCare;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role
		$adminRole = new Role();
		$adminRole->name = "admin";
		$adminRole->display_name = "Admin";
		$adminRole->save();

		$memberRole = new Role();
		$memberRole->name = "member";
		$memberRole->display_name = "Member";
		$memberRole->save();

		// Membuat sample admin
		$admin = new User();
		$admin->name = 'Admin Larapus';
		$admin->email = 'admin@gmail.com';
		$admin->password = bcrypt('rahasia');
		$admin->save();
		$admin->attachRole($adminRole);
		
		// Membuat sample member
		$member = new User();
		$member->name = "Sample Member";
		$member->email = 'member@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();
		$member->attachRole($memberRole);

		//Skin Care
		$skin = new SkinCare();
		$skin->name = 'by_category';
		$skin->save();

		$skin = new SkinCare();
		$skin->name = 'by_concern';
		$skin->save();

		$skin = new SkinCare();
		$skin->name = 'by_range';
		$skin->save();

    }
}
