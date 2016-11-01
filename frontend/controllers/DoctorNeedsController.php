<?php

namespace frontend\controllers;

use Yii;
use app\models\DoctorNeeds;
use app\models\Session;
use frontend\models\Model;
use frontend\models\DoctorNeedsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * DoctorNeedsController implements the CRUD actions for DoctorNeeds model.
 */
class DoctorNeedsController extends Controller
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
                 'actions' => ['create', 'index', 'error', 'update', 'view', 'remove','delete','error', 'report', 'doctor-report'],
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
     * Lists all DoctorNeeds models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DoctorNeedsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDoctorReport()
    {
      if (count($this->checkPermission()) > 0 ) {

        $this->layout="reportLayout.php";
        return $this->render('doctor-report');
      }else{
         return $this->redirect(['error']);
      }
    }
    public function actionReport()
    {
      if (count($this->checkPermission()) > 0 ) {

        $this->layout="reportLayout.php";
        return $this->render('report');
      }else{
         return $this->redirect(['error']);
      }
    }
    /**
     * Displays a single DoctorNeeds model.
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
     * Creates a new DoctorNeeds model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Session();
        $doctor=  [new DoctorNeeds];
        $connection   = \Yii::$app->db;

        if ($model->load(Yii::$app->request->post())) {
          //$model->date = date('Y/m/d');
          // ;
          //
          $doctor = Model::createMultiple(DoctorNeeds::classname());
          Model::loadMultiple($doctor, Yii::$app->request->post());


          // validate all models
          $valid = $model->validate();
          $valid = Model::validateMultiple($doctor) && $valid;

          if ($valid) {
              $transaction = \Yii::$app->db->beginTransaction();
              try {

                  if ($flag = $model->save(false)) {
                      foreach ($doctor as $doctor) {
                        // get item cost
                   $item_price = $connection->createCommand('SELECT item_buyPrice
                     from inventory
                           where item_id= ' . $doctor->inventory_item_id)->queryAll();
                        $doctor->doctor_doctor_id=$model->has_id;
                        $doctor->item_cost=$item_price[0]['item_buyPrice'];

                          if (!($flag = $doctor->save(false))) {

                              $transaction->rollBack();
                              break;
                          }
                      }

                  }

                  if ($flag) {
                      $transaction->commit();

                  }
              } catch (Exception $e) {
                  $transaction->rollBack();
              }

          }
          $model->deleteAll();
          //
          //
          Yii::$app->getSession()->setFlash('success',
          "<span  style='font-weight: bold; font-size: 20px;'>
           تم تسجيل دخول المستلزمات الطبية بنجاح تقدر حضرتك تسجل مستلزمات آخري</span>");

          return $this->redirect(['create']);
          /*return $this->redirect(['create', 'model' => $model,
      'modelsTransaction' => (empty($modelsTransaction)) ? [new Transaction] : $modelsTransaction,
      ]);*/

      } else {
          return $this->render('create', [
              'model'             => $model,

            'doctor' =>  $doctor,
          ]);
      }

 }

    /**
     * Updates an existing DoctorNeeds model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->need_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DoctorNeeds model.
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
     * Finds the DoctorNeeds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoctorNeeds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DoctorNeeds::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
