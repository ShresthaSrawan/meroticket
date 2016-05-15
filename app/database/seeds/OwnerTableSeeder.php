<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OwnerTableSeeder extends Seeder {

	public function run()
	{
		$data = [
			[
			'companyname'=>'Mero Ticket Pvt Ltd', 'ownername'=>'hari prasad',
			'contact_number'=>'015555555', 'address'=>'kalanki'
			],
			[
			'companyname'=>'Ma Kalyani Pvt Ltd', 'ownername'=>'Shayam Narayan',
			'contact_number'=>'016666666', 'address'=>'bagdol'
			]
		];

		DB::table('owner')->insert($data);
	}

}
