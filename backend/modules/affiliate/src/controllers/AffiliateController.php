<?php

namespace modava\affiliate\controllers;

use modava\affiliate\AffiliateModule;
use modava\affiliate\helpers\MyAurisApi;
use Yii;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use yii\web\Response;

class AffiliateController extends \backend\components\MyController
{
    public function actionIndex()
    {
        $apiParam = \Yii::$app->getModule('affiliate')->params['myauris_config'];

        $page = (int) \Yii::$app->request->get('page');
        $page = $page > 0 ? $page : 1;

        // Get Customer Data
        $clinicSearch = \Yii::$app->request->get('ClinicSearch');
        $payload = [
            'page' => $page,
            'ClinicSearch[appointment_time_from_lich_dieu_tri]' => isset($clinicSearch['appointment_time_from_lich_dieu_tri']) ? $clinicSearch['appointment_time_from_lich_dieu_tri'] : null,
            'ClinicSearch[appointment_time_to_lich_dieu_tri]' => isset($clinicSearch['appointment_time_to_lich_dieu_tri']) ? $clinicSearch['appointment_time_to_lich_dieu_tri'] : null,
            'ClinicSearch[nguon_online]' => isset($clinicSearch['nguon_online']) ? $clinicSearch['nguon_online'] : null,
            'ClinicSearch[directsale]' => isset($clinicSearch['directsale']) ? $clinicSearch['directsale'] : null,
            'ClinicSearch[customer_come_time_to]' => isset($clinicSearch['customer_come_time_to']) ? $clinicSearch['customer_come_time_to'] : null,
            'ClinicSearch[creation_time_from]' => isset($clinicSearch['creation_time_from']) ? $clinicSearch['creation_time_from'] : null,
            'ClinicSearch[appointment_time_from]' => isset($clinicSearch['appointment_time_from']) ? $clinicSearch['appointment_time_from'] : null,
            'ClinicSearch[appointment_time_to]' => isset($clinicSearch['appointment_time_to']) ? $clinicSearch['appointment_time_to'] : null,
            'ClinicSearch[creation_time_to]' => isset($clinicSearch['creation_time_to']) ? $clinicSearch['creation_time_to'] : null,
            'ClinicSearch[co_so]' => isset($clinicSearch['co_so']) ? $clinicSearch['co_so'] : null,
            'ClinicSearch[permission_user]' => isset($clinicSearch['permission_user']) ? $clinicSearch['permission_user'] : null,
            'ClinicSearch[thao_tac]' => isset($clinicSearch['thao_tac']) ? $clinicSearch['thao_tac'] : null,
            'ClinicSearch[keyword]' => isset($clinicSearch['keyword']) ? $clinicSearch['keyword'] : null,
            'ClinicSearch[last_dieu_tri]' => isset($clinicSearch['last_dieu_tri']) && in_array($clinicSearch['last_dieu_tri'], ['1', 'on']) ? 1 : 0,
        ];

        $response = MyAurisApi::getCompleteCustomerService($payload);
        $realResponse = json_decode($response['result'], true);

        // Get List Thao Tac
        $listThaoTac = MyAurisApi::getListThaoTac();

        if (!$realResponse || (isset($realResponse['status']) && $realResponse['status'] == 500)) {
            if (isset($realResponse['status']) && $realResponse['status'] == 500) {
                Yii::warning($response['result']);
            }
            Yii::$app->session->setFlash('toastr-affiliate-list', [
                'title' => 'Thông báo',
                'text' => 'Đã có lỗi kết nối!',
                'type' => 'warning'
            ]);
            $dataProvider = new ArrayDataProvider([
                'allModels' => [],
                'pagination' => [
                    'pageSize' => $apiParam['row_per_page'],
                ]
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'listThaotac' => $listThaoTac,
                'payload' => $payload,
            ]);
        }

        $data = $realResponse['data'];

        /*
         * Mô tả các case:
         * 1. Dữ liệu có 99 dòng, per-page = 10
         * page = 1: index từ 0 -> 9
         * page = 2: index từ 10 -> 19
         * page = 0, -1, abd: => page = 1
         * */
        // Fill fake data to use Array Data Provider for Grid View Pagination
        $fakeData = array_fill(0, $realResponse['totalCount'], null);
        $pageForFakeData = $page - 1;
        foreach ($data as $rowIndex => $row) {
            $index = $pageForFakeData * $apiParam['row_per_page'] + $rowIndex;
            $fakeData[$index] = $row;
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $fakeData,
            'pagination' => [
                'pageSize' => $apiParam['row_per_page'],
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'listThaotac' => $listThaoTac,
            'payload' => $payload,
        ]);
    }

    public function actionClearCache()
    {
        $cache = Yii::$app->cache;

        if ($cache->exists(MyAurisApi::$CACHE_MANAGE_KEY)) {
            $keys = $cache->get(MyAurisApi::$CACHE_MANAGE_KEY);
            foreach ($keys as $key) {
                $cache->delete($key);
            }

            $cache->delete(MyAurisApi::$CACHE_MANAGE_KEY);
        }

        Yii::$app->session->setFlash('toastr-affiliate-list', [
            'title' => AffiliateModule::t('affiliate', 'Notification'),
            'text' => AffiliateModule::t('affiliate', 'Delete cache successfully'),
            'type' => 'success'
        ]);

        return $this->redirect(Yii::$app->request->referrer ?: Url::toRoute(['index']));
    }
}
