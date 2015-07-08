<?php

namespace app\controllers;

use Yii;
use app\models\Siswa;
use app\models\SiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpExeption;
use yii\filters\VerbFilter;
use yii\data\Pagination;


class SiswaController extends Controller
{
	public function behavior()
	{
		return[
			'verb'=> [
				'class'=> VerbFiltes::className(),
				'actions'=>[
					'delete'=> ['post'],
					
				],
				
			],
			
		];
	}
public function actionIndex()
{
	$searchModel = new SiswaSearch();
	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	$query = Siswa::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $siswa = $query->orderBy('nama_siswa')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'siswa' => $siswa,
            'pagination' => $pagination,
            'searchModel'=> $searchModel,
			'dataProvider'=> $dataProvider,
        ]);
}
public function actionView($id)
{
	return $this->render('view',[
		'model' => $this->findModel($id),
		]);


}

public function actionCreate()
{
	$model = new Siswa();

	if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id' => $model->nisn]);
	} else {
		return $this->render('create',[
				'model' => $model,
				]);
	}
}
public function actionUpdate($id)
{
	$model = $this->findModel($id);

	if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id' => $model->nisn]);
	} else {
		return $this->render('update',[
				'model' => $model,
				]);
	}
}
public function actionDelete($id)
{
	$this->findModel($id)->delete();
	return $this->redirect(['index']);
}

protected function findModel($id)
{
if (($model = Siswa::findOne($id)) !== null){
	return $model;
} else {
		throw new NotFoundHttpExeption('the requested page does not exsit');
	   }

}


}