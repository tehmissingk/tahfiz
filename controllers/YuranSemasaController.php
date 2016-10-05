<?php

namespace app\controllers;

use Yii;
use app\models\YuranSemasa;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LookupYuranTahun1;
use app\models\TransaksiYuran;
use app\models\YuranBulanan;
use app\models\MaklumatPelajarPenjaga;

/**
 * YuranSemasaController implements the CRUD actions for YuranSemasa model.
 */
class YuranSemasaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all YuranSemasa models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => YuranSemasa::find(),
        ]);

        return $this->render('index', [
            'id' => $id,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YuranSemasa model.
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
     * Creates a new YuranSemasa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT 
            YEAR(CURDATE()) - YEAR(STR_TO_DATE(tarikh_masuk, "%d/%m/%Y")) AS tahun_join,
            YEAR(CURDATE()) - YEAR(STR_TO_DATE(tarikh_lahir, "%d/%m/%Y")) AS umur 
        FROM maklumat_pelajar_penjaga 
        WHERE id = "'.$id.'"');
        $model_check = $sql->queryAll();

        foreach ($model_check as $key => $value) {
            $tahun_join = $value['tahun_join'];
            $umur = $value['umur'];
        } 
        // tahun =0 = pelajar baru if not old student

        // darjah 1
        if ($umur == 7) {
            $model = new YuranSemasa();
            $model2 = new YuranBulanan();
            $yuran = LookupYuranTahun1::find()->all();
            $title_yuran = "Tahun 1 (Pelajar Baru)";

            if ($model->load(Yii::$app->request->post()) ) {

                $model->darjah = 1;
                $model->id_pelajar = $id;
                $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                $model->date_create = date('d/m/Y');
                $model->status_yuran = "Belum Selesai";


                $model2->darjah = 1;
                $model2->id_pelajar = $id;
                $model2->date_create = date('d/m/Y');


                $model->save() && $model2->save();
                return $this->redirect(['index', 'id' => $model->id_pelajar]);



            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                    'yuran' => $yuran,
                    'title_yuran' => $title_yuran
                ]);
            }

        } elseif ($umur == 8) {

        }


    }

    public function actionPembayaran($id)
    {
        $yuran_semasa = YuranSemasa::find()->where(['id_yuran'=>$id])->all();
        $transaksi = TransaksiYuran::find()->where(['id_yuran'=>$id])->all();

        foreach ($yuran_semasa as $key => $value) {
            $darjah = $value['darjah'];
            $jenis_yuran= $value['jenis_yuran'];
        } 


        $array=  unserialize($jenis_yuran);

        $arrayTemp = implode(',', $array);

        if ($darjah == 1) {
            $connection = \Yii::$app->db;
            $sql = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_1 WHERE id IN ('.$arrayTemp.')');
            $jenis_yuran = $sql->queryAll();

            return $this->render('pembayaran',[
                'yuran_semasa' => $yuran_semasa,
                'jenis_yuran' => $jenis_yuran,
                'transaksi' => $transaksi,
                
            ]);

        }

    }
    public function actionBayar($id)
    {
        $model = new TransaksiYuran();

        $model2 = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->id_yuran = $id;

            $model->save();

            $yuran_semasa = YuranSemasa::find()->where(['id_yuran'=>$id])->one();

            $ys = $yuran_semasa->jumlah_yuran;

            $transaksi = TransaksiYuran::find()->where(['id_yuran'=>$id])->all();

            $sumTran = 0;

            foreach ($transaksi as $key => $value) {
               $sumTran += $value['jumlah_bayaran'];
            }
            
            if ($sumTran >= $ys) {

                $model2->status_yuran = "Selesai";
                $model2->save();
                
            } else {

                $model2->status_yuran = "Belum Selesai";
                $model2->save();
            }

            return $this->redirect(['pembayaran', 'id' => $model->id_yuran]);
        } else {
            return $this->renderAjax('bayar', [
                'model' => $model,
            ]);
        }
    }

    




    /**
     * Updates an existing YuranSemasa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_yuran]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionRekod($id)
    {

        $model = MaklumatPelajarPenjaga::find()->where(['id'=>$id])->one();

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM yuran_semasa 
                RIGHT JOIN transaksi_yuran 
                ON yuran_semasa.id_yuran = transaksi_yuran.id_yuran WHERE yuran_semasa.id_pelajar = '".$id."'");

        $model_details = $sql->queryAll();

        return $this->render('rekod',[
            'model_details' => $model_details,
            'model' => $model,
            ]);
    }


    /**
     * Deletes an existing YuranSemasa model.
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
     * Finds the YuranSemasa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YuranSemasa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = YuranSemasa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
