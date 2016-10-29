<?php

namespace frontend\controllers;

use Yii;
use app\models\Attendance;
use frontend\models\AttendanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * AttendanceController implements the CRUD actions for Attendance model.
 */
class AttendanceController extends Controller
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
     * Lists all Attendance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttendanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attendance model.
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
     * Creates a new Attendance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attendance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->attend_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionAdd()
    {
        $model = new Attendance();
        if ($model->load(Yii::$app->request->post())) {
        $model->file=\yii\web\UploadedFile::getInstance($model,'file');
        $imagePath='uploads/sheet'.'.'.$model->file->extension;
            $model->file->saveAs($imagePath);

            $attend1=new Attendance();
            $attend1->deleteAll();

              $input=$imagePath;
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
                  // to scap the headers of the excel sheet like code state...
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

            return $this->render('add', [
                'model' => $model,
            ]);


        }else{
          return $this->render('add', [
              'model' => $model,
          ]);
        }

    }
    public function actionAddAttendance()
    {
        $model = new Attendance();
         if ($model->load(Yii::$app->request->post())) {
          $model->file=\yii\web\UploadedFile::getInstance($model,'file');
          $imagePath='uploads/sheet'.'.'.$model->file->extension;
              $model->file->saveAs($imagePath);
              if(  $model->file->saveAs($imagePath)){
              $attend1=new Attendance();
              $attend1->deleteAll();

                $input=$imagePath;
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
                return $this->redirect(['add-attendance']);


        }else{
            return $this->render('add-attendance', [
                'model' => $model,
            ]);
          }

        }  else{
            return $this->render('add-attendance', [
                'model' => $model,
            ]);
          }

    }

    /**
     * Updates an existing Attendance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->attend_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Deletes an existing Attendance model.
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
     * Finds the Attendance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Attendance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attendance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
