<?php

use app\models\Personal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\PersonalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Personals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-index">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <p>
        <?= Html::a('Create Personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel, // search
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_personal',
            [
                'header' => 'Nama Lengkap',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
                'value' => function ($model) {
                        return $model->nama_lengkap;
                    }
            ],
            // custom nama_lengkap
            // 'nama_panggilan',
            [
                'header' => 'Jenis Kelamin',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
                'value' => function ($model) {
                        return $model->jenis_kelamin;
                    }
            ],
            [
                'header' => 'Tempat Lahir',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
                'value' => function ($model) {
                        return $model->tempat_lahir;
                    }
            ],
            [
                'header' => 'Tanggal Lahir',
                'value' => function ($model) {
                        return date('Y-m-d', strtotime($model->tanggal_lahir));
                    }
            ],
            //'status_perkawinan',
            //'agama',
            //'pendidikan',
            //'alamat',
            //'no_ktp',
            //'no_hp',
            //'email:email',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Personal $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_personal' => $model->id_personal]);
                    }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>