<?php

namespace frontend\controllers;

use Yii;
use app\models\EmpLoanBack;
use frontend\models\EmpLoanBackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpLoanBackController implements the CRUD actions for EmpLoanBack model.
 */
class EmpLoanBackController extends Controller
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
     * Lists all EmpLoanBack models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpLoanBackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmpLoanBack model.
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
     * Creates a new EmpLoanBack model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmpLoanBack();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          // sub the loan moeny from the loan cost
          $connection   = \Yii::$app->db;
          $loan = $connection->createCommand('SELECT loan_cost from employe_loan
            where employe_employe_id= '. $model->employe_employe_id)->queryAll();
            if(count($loan)>0){
            $newLoan=$loan[0]['loan_cost']-$model->loan_back_cost;

            //update item qty
           $update_loan = $connection->createCommand('UPDATE employe_loan set loan_cost= ' . $newLoan
           . '  where employe_employe_id= '  . $model->employe_employe_id);
           $update_loan->execute();
           Yii::$app->getSession()->setFlash('success',
            "<span  style='font-weight: bold; font-size: 20px;'>تم خصم المبلغ من السلفة والقيمة المتبقية
      " . "<span  style='font-weight: bold; font-size: 25px; color: red;'>" . $newLoan . "</span>");
           return $this->redirect(['create']);
         }
                  } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EmpLoanBack model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->loan_back_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmpLoanBack model.
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
     * Finds the EmpLoanBack model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmpLoanBack the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmpLoanBack::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
