<?php

namespace app\controllers;

use app\models\SignupForm;
use app\models\StudentForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup', 'add-student', 'view-student', 'update-student', 'delete-student'],
                'rules' => [
                    [
                        'actions' => ['logout', 'add-student', 'view-student', 'update-student', 'delete-student'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }

        $data_provider = new ActiveDataProvider([
            'query' => StudentForm::find()->andWhere(['created_by' => Yii::$app->user->identity->id]),
            'pagination' => [
                'pageSize' => 3
            ],
            'sort' => [
                'defaultOrder' => ['created_at' => SORT_DESC]
            ]
        ]);
        return $this->render('index', ['data_provider' => $data_provider]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm;

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'User registered successfully');
            return $this->redirect(['login']);
        }

        return $this->render('signup', ['model' => $model]);
    }

    public function actionAddStudent()
    {
        $model = new StudentForm;

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->student_img = UploadedFile::getInstance($model, 'student_img');
                if ($model->validate()) {
                    if ($model->addStudent()) {
                        Yii::$app->session->addFlash('success', 'Student successfully added.');
                        return $this->redirect(['index']);
                    }
                }
            }
        }
        return $this->render('addStudent', ['model' => $model]);
    }

    public function actionViewStudent($id)
    {
        $student = StudentForm::findOne(['id' => $id]);
        if (Yii::$app->user->identity->id !== $student->created_by) {
            throw new ForbiddenHttpException('You don\'t have permission');
        }
        return $this->render('viewStudent', ['model' => $student]);
    }

    public function actionUpdateStudent($id)
    {
        $student = StudentForm::findOne(['id' => $id]);
        if (Yii::$app->user->identity->id !== $student->created_by) {
            throw new ForbiddenHttpException('You don\'t have permission');
        }
        if (Yii::$app->request->isPost) {
            if ($student->load(Yii::$app->request->post())) {
                if ($student->remove_image) {
                    $student->student_img = 'removed';
                }
                if (UploadedFile::getInstance($student, 'student_img')) {
                    $student->student_img = UploadedFile::getInstance($student, 'student_img');
                }
                if ($student->validate()) {
                    if ($student->updateStudent($id)) {
                        Yii::$app->session->addFlash('success', 'Student successfully updated.');
                        return $this->redirect(['index']);
                    }
                }
            }
        }

        return $this->render('updateStudent', ['model' => $student]);
    }

    public function actionDeleteStudent($id)
    {
        $student = StudentForm::findOne(['id' => $id]);
        if (Yii::$app->user->identity->id !== $student->created_by) {
            throw new ForbiddenHttpException('You don\'t have permission');
        }
        if ($student->delete()) {
            return $this->redirect(['index']);
        }
    }
}
