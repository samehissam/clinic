<?php

namespace frontend\controllers;

use Yii;
use app\models\EmpPartSalary;
use frontend\models\EmpPartSalarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EmpPartSalaryController implements the CRUD actions for EmpPartSalary model.
 */
class EmpPartSalaryController extends Controller
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
                   'actions' => ['create', 'index', 'error','delete', 'update', 'view', 'remove','error', 'report', 'long-report'],
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

    /**
     * Lists all EmpPartSalary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpPartSalarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmpPartSalary model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
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
     * Creates a new EmpPartSalary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmpPartSalary();
        if (count($this->checkPermission()) > 0 ) {


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          Yii::$app->getSession()->setFlash('success',
           "<span  style='font-weight: bold; font-size: 20px;'>تم تسجيل المبلغ المستقطع من الموظف
     ". "</span>");
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
     * Updates an existing EmpPartSalary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->part_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmpPartSalary model.
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
     * Finds the EmpPartSalary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmpPartSalary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmpPartSalary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
