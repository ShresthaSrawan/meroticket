<?php

class BusTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
			[
			'from'=>'kathmandu', 'to'=>'pokhara'			
			],
			[
			'from'=>'pokhara', 'to'=>'kathmandu'			
			]
		];

		DB::table('bus')->insert($data);
	}

}