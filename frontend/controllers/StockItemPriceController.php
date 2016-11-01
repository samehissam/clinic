<?php

namespace frontend\controllers;

use Yii;
use app\models\StockItemPrice;
use frontend\models\StockItemPriceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * StockItemPriceController implements the CRUD actions for StockItemPrice model.
 */
class StockItemPriceController extends Controller
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
     * Lists all StockItemPrice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StockItemPriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    

    /**
     * Displays a single StockItemPrice model.
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
     * Creates a new StockItemPrice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StockItemPrice();
            if (count($this->checkPermission()) > 0 ) {

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          Yii::$app->getSession()->setFlash('success',
          "<span  style='font-weight: bold; font-size: 20px;'>
  تم تسجيل نسبة بيع المستلزمات الطبية لهذه الجهة تقدر حضرتك تضيف لجهات اخري</span>");
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
     * Updates an existing StockItemPrice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
            if (count($this->checkPermission()) > 0 ) {

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          Yii::$app->getSession()->setFlash('success',
          "<span  style='font-weight: bold; font-size: 20px;'>
تم تعديل نسبة البيع بنجاح تقدر حضرتك تضيف نسب اخري أو تعدل النسبة لجهات آخري</span>");
            return $this->redirect(['create']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
      }else{
         return $this->redirect(['error']);
      }

    }

    /**
     * Deletes an existing StockItemPrice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      if (count($this->checkPermission()) > 0 ) {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
      }else{
         return $this->redirect(['error']);
      }

    }

    /**
     * Finds the StockItemPrice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StockItemPrice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StockItemPrice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
