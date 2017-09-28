<?php

use Illuminate\Database\Seeder;

use App\Munic;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CpMexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::load('paises.xls', function($reader) {
			$reader->each(function($row) {
					$objcreated = Country::create([
						    'c_char_min_code' => $row['c_char_min_code'],
						    'c_char_code' => $row['c_char_code'],
						    'c_code' => $row['c_code'],
						    'c_name_es' => mb_convert_encoding($row['c_name_es'], "UTF-8"),
						    'c_name_en' => mb_convert_encoding($row['c_name_en'], "UTF-8"),
						]);

			});

		});

        Excel::load('c_Municipio.xls', function($reader) {
			$reader->each(function($row) {

					$objcreated = Munic::create([
						    'm_code' => $row['m_code'],
						    'm_state' => $row['m_state'],
						    'm_description' => mb_convert_encoding($row['m_description'], "UTF-8"),
						]);

			});

		});

		
		exec("mysql -u ".env('DB_USERNAME', 'control')." -p".env('DB_PASSWORD', 'control')." -h ".env('DB_HOST', '127.0.0.1')." -e \"USE ".env('DB_DATABASE', 'contabilidad').";LOAD XML LOCAL INFILE 'CPdescarga.xml' INTO TABLE cpmex CHARACTER SET 'utf8' ROWS IDENTIFIED BY '<table>';\"; ");
    }
}
