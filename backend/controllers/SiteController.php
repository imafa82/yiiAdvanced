<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Country;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'about', 'contact', 'say', 'entry', 'dati'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    public function actionSay($target = "World")
    {
      return $this->render ('say', ['target'=> $target] );
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionEntry()
    {
      //Istanzio un nuovo model un oggetto di classe EntryForm derivato da model
      $model = new EntryForm();

      // se i dati sono stati postati... fai qualcosa

        if($model->load(Yii::$app->request->post())
            // il metodo ci consente di validare tutti i dati presenti nella form ovvero Yii::$app->request->post()
            && $model->validate()
          ){
            //in questa pagina ci sarà il risultato dell'elaborazione dei dati della form
              return $this->render('entry-confirm', ['model' => $model]);
            }

      //altrimenti carica la view della form
        else {
          //In questa pagina ci sarà la form iniziale
          return $this->render('entry', ['model' => $model]);
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout ="login"; // se c'è un altro layout
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionDati(){

      //interrogazione al DB:chiamo il metodo getNazioniCount
      $nazioni = new Country();
      $n_nazioni = $nazioni->getNazioniCount();
      $n_citta = $nazioni->getCittaCount();

      return $this->render('dati',
                  ['n_nazioni' => $n_nazioni,
                    'n_citta' => $n_citta,
                ]);
    }
}
