<?php

namespace yii2bundle\i18n\domain\interfaces\repositories;

use yii\web\NotFoundHttpException;
use yii2bundle\i18n\domain\entities\LanguageEntity;
use yii2rails\domain\interfaces\repositories\ReadInterface;

interface LanguageInterface extends ReadInterface {
	
	/**
	 * @return LanguageEntity
	 * @throws NotFoundHttpException
	 */
	public function oneCurrent();
	public function oneMain();
	public function saveCurrent($language);
	
	/**
	 * @return LanguageEntity
	 * @throws NotFoundHttpException
	 */
	public function oneByLocale($value);
	
}
