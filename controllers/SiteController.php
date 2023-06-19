<?php

namespace app\controllers;

use Flyo\Api\EntitiesApi;
use Flyo\Api\SearchApi;
use Flyo\Api\SitemapApi;
use Flyo\Configuration;
use Flyo\Yii\Traits\MetaDataTrait;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    use MetaDataTrait;

    public function actionSitemap(): string
    {
        $api = (new SitemapApi(null, Configuration::getDefaultConfiguration()))->sitemap();

        return $this->render('sitemap', [
            'response' => $api,
        ]);
    }

    public function actionSearch(string $query = null): string
    {
        if (!empty($query)) {
            $api = (new SearchApi(null, Configuration::getDefaultConfiguration()))->search($query);
        }

        return $this->render('search', [
            'response' => $api ?? false,
        ]);
    }

    public function actionEntityByUniqueid(string $uniqueid): string
    {
        $enity = (new EntitiesApi(null, Configuration::getDefaultConfiguration()))->entityByUniqueid($uniqueid);

        if (!$enity) {
            throw new NotFoundHttpException();
        }

        $this->registerEntity($enity);
        $this->registerMetricPixel($enity);

        return $this->render('entity', [
            'entity' => $enity,
        ]);
    }

    public function actionEntityBySlug(string $slug): string
    {
        $enity = (new EntitiesApi(null, Configuration::getDefaultConfiguration()))->entityBySlug($slug, 12345); // using typeId is absolut recommend

        if (!$enity) {
            throw new NotFoundHttpException();
        }

        $this->registerEntity($enity);
        $this->registerMetricPixel($enity);

        return $this->render('entity', [
            'entity' => $enity,
        ]);
    }
}
