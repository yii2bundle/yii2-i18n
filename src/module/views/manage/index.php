<?php

use yii\grid\GridView;
use yii\data\ArrayDataProvider;

/* @var $this yii\web\View
 * @var $dataProvider ArrayDataProvider
 */

$this->title = Yii::t('i18n/manage', 'title');

?>

<div class="box box-primary">
	<div class="box-body">
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'layout' => '{summary}{items}{pager}',
			'columns' => [
				[
					'attribute' => 'title',
					'label' => Yii::t('i18n/main', 'language'),
				],
				[
					'attribute' => 'name',
					'label' => Yii::t('i18n/main', 'name'),
				],
				[
					'attribute' => 'code',
					'label' => Yii::t('i18n/main', 'code'),
				],
				[
					'attribute' => 'locale',
					'label' => Yii::t('i18n/main', 'locale'),
				],
				[
					'attribute' => 'is_main',
					'label' => Yii::t('i18n/main', 'main_as_default'),
					'format' => 'html',
					'value' => function ($entity) {
						return  $entity->is_main ? '<span class="label label-success"><i class="fa fa-check"></i> '.t('yii', 'Yes').'</span>' : '<span class="label label-danger"><i class="fa fa-times"></i> '.t('yii', 'No').'</span>';
					},
				],
				/*[
					'attribute' => 'is_enabled',
					'label' => Yii::t('i18n/main', 'is_enabled'),
					'format' => 'html',
					'value' => function ($entity) {
						return  $entity->is_enabled ? '<span class="label label-success"><i class="fa fa-check"></i> '.t('yii', 'Yes').'</span>' : '<span class="label label-danger"><i class="fa fa-times"></i> '.t('yii', 'No').'</span>';
					},
				],*/
			],
		]); ?>
	</div>
</div>
