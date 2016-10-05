<?php

namespace app\controllers;

use Yii;
use app\models\TransaksiYuranBulanan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\RecordYuranBulanan;

/**
 * TransaksiYuranBulananController implements the CRUD actions for TransaksiYuranBulanan model.
 */
class TransaksiYuranBulananController extends Controller
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
     * Lists all TransaksiYuranBulanan models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $kredit = new ActiveDataProvider([
            'query' => TransaksiYuranBulanan::find()->where(['jenis_transaksi'=>'kredit']),
        ]);

        $debit = new ActiveDataProvider([
            'query' => TransaksiYuranBulanan::find()->where(['jenis_transaksi'=>'debit']),
        ]);

        $date = date('Y-m-d');


        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT SUM(amaun) AS t1 FROM transaksi_yuran_bulanan WHERE transaksi = "bil" AND tarikh < "'.$date.'"');
        $t1 = $sql->queryAll();

        $sql2 = $connection->createCommand('SELECT SUM(amaun) AS t2 FROM transaksi_yuran_bulanan WHERE transaksi = "bayaran" AND tarikh < "'.$date.'"');
        $t2 = $sql2->queryAll();

        $sql3 = $connection->createCommand('SELECT SUM(amaun) AS b1 FROM transaksi_yuran_bulanan WHERE transaksi = "bil"');
        $b1 = $sql3->queryAll();


        $sql4 = $connection->createCommand('SELECT SUM(amaun) AS b2 FROM transaksi_yuran_bulanan WHERE transaksi = "bayaran"');
        $b2 = $sql4->queryAll();
    
        return $this->render('index', [
            'id' => $id,
            'kredit' => $kredit,
            'debit' => $debit,
            't1' => $t1,
            't2' => $t2,
            'b1' => $b1,
            'b2' => $b2,


        ]);
    }





    /**
     * Displays a single TransaksiYuranBulanan model.
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
     * Creates a new TransaksiYuranBulanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate($id)
    {
        $model = new TransaksiYuranBulanan();
        if ($model->load(Yii::$app->request->post()) ) {

            $model->transaksi = "bayaran";
            $model->jenis_transaksi = "debit";
            $model->id_yuran_bulanan = $id;

            $model->save();


            return $this->redirect(['index', 'id' => $model->id_yuran_bulanan]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }


   /* public function actionCreate($id)
    {
        $model = new TransaksiYuranBulanan();
        $model2 = new RecordYuranBulanan();


        if ($model->load(Yii::$app->request->post()) ) {

            $model->id_yuran_bulanan = $id;
            //$model->save();
            

            $model_record = RecordYuranBulanan::find()->where(['id_yuran_bulanan'=>$id])->exists();

            $money = $model->jumlah_bayaran = $_POST['TransaksiYuranBulanan']['jumlah_bayaran'];

            //$money = 91;
            //if not exsit
            if ($model_record != 1) {

                $jan = $feb = $mac = $april = $may = $june = $july = $aug = $sept = $oct = $nov = $dec = 0;
                // if new record for bulanan
                if ($money >= 110) {
                    $model2->january = 110;
                    $jan = $money -110;
                } else {
                    $model2->january = $money;
                }

                if ($jan >= 110) {
                    $model2->february = 110;
                    $feb = $jan - 110;
                } else {
                    $model2->february = $jan;
                }
             
                if ($feb >= 110) {
                    $model2->march = 110;
                    $mac = $feb - 110;
                } else {
                    $model2->march = $feb;
                }
                
                if ($mac >= 110) {
                    $model2->april = 110;
                    $april = $mac - 110;
                } else {
                    $model2->april = $mac;
                }

                if ($april >= 110) {
                    $model2->may = 110;
                    $may = $april - 110;
                } else {
                    $model2->may = $april;
                }

                if ($may >= 110) {
                    $model2->june = 110;
                    $june = $may - 110;
                } else {
                    $model2->june = $may;
                }

                if ($june >= 110) {
                    $model2->july = 110;
                    $july = $june - 110;
                } else {
                    $model2->july = $june;
                }

                if ($july >= 110) {
                    $model2->august = 110;
                    $aug = $july - 110;
                } else {
                    $model2->august = $july;
                }

                if ($aug >= 110) {
                    $model2->september = 110;
                    $sept = $aug - 110;
                } else {
                    $model2->september = $aug;
                }

                if ($sept >= 110) {
                    $model2->october = 110;
                    $oct = $sept - 110;
                } else {
                    $model2->october = $sept;
                }

                $model2->id_yuran_bulanan = $id;
                $model2->save();

            } else {

                $model3 = RecordYuranBulanan::find()->where(['id_yuran_bulanan'=>$id])->one();



                if ($model3->january == 110) {

                } 

                if ($model3->january < 110) {

                     $jumlah =  $model3->january + $money;

                    if ($jumlah > 110){
                        $balance = $jumlah - 110;
                        $model3->january = 110;
                        $model3->february = $balance;
                        continue;
                    } else {
                        $model3->january = $jumlah;
                    }

                } 

                if ($model3->february == 110) {

                } 

                if ($model3->february < 110) {


                    $jumlah =  $model3->february + $money;

                    if ($jumlah > 110) {
                        $balance = $jumlah - 110;
                        $model3->february = 110;
                        $model3->march = $balance;     
                    } else {
                        $model3->february = $jumlah;
                    }

                } 

                if ($model3->march == 110) {

                } 

                if ($model3->march < 110) {

                    $jumlah =  $model3->march + $money;

                    if ($jumlah > 110) {
                        $balance = $jumlah - 110;
                        $model3->march = 110;
                        $model3->april = $balance;
                    } else {
                        $model3->march = $jumlah;
                    }
 

                }




                $model3->save();






            }


       

             


           return $this->redirect(['index', 'id' => $model->id_yuran_bulanan]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    } */

    /**
     * Updates an existing TransaksiYuranBulanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_transaksi_yuran_bulanan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TransaksiYuranBulanan model.
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
     * Finds the TransaksiYuranBulanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TransaksiYuranBulanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransaksiYuranBulanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
