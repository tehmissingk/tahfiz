<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\MaklumatPelajarPenjaga;
use app\models\MaklumatPelajarPenjagaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MaklumatPilihanPusatPengajian;
use app\models\YuranSemasa;
use yii\data\ActiveDataProvider;

/**
 * MaklumatPelajarPenjagaController implements the CRUD actions for MaklumatPelajarPenjaga model.
 */
class MaklumatPelajarPenjagaController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * Lists all MaklumatPelajarPenjaga models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaklumatPelajarPenjagaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status'=>'Approved']);
        //$dataProvider->query->where(['status'=>'Approved']);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionPending()
    {
        $searchModel = new MaklumatPelajarPenjagaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status'=>'Pending']);

        return $this->render('pending', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDetail($id_pusat)
    {
        $searchModel = new MaklumatPelajarPenjagaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['pusat_pengajian_id'=>$id_pusat]);

        return $this->render('detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionTahfiz()
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT COUNT(maklumat_pelajar_penjaga.id) AS total,
            lookup_pusat_pengajian.pusat_pengajian,
            lookup_pusat_pengajian.id AS id_pusat
            FROM maklumat_pelajar_penjaga 
            RIGHT JOIN lookup_pusat_pengajian ON maklumat_pelajar_penjaga.pusat_pengajian_id = lookup_pusat_pengajian.id
            GROUP BY maklumat_pelajar_penjaga.pusat_pengajian_id");

        $model_details = $sql->queryAll();

        return $this->render('tahfiz',[
            'model_details' => $model_details,
        ]);
    }

    public function actionYuran()
    {
        $searchModel = new MaklumatPelajarPenjagaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status'=>'Pending']);

        return $this->render('yuran', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionRekod_yuran()
    {
        $searchModel = new MaklumatPelajarPenjagaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status'=>'Pending']);

        return $this->render('rekod_yuran', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single MaklumatPelajarPenjaga model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MaklumatPelajarPenjaga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaklumatPelajarPenjaga();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaklumatPelajarPenjaga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaklumatPelajarPenjaga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaklumatPelajarPenjaga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaklumatPelajarPenjaga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaklumatPelajarPenjaga::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
