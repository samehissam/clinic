<?php

namespace frontend\controllers;

use Yii;
use app\models\Employe;
use app\models\Attendance;
use frontend\models\EmployeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeController implements the CRUD actions for Employe model.
 */
class EmployeController extends Controller
{
  //**************************TO Get the first and last day for a month *******************
    // SELECT LAST_DAY(NOW() - INTERVAL 1 MONTH) + INTERVAL 1 DAY;
    // SELECT LAST_DAY(NOW())
    //*******************************************************************
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
     * Lists all Employe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionReport()
    {
        $this->layout="reportLayout.php";
        return $this->render('report');
    }
    public function actionSalaryReport()
    {
        $this->layout="reportLayout.php";
        return $this->render('salary-report');
    }

    /**
     * Displays a single Employe model.
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
     * Creates a new Employe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->employe_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionImportExcel(){
      $attend1=new Attendance();
      $attend1->deleteAll();

        $input='uploads/sheet.xlsx';
        try {
        $inputFileType= \PHPExcel_IOFactory::identify($input);
         $objReader=\PHPExcel_IOFactory::createReader($inputFileType);

          $objectPHPExcel=\PHPExcel_IOFactory::load($input);

        } catch (Exception $e) {
          die('error');
        }
        $sheet=$objectPHPExcel->getSheet(0);
        $highestRow=$sheet->getHighestRow();
        $highestColumn=$sheet->getHighestColumn();

        for ($row=1; $row <=$highestRow ; $row++) {
          $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,Null,TRUE,FALSE);
          if ($row==1) {

            continue;
          }
              $attend=new Attendance();
              $attend->name=$rowData[0][0];
              $attend->emp_code=$rowData[0][1];
                $newDate = \PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][2], 'yyyy-mm-dd H:i:s');

          $attend->attend_time=$newDate;
              $attend->save();

          //   echo $newDate;

        }


        // $originalDate =()->getFormattedValue();
        // $newDate = date("Y-m-d H:i:s", strtotime($originalDate));
        // echo $originalDate;;

        die('donne');


    }

    /**
     * Updates an existing Employe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->employe_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Employe model.
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
     * Finds the Employe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
