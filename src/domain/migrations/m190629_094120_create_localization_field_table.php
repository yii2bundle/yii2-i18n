<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190629_094242_create_localization_field_table
 * 
 * @package 
 */
class m190629_094120_create_localization_field_table extends Migration {

	public $table = 'localization_field';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull()->comment('Идентификатор'),
			'entity_id' => $this->integer()->notNull()->comment('ID сущности'),
			'name' => $this->string()->notNull()->comment('Имя'),
			'title' => $this->string()->notNull()->comment('Название'),
			'is_required' => $this->boolean()->notNull()->defaultValue(true)->comment('Обязательное ли к заполнению'),
		];
	}

	public function afterCreate()
	{
	    $this->myCreateIndexUnique(['entity_id', 'name']);
	    $this->myCreateIndexUnique(['entity_id', 'title']);
		$this->myAddForeignKey(
			'entity_id',
			'localization_entity',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}