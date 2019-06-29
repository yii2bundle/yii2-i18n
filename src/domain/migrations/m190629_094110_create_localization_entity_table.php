<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190629_094242_create_localization_entity_table
 * 
 * @package 
 */
class m190629_094110_create_localization_entity_table extends Migration {

	public $table = 'localization_entity';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull()->comment('Идентификатор'),
			'domain_id' => $this->integer()->notNull()->comment('ID предметной области'),
			'name' => $this->string()->notNull()->comment('Имя'),
			'title' => $this->string()->notNull()->comment('Название'),
		];
	}

	public function afterCreate()
	{
	    $this->myCreateIndexUnique(['domain_id', 'name']);
	    $this->myCreateIndexUnique(['domain_id', 'title']);
		$this->myAddForeignKey(
			'domain_id',
			'localization_domain',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}