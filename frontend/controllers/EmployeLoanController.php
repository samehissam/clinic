<?php

namespace frontend\controllers;

use Yii;
use app\models\EmployeLoan;
use frontend\models\EmployeLoanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeLoanController implements the CRUD actions for EmployeLoan model.
 */
class EmployeLoanController extends Controller
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
     * Lists all EmployeLoan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeLoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeLoan model.
     * @param integer $loan_id
     * @param integer $employe_employe_id
     * @return mixed
     */
    public function actionView($loan_id, $employe_employe_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($loan_id, $employe_employe_id),
        ]);
    }

    /**
     * Creates a new EmployeLoan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployeLoan();

        if ($model->load(Yii::$app->request->post()) ) {

            //check if emp has loan before if yes update it else save it as new
                 $connection   = \Yii::$app->db;
                 $loan = $connection->createCommand('SELECT loan_cost from employe_loan
                   where employe_employe_id= '. $model->employe_employe_id)->queryAll();
                   if(count($loan)>0){
                   $newLoan=$loan[0]['loan_cost']+$model->loan_cost;

                   //update item qty
                  $update_loan = $connection->createCommand('UPDATE employe_loan set loan_cost= ' . $newLoan
                  . '  where employe_employe_id= '  . $model->employe_employe_id);
                  $update_loan->execute();
                  Yii::$app->getSession()->setFlash('success',
                   "<span  style='font-weight: bold; font-size: 20px;'>
                   تم إضافة السلفة بنجاح وتبلغ قيمة السلفة لهذا الموظف" . "<span  style='font-weight: bold; font-size: 25px; color: red;'>" . $newLoan . "</span>");
                  return $this->redirect(['create']);
                }else{
                  $model->save();
                  Yii::$app->getSession()->setFlash('success',
                   "<span  style='font-weight: bold; font-size: 20px;'>
                   تم إضافة السلفة بنجاح وتبلغ قيمة السلفة لهذا الموظف" .
                   "<span  style='font-weight: bold; font-size: 25px; color: red;'>" . $model->loan_cost . "</span>");
                     return $this->redirect(['create']);

                }

          //&&


        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EmployeLoan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $loan_id
     * @param integer $employe_employe_id
     * @return mixed
     */
    public function actionUpdate($loan_id, $employe_employe_id)
    {
        $model = $this->findModel($loan_id, $employe_employe_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'loan_id' => $model->loan_id, 'employe_employe_id' => $model->employe_employe_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmployeLoan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $loan_id
     * @param integer $employe_employe_id
     * @return mixed
     */
    public function actionDelete($loan_id, $employe_employe_id)
    {
        $this->findModel($loan_id, $employe_employe_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EmployeLoan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $loan_id
     * @param integer $employe_employe_id
     * @return EmployeLoan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($loan_id, $employe_employe_id)
    {
        if (($model = EmployeLoan::findOne(['loan_id' => $loan_id, 'employe_employe_id' => $employe_employe_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
