<?php

use yii\db\Schema;
use yii\db\Migration;

class m151019_065022_create_all_reservation_tables extends Migration
{
  public function up()
  {
    $tables = Yii::$app->db->schema->getTableNames();
    $dbType = $this->db->driverName;
    $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
    $tableOptions_mssql = "";
    $tableOptions_pgsql = "";
    $tableOptions_sqlite = "";
    /* MYSQL */
    if (!in_array('customer', $tables))  {
      if ($dbType == "mysql") {
        $this->createTable('{{%customer}}', [
          'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
          0 => 'PRIMARY KEY (`id`)',
          'name' => 'VARCHAR(50) NOT NULL',
          'surname' => 'VARCHAR(50) NOT NULL',
          'phone_number' => 'VARCHAR(50) NULL',
        ], $tableOptions_mysql);
      }
    }

    /* MYSQL */
    if (!in_array('reservation', $tables))  {
      if ($dbType == "mysql") {
        $this->createTable('{{%reservation}}', [
          'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
          0 => 'PRIMARY KEY (`id`)',
          'room_id' => 'INT(11) NOT NULL',
          'customer_id' => 'INT(11) NOT NULL',
          'price_per_day' => 'DECIMAL(20,2) NOT NULL',
          'date_from' => 'DATE NOT NULL',
          'date_to' => 'DATE NOT NULL',
          'reservation_date' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ',
        ], $tableOptions_mysql);
      }
    }

    /* MYSQL */
    if (!in_array('room', $tables))  {
      if ($dbType == "mysql") {
        $this->createTable('{{%room}}', [
          'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
          0 => 'PRIMARY KEY (`id`)',
          'floor' => 'INT(11) NOT NULL',
          'room_number' => 'INT(11) NOT NULL',
          'has_conditioner' => 'INT(1) NOT NULL',
          'has_tv' => 'INT(1) NOT NULL',
          'has_phone' => 'INT(1) NOT NULL',
          'available_from' => 'DATE NOT NULL',
          'price_per_day' => 'DECIMAL(20,2) NULL DEFAULT \'0.00\'',
          'description' => 'TEXT NULL',
        ], $tableOptions_mysql);
      }
    }


    $this->createIndex('idx_room_id','reservation','room_id',0);
    $this->createIndex('idx_customer_id','reservation','customer_id',0);

    $this->execute('SET foreign_key_checks = 0');
    $this->addForeignKey('reservation_customer','{{%reservation}}', 'customer_id', '{{%customer}}', 'id', 'RESTRICT', 'RESTRICT' );
    $this->addForeignKey('reservation_room','{{%reservation}}', 'room_id', '{{%room}}', 'id', 'RESTRICT', 'RESTRICT' );
    $this->execute('SET foreign_key_checks = 1;');

    $this->execute('SET foreign_key_checks = 0');
    $this->insert('{{%room}}',['id'=>'1','floor'=>'1','room_number'=>'101','has_conditioner'=>'1','has_tv'=>'0','has_phone'=>'1','available_from'=>'2015-05-20','price_per_day'=>'120.00','description'=>'']);
    $this->insert('{{%room}}',['id'=>'2','floor'=>'2','room_number'=>'202','has_conditioner'=>'0','has_tv'=>'1','has_phone'=>'1','available_from'=>'2015-05-30','price_per_day'=>'118.00','description'=>'']);
    $this->execute('SET foreign_key_checks = 1;');
  }

  public function down()
  {
    $this->execute('SET foreign_key_checks = 0');
    $this->execute('DROP TABLE IF EXISTS `customer`');
    $this->execute('SET foreign_key_checks = 1;');
    $this->execute('SET foreign_key_checks = 0');
    $this->execute('DROP TABLE IF EXISTS `reservation`');
    $this->execute('SET foreign_key_checks = 1;');
    $this->execute('SET foreign_key_checks = 0');
    $this->execute('DROP TABLE IF EXISTS `room`');
    $this->execute('SET foreign_key_checks = 1;');
  }
}
