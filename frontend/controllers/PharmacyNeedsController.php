<?php

namespace frontend\controllers;

use Yii;
use app\models\PharmacyNeeds;
use frontend\models\PharmacyNeedsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * PharmacyNeedsController implements the CRUD actions for PharmacyNeeds model.
 */
class PharmacyNeedsController extends Controller
{
    /**
     * @inheritdoc
     */
     public function behaviors()
     {
       return [
       'access' => [
           'class' => AccessControl::className(),
           //'only' => ['logout', 'signup'],
           'rules' => [
               [
                  'actions' => ['create', 'index', 'error', 'update', 'view', 'remove','delete','error', 'report', 'long-report'],
                   'allow'   => true,
                    'roles'   => ['@'],
                   'allow'   => true,
                   'roles'   => ['@'],
               ],
           ],
       ],
       'verbs'  => [
           'class'   => VerbFilter::className(),
           'actions' => [
               'delete' => ['post'],
           ],
       ],
   ];
   }

     public function checkPermission()
     {
         $userId     = Yii::$app->user->identity->id;
         $connection = \Yii::$app->db;
         $checkAdmin = $connection->createCommand("SELECT item_name from auth_assignment WHERE user_id
             =" . $userId)->queryAll();

             //use this bettween any action you want to give to spasific person like admin


         //   if (count($this->checkPermission()) > 0 ) { }
         return $checkAdmin;
     }

     public function actionError()
     {
         return $this->render('error');
     }


    /**
     * Lists all PharmacyNeeds models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PharmacyNeedsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PharmacyNeeds model.
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
     * Creates a new PharmacyNeeds model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PharmacyNeeds();
        if (count($this->checkPermission()) > 0 ) {
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
      }else{
         return $this->redirect(['error']);
      }

    }

    /**
     * Updates an existing PharmacyNeeds model.
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
     * Deletes an existing PharmacyNeeds model.
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
     * Finds the PharmacyNeeds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PharmacyNeeds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PharmacyNeeds::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
