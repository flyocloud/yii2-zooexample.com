<?php
namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionSitemap()
    {
        return $this->render('sitemap');
    }
}