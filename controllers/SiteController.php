<?php
namespace app\controllers;

use Flyo\Api\SearchApi;
use Flyo\Api\SitemapApi;
use Flyo\Configuration;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionSitemap()
    {
        $api = (new SitemapApi(null, Configuration::getDefaultConfiguration()))->sitemap();

        return $this->render('sitemap', [
            'response' => $api,
        ]);
    }

    public function actionSearch($query = null)
    {
        if (!empty($query)) {
            $api = (new SearchApi(null, Configuration::getDefaultConfiguration()))->search($query);
        }
        
        return $this->render('search', [
            'response' => $api ?? false,
        ]);
    }
}