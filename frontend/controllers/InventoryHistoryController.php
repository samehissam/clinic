<?php

namespace frontend\controllers;

use Yii;
use app\models\InventoryHistory;
use app\models\IncubationStock;
use app\models\IndoorStock;
use frontend\models\InventoryHistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InventoryHistoryController implements the CRUD actions for InventoryHistory model.
 */
class InventoryHistoryController extends Controller
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
     * Lists all InventoryHistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InventoryHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InventoryHistory model.
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
        return $this->render('report');
    }
    /**
     * Creates a new InventoryHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InventoryHistory();
        $incubationStock=new IncubationStock();
        $indoorStock=new IndoorStock();
        $connection   = \Yii::$app->db;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          // check before add to any stock if the entered qty available in
          // the inventory if not send back message
          // else if available sub it from the item inventory qty
          $availableQty = $connection->createCommand('SELECT item_qty
            from inventory
            where item_id= '. $model->inventory_item_id)->queryAll();
            if(count($availableQty)>0){
              //check entered qty avaliable >= available qty
              if ($availableQty[0]['item_qty'] >= $model->item_qty) {


          $stock=$model->stock_type_stock_id;
          if($stock==1){

            $item_qty = $connection->createCommand('SELECT item_qty from incubation_stock
              where inventory_item_id= '. $model->inventory_item_id)->queryAll();
              if(count($item_qty)>0){
              $newQty=$item_qty[0]['item_qty']+$model->item_qty;

              //update item qty
             $update_Qty = $connection->createCommand('UPDATE incubation_stock set item_qty= ' . $newQty
             . ' where inventory_item_id= '. $model->inventory_item_id);
             $subQty = $availableQty[0]['item_qty'] - $model->item_qty;
             //update qty for each order product
             $set_qty = $connection->createCommand('UPDATE inventory
               set item_qty= ' . $subQty . "   where item_id = ". $model->inventory_item_id);
             $set_qty->execute();
             $update_Qty->execute();
           }else{
             $incubationStock->inventory_item_id=$model->inventory_item_id;
             $incubationStock->item_qty=$model->item_qty;
             $subQty = $availableQty[0]['item_qty'] - $model->item_qty;
             //update qty for each order product
             $set_qty = $connection->createCommand('UPDATE inventory
               set item_qty= ' . $subQty . "   where item_id = ". $model->inventory_item_id);
             $set_qty->execute();
             $incubationStock->save();
           }
         }elseif ($stock==2) {
           $indoor_qty = $connection->createCommand('SELECT item_qty from indoor_stock
             where inventory_item_id= '. $model->inventory_item_id)->queryAll();
             if(count($indoor_qty)>0){
             $newQty=$indoor_qty[0]['item_qty']+$model->item_qty;

             //update item qty
            $update_Qty = $connection->createCommand('UPDATE indoor_stock set item_qty= ' . $newQty
            . ' where inventory_item_id= '. $model->inventory_item_id);
            $subQty = $availableQty[0]['item_qty'] - $model->item_qty;
            //update qty for each order product
            $set_qty = $connection->createCommand('UPDATE inventory
              set item_qty= ' . $subQty . "   where item_id = ". $model->inventory_item_id);
            $set_qty->execute();
            $update_Qty->execute();
          }else{
            $indoorStock->inventory_item_id=$model->inventory_item_id;
            $indoorStock->item_qty=$model->item_qty;
            $subQty = $availableQty[0]['item_qty'] - $model->item_qty;
            //update qty for each order product
            $set_qty = $connection->createCommand('UPDATE inventory
              set item_qty= ' . $subQty . "   where item_id = ". $model->inventory_item_id);
            $set_qty->execute();
            $indoorStock->save();
          }
         }

           Yii::$app->getSession()->setFlash('success',
           "<span  style='font-weight: bold; font-size: 20px;'>
            تم تسجيل خروخ المستلزمات الطبية بنجاح تقدر حضرتك تسجل خروج مستلزمات آخري</span>");

       return $this->redirect(['create']);
       }
     else{
       // if Available qty less than order

       Yii::$app->getSession()->setFlash('error', "<span  style='font-weight: bold;
        font-size: 20px;'>عفوا هذا الصنف الكمية المتاحه منه بالمخزن <span  style='font-weight: bold; font-size: 25px; color: red;'>
        " . $availableQty[0]['item_qty'] . " </span> و أنته تريد خروج "
        . "<span  style='font-weight: bold; font-size: 25px; color: red;'>"
         . $model->item_qty . "</span> </span>");


       return $this->render('create', [ 'model' => $model,

     ]);
     }
}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InventoryHistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->inventory_history_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InventoryHistory model.
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
     * Finds the InventoryHistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InventoryHistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InventoryHistory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
