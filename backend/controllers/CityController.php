<?php

namespace backend\controllers;

use Yii;
use app\models\City;
use app\models\CitySearch;
use app\models\Country;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

/**
 * CityController implements the CRUD actions for City model.
 */
class CityController extends Controller
{
    /**
     * @inheritdoc
     */
     public function behaviors()
     {
         return [

             'access' => [
                 'class' => AccessControl::className(),
                 'rules' => [


                     [
                         'actions' => ['index', 'create', 'update', 'delete','view',
                         'report', 'scarica'],
                         'allow' => true,
                         'roles' => ['@'],
                     ],
                 ],
             ],

             'verbs' => [
                 'class' => VerbFilter::className(),
                 'actions' => [
                     'delete' => ['post'],
                 ],
             ],
         ];
     }

    /**
     * Lists all City models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(isset($_GET['ccode']) && $_GET['ccode'] != null){
          $ccode = $_GET['ccode'];
          $sql = "SELECT name FROM country WHERE code = '$ccode' ";
          //ESEGUI LA query
          $db = Yii::$app->db;
          $nazione= $db->createCommand($sql)->queryOne();
        } else {
          $nazione= "";
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'nazione' => $nazione,
        ]);
    }

    /**
     * Displays a single City model.
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
     * Creates a new City model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($ccode = null)
     {
       if(Yii::$app->user->can('create-country')){
         $model = new City();

         if ($model->load(Yii::$app->request->post())) {
           //Inizio inserimento file
            $model->file = UploadedFile::getInstance($model,'file');
            $fileName=$model->name;
            $filePath="img/";
            $savePath= $filePath . $fileName . "." . $model->file->extension;
            $model->file->saveAs($savePath);
            //Fine inserimento file
            //registriamo il nome del file nel DB nel campo allegato
            $model->allegato=$savePath;

              $model->save();
             return $this->redirect(['view', 'id' => $model->id_city]);
         } else {//visualizzo la view create.php
           if(isset($ccode) && $ccode != null){
             //Ho passato $ccode dentro l'URL, lo deve passare anche a create.php
             return $this->render('create', [
                 'model' => $model,
                 'ccode' => $ccode,
             ]);
           }else{
             return $this->render('create', [
                 'model' => $model,
             ]);
           }

         }
       } else {
         throw new ForbiddenHttpException;
       }
     }

    /**
     * Updates an existing City model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      if(Yii::$app->user->can('update-country')){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          if(strlen(
           $_FILES['City']['tmp_name']['file'])>0){

             $model->file = UploadedFile::getInstance($model,'file');
             $fileName=$model->name;
             $filePath="img/";
             $savePath= $filePath . $fileName . "." . $model->file->extension;
             $model->file->saveAs($savePath);

             //registriamo il nome del file nel DB nel campo allegato
             $model->allegato=$savePath;
           }
           $model->save();
            return $this->redirect(['view', 'id' => $model->id_city]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
      } else {
        throw new ForbiddenHttpException;
      }
    }

    /**
     * Deletes an existing City model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      if(Yii::$app->user->can('delete-country')){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
      } else {
        throw new ForbiddenHttpException;
      }
    }

    public function actionScarica($id, $allegato){

       $filenameAllegato= $allegato;

       //echo $filenameAllegato; die();

           if(file_exists($filenameAllegato)){
           return $this->redirect($allegato);
           }

            else{
            return $this->render('scarica', [
                            'model' => $this->findModel($id),
                            'allegato' =>$allegato,
                        ]);
            }
        }

    /**
     * Finds the City model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return City the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = City::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
