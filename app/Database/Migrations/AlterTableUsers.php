<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableUsers extends Migration
{
	public function up()
	{
		// add new identity info
		$fields = [
			'phone' => ['type' => 'VARCHAR', 'constraint' => 63, 'after' => 'fullname'],
			'nama_vendor' => ['type' => 'VARCHAR', 'constraint' => 100, 'after' => 'phone'],
		];
		$this->forge->addColumn('users', $fields);
	}

	public function down()
	{
		// drop new columns
		$this->forge->dropColumn('users', 'firstname');
		$this->forge->dropColumn('users', 'lastname');
		$this->forge->dropColumn('users', 'phone');
	}
}
