<?php

namespace yii2bundle\i18n\domain\repositories\header;

use Yii;
use yii2rails\domain\repositories\BaseRepository;
use yii2bundle\i18n\domain\interfaces\repositories\StoreInterface;

class StoreRepository extends BaseRepository implements StoreInterface {
	
	public $key = 'language';
	public $extra;
	
	public function set($value) {
		Yii::$app->response->headers->add($this->key, $value);
	}
	
	public function get($def = null) {
		return Yii::$app->request->headers->get($this->key, $def);
	}
	
	public function has() {
		return Yii::$app->response->headers->has($this->key);
	}
	
	public function remove()
	{
		return Yii::$app->response->headers->remove($this->key);
	}
	
}
