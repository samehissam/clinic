<?php

namespace frontend\controllers;

use Yii;
use app\models\AuthAssignment;
use frontend\models\AuthAssignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * AuthAssignmentController implements the CRUD actions for AuthAssignment model.
 */
class AuthAssignmentController extends Controller
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
                  'actions' => ['create', 'index', 'error', 'update', 'view', 'remove','error', 'report', 'long-report'],
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
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthAssignmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthAssignment model.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionView($item_name, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($item_name, $user_id),
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
     * Creates a new AuthAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthAssignment();
          if (count($this->checkPermission()) > 0 ) {

        if ($model->load(Yii::$app->request->post())) {

          $model->item_name="admin";
          $model->save();
          Yii::$app->getSession()->setFlash('success',
          "<span  style='font-weight: bold; font-size: 20px;'>
          تم تفعيل صلاحية الأدمن </span>");

            return $this->redirect(['create']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
      } else {
          return $this->redirect(['error']);
      }
    }

    public function actionRemove()
    {
        $model = new AuthAssignment();

          if (count($this->checkPermission()) > 0 ) {
        if ($model->load(Yii::$app->request->post())) {
          $user_id=$model->user_id;

            $connection   = \Yii::$app->db;
            $auth = $connection->createCommand('SELECT item_name
              from auth_assignment
                    where user_id= ' . $user_id)->queryAll();
                    if(count($auth)>0){
            $this->findModel($user_id)->delete();

            Yii::$app->getSession()->setFlash('success',
            "<span  style='font-weight: bold; font-size: 20px;'>
            تم إلغاء صلاحية الأدمن بنجاح</span>");

            return $this->redirect(['create']);
          }else{
              Yii::$app->getSession()->setFlash('error',
            "<span  style='font-weight: bold; font-size: 20px;'>
          عفوا لا يوجد صلاحية لهذا الموظف من قبل </span>");
            return $this->redirect(['create']);
          }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
      } else {
            return $this->redirect(['error']);
        }

    }

    /**
     * Updates an existing AuthAssignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionUpdate($item_name, $user_id)
    {
        $model = $this->findModel($item_name, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionDelete($item_name,$user_id)
    {
        $this->findModel($item_name, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param string $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id)
    {
        if (($model = AuthAssignment::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
