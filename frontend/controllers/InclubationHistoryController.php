<?php

namespace frontend\controllers;

use Yii;
use app\models\InclubationHistory;
use app\models\InventoryHistory;
use frontend\models\InclubationHistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InclubationHistoryController implements the CRUD actions for InclubationHistory model.
 */
class InclubationHistoryController extends Controller
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
     * Lists all InclubationHistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InclubationHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InclubationHistory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionReport()
    {

        $this->layout="reportLayout.php";
        return $this->render('report');
    }
    /**
     * Creates a new InclubationHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InclubationHistory();
        $inventory = new InventoryHistory();
        $connection   = \Yii::$app->db;
      if ($model->load(Yii::$app->request->post()) && $inventory->load(Yii::$app->request->post()) ) {

      // get incubation_stock_stock_id related to inventory_item_id
      // incubation_stock
      $stock_id = $connection->createCommand('SELECT stock_id from  incubation_stock
        where inventory_item_id= '. $inventory->inventory_item_id)->queryAll();

        // if item not added to the stock
        if (count($stock_id)>0) {

          $model->incubation_stock_stock_id=  $stock_id[0]['stock_id'];
        }else{
          Yii::$app->getSession()->setFlash('error',
           "<span  style='font-weight: bold; font-size: 20px;'>
           عفوا لم يتم تسجيل هذا الصنف من قبل بالمخزن من فضلك تاكد من تسجيله أولا </spn>  ");
           return $this->render('create', [ 'model' => $model,
             'inventory' => $inventory,
         ]);
        }

      // get the patient type
      $patient_type= $connection->createCommand('SELECT patient_type_patient_type_id
        from patient
        where patient_id= '.$model->patient_patient_id)->queryAll();

        // get sale_percentage related to patient_type
        $item_percentage=$connection->createCommand('SELECT  stock_item_price
          from stock_item_price
          where patient_type_patient_type_id= '
          .$patient_type[0]['patient_type_patient_type_id'])->queryAll();

        // check if this patient type item_percentage added before or not

        if (count($item_percentage)>0) {

          // set percentage  incubation_stock_stock_id
          //calc item cost
          // get item buy price from the inventory to calc the cost
          $buy_cost= $connection->createCommand('SELECT item_buyPrice from  inventory
            where item_id= '. $inventory->inventory_item_id)->queryAll();
          $percentage_cost= ($buy_cost[0]['item_buyPrice']*$item_percentage[0]['stock_item_price'])/100;
          $sale_cost=$buy_cost[0]['item_buyPrice']+$percentage_cost;
        $model->sale_price=$sale_cost;
        }else{
          // get patient type name and item name to send error message
          $type_name=$connection->createCommand('SELECT  patient_type_name
            from patient_type where patient_type_id= '
            .$patient_type[0]['patient_type_patient_type_id'])->queryAll();

          Yii::$app->getSession()->setFlash('error',
           "<span  style='font-weight: bold; font-size: 20px;'>
                 عفوا لم يتم تسجيل تكلفة "."</span> لهذه الجهة "
                 . "<span  style='font-weight: bold; font-size: 25px; color: red;'>".
                 $type_name[0]['patient_type_name']." </sapn>  ");
           return $this->render('create', [ 'model' => $model,
             'inventory' => $inventory,
         ]);
        }


      //check valid qty

      $getQty = $connection->createCommand("SELECT item_qty FROM incubation_stock
        where stock_id = " . $stock_id[0]['stock_id'] )->queryAll();
      if (count($getQty) > 0) {
         //check entered qty avaliable >= available qty
         if ($getQty[0]['item_qty'] >= $model->item_qty) {

             $newQty = $getQty[0]['item_qty'] - $model->item_qty;
             //update qty for each order product
             $update_qty = $connection->createCommand('UPDATE incubation_stock
               set item_qty= ' . $newQty . "   where stock_id = "
               . $stock_id[0]['stock_id']);
             $update_qty->execute();
               $model->save();
               Yii::$app->getSession()->setFlash('success',
               "<span  style='font-weight: bold; font-size: 20px;'>
                تم تسجيل خروخ المستلزمات الطبية بنجاح تقدر حضرتك تسجل خروج مستلزمات آخري</span>");

             return $this->redirect(['create']);
         } else {
             // if Available qty less than order

             Yii::$app->getSession()->setFlash('error', "<span  style='font-weight: bold;
              font-size: 20px;'>عفوا هذا الصنف الكمية المتاحه منه بالمخزن <span  style='font-weight: bold; font-size: 25px; color: red;'>
              " . $getQty[0]['item_qty'] . " </span> و أنته تريد خروج "
              . "<span  style='font-weight: bold; font-size: 25px; color: red;'>"
               . $model->item_qty . "</span> </span>");


             return $this->render('create', [ 'model' => $model,
               'inventory' => $inventory,
           ]);
        }
      }}
      else {
            return $this->render('create', [
                'model' => $model,
                'inventory' => $inventory,
            ]);
        }
      }

    /**
     * Updates an existing InclubationHistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->stock_history_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InclubationHistory model.
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
     * Finds the InclubationHistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InclubationHistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InclubationHistory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
