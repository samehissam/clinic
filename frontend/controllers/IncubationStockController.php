<?php

namespace frontend\controllers;

use Yii;
use app\models\IncubationStock;
use frontend\models\IncubationStockSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IncubationStockController implements the CRUD actions for IncubationStock model.
 */
class IncubationStockController extends Controller
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
     * Lists all IncubationStock models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IncubationStockSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IncubationStock model.
     * @param integer $stock_id
     * @param integer $inventory_item_id
     * @return mixed
     */
    public function actionView($stock_id, $inventory_item_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($stock_id, $inventory_item_id),
        ]);
    }

    /**
     * Creates a new IncubationStock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IncubationStock();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'stock_id' => $model->stock_id, 'inventory_item_id' => $model->inventory_item_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IncubationStock model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $stock_id
     * @param integer $inventory_item_id
     * @return mixed
     */
    public function actionUpdate($stock_id, $inventory_item_id)
    {
        $model = $this->findModel($stock_id, $inventory_item_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'stock_id' => $model->stock_id, 'inventory_item_id' => $model->inventory_item_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IncubationStock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $stock_id
     * @param integer $inventory_item_id
     * @return mixed
     */
    public function actionDelete($stock_id, $inventory_item_id)
    {
        $this->findModel($stock_id, $inventory_item_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IncubationStock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $stock_id
     * @param integer $inventory_item_id
     * @return IncubationStock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($stock_id, $inventory_item_id)
    {
        if (($model = IncubationStock::findOne(['stock_id' => $stock_id, 'inventory_item_id' => $inventory_item_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
