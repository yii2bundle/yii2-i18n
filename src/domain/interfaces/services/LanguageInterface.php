<?php

namespace yii2bundle\i18n\domain\interfaces\services;

use yii\web\NotFoundHttpException;
use yii2rails\domain\data\Query;
use yii2rails\domain\interfaces\services\ReadAllInterface;
use yii2rails\domain\interfaces\services\ReadInterface;
use yii2bundle\i18n\domain\entities\LanguageEntity;

interface LanguageInterface extends ReadInterface {

    public function initCurrent();

	/**
	 * @return LanguageEntity
	 * @throws NotFoundHttpException
	 */
	public function oneCurrent() : LanguageEntity;
	public function saveCurrent($language);

    /**
     * @return LanguageEntity
     * @throws NotFoundHttpException
     */
    public function oneByCode(string $code, Query $query = null);

    /**
     * @return LanguageEntity
     * @throws NotFoundHttpException
     */
    public function oneByLocale($locale);

}
