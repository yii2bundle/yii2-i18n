<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190629_094242_create_localization_domain_table
 * 
 * @package 
 */
class m190629_094100_create_localization_domain_table extends Migration {

	public $table = 'localization_domain';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull()->comment('Идентификатор'),
			'name' => $this->string()->notNull()->comment('Имя'),
			'title' => $this->string()->notNull()->comment('Название'),
		];
	}

	public function afterCreate()
	{
        $this->myCreateIndexUnique(['name']);
        $this->myCreateIndexUnique(['title']);
	}

}