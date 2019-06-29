<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190629_094242_create_localization_content_table
 * 
 * @package 
 */
class m190629_094242_create_localization_content_table extends Migration {

	public $table = 'localization_content';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull()->comment('Идентификатор'),
			'entity_id' => $this->integer()->notNull()->comment('ID сущности'),
			'ext_id' => $this->integer()->notNull()->comment('Внешний ID записи'),
			'language_code' => $this->string(3)->notNull()->comment('Код языка'),
			'value' => $this->json()->notNull()->comment('Текст полей'),
		];
	}

	public function afterCreate()
	{
	    $this->myCreateIndexUnique(['entity_id', 'ext_id', 'language_code']);
		$this->myAddForeignKey(
			'entity_id',
			'localization_entity',
			'id',
			'CASCADE',
			'CASCADE'
		);
		$this->myAddForeignKey(
			'language_code',
			'language',
			'code',
			'CASCADE',
			'CASCADE'
		);
	}

}