<?php

class RouteTableSeeder extends Seeder {

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

		DB::table('route')->insert($data);
	}

}