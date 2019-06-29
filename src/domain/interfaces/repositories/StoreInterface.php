<?php

namespace yii2bundle\i18n\domain\interfaces\repositories;

interface StoreInterface {
	
	public function set($value);
	public function get($def = null);
	public function has();
	public function remove();
	
}
