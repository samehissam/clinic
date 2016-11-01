<?php

use yii\filters\AccessControl;

  //change  to allow user to login to access
  public function behaviors()
  {
    return [
    'access' => [
        'class' => AccessControl::className(),
        //'only' => ['logout', 'signup'],
        'rules' => [
            [
              'actions' => ['create', 'index', 'error', 'update', 'view', 'remove','delete','error', 'report', 'long-report'],
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

  //create new file call it "error.php" then paste the following htm

  /*
  <div class="error alert alert-danger fade in">
    <h1 class="text-center">نأسف !</h1
      <h2 class="text-center"> غير مسموح لك الدخول إلي هذه الصفحة الرجاء الرجوع إلي مدير المركز<h2>
  </div>
  */
    if (count($this->checkPermission()) > 0 ) {

  }else{
     return $this->redirect(['error']);
  }
