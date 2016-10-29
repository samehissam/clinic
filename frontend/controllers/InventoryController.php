<?php

namespace frontend\controllers;

use Yii;
use app\models\Inventory;
use app\models\StockItemPrice;
use frontend\models\Model;
use frontend\models\InventorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InventoryController implements the CRUD actions for Inventory model.
 */
class InventoryController extends Controller
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
     * Lists all Inventory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InventorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport()
    {
        return $this->render('report');
    }

    /**
     * Displays a single Inventory model.
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
     * Creates a new Inventory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inventory();


        if ($model->load(Yii::$app->request->post())&&$model->save()) {
            //$model->date = date('Y/m/d');
            // ;
            //
            // $itemPrice = Model::createMultiple(StockItemPrice::classname());
            // Model::loadMultiple($itemPrice, Yii::$app->request->post());
            //
            //
            // // validate all models
            // $valid = $model->validate();
            // $valid = Model::validateMultiple($itemPrice) && $valid;
            //
            // if ($valid) {
            //     $transaction = \Yii::$app->db->beginTransaction();
            //     try {
            //
            //         if ($flag = $model->save(false)) {
            //             foreach ($itemPrice as $itemPrice) {
            //               $itemPrice->inventory_item_id=1;
            //                 if (!($flag = $itemPrice->save(false))) {
            //
            //                     $transaction->rollBack();
            //                     break;
            //                 }
            //             }
            //
            //         }
            //
            //         if ($flag) {
            //             $transaction->commit();
            //
            //         }
            //     } catch (Exception $e) {
            //         $transaction->rollBack();
            //     }
            //
            // }
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

              //  'itemPrice' => (empty($itemPrice)) ? [new StockItemPrice] : $itemPrice,
            ]);
        }

   }

   public function actionAdd()
   {
       $model = new Inventory();
       $connection   = \Yii::$app->db;
       if ($model->load(Yii::$app->request->post())) {
          $item_qty = $connection->createCommand('SELECT item_qty from inventory
            where item_id= '. $model->item_name)->queryAll();
            $newQty=$item_qty[0]['item_qty']+$model->item_qty;

            //update item qty
           $update_Qty = $connection->createCommand('UPDATE inventory set item_qty= ' . $newQty
           . '  where item_id= '  . $model->item_name);
           $update_Qty->execute();


           return $this->redirect(['add']);
       } else {
           return $this->render('add', [
               'model' => $model,
           ]);
       }
   }
    /**
     * Updates an existing Inventory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->item_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inventory model.
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
     * Finds the Inventory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inventory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inventory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
