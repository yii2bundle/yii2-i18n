<?php
namespace yii2bundle\i18n\module\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii2rails\extension\web\helpers\Behavior;
use yii2bundle\i18n\domain\enums\LangPermissionEnum;

class ManageController extends Controller
{

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			Behavior::access(LangPermissionEnum::MANAGE),
		];
	}

	public function actionIndex()
	{
		$dataProvider = new ArrayDataProvider([
			'allModels' => \App::$domain->lang->language->all(),
			'sort' => [
				'attributes' => ['title', 'code', 'locale', 'is_main'],
			],
		]);
		return $this->render('index', compact('dataProvider'));
	}
	
}

