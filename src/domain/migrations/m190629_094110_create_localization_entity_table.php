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
			'book_id' => $this->integer()->notNull()->comment('ID предметной области'),
			'name' => $this->string()->notNull()->comment('Имя'),
			'title' => $this->string()->comment('Название'),
			'table' => $this->string()->comment('Глобальное имя таблицы'),
		];
	}

	public function afterCreate()
	{
	    $this->myCreateIndexUnique(['book_id', 'name']);
	    $this->myCreateIndexUnique(['book_id', 'title']);
        $this->myAddForeignKey(
            'book_id',
            'model_book',
            'id',
            'CASCADE',
            'CASCADE'
        );
	}

}