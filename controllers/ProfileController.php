<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProfileController extends Controller
{


    public function init()
    {
        $this->layout = "admin";
        parent::init();
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('site/login');
        }elseif (Yii::$app->user->identity->type != User::SUPER_ADMIN) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

    }

    /**
     * Lists all Area models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Info();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user=Users::findOne(Yii::$app->user->identity->id);
            $user->name=$model->name;
            $user->phone=$model->phone;
            $user->username=$model->username;
            $user->email=$model->email;
            $file = UploadedFile::getInstance($model, 'avatar');
            if (!is_null($file)) {
                $folder_path = "uploads/avatar/$user->id";
                FileHelper::createDirectory($folder_path, $mode = 0775, $recursive = true);
                $avatar = "$folder_path/index" . "." . $file->extension;
                $user->avatar = $avatar;
                $file->saveAs($avatar);
            }

            $user->save(false);
            Yii::$app->session->set('message', Yii::t('app', 'Succ_Mess_Pass'));
            return $this->render('index', ['model' => $model]);
        }

        return $this->render('index',['model'=>$model]);
    }


    /**
     * Lists all Area models.
     * @return mixed
     */
    public function actionChangePassword()
    {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user=Users::findOne(Yii::$app->user->identity->id);
            $user->password_hash= Yii::$app->security->generatePasswordHash($model->new_password);
            $user->save(false);
            Yii::$app->session->set('message', Yii::t('app', 'Succ_Mess_Pass'));
            return $this->render('index', ['model' => $model]);
        }

        return $this->render('index',['model'=>$model]);
    }
}