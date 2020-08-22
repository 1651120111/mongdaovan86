<?php

namespace modava\log\models\search;

use GuzzleHttp\Client;
use modava\log\LogModule;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use modava\website\models\KeyValue;

class Voip24hLogSearch extends Model
{
    const STATUS = [
        'MISSED' => 'MISSED',
        'ANSWERED' => 'ANSWERED',
        'NO ANSWER' => 'NO ANSWER',
        'FAILED' => 'FAILED',
        'BUSY' => 'BUSY',
    ];
    private $url = 'http://dial.voip24h.vn/dial/search';
    private $voip;
    private $secret;
    private $next;
    private $prev;
    public $dataProvider;
    public $display = 25;
    public $total = 0;
    public $from;
    public $to;
    public $start;
    public $search;
    public $status;

    /**
     * @return \Exception|void
     */
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        if (!class_exists('\modava\website\models\KeyValue')) return new \Exception('Class modava\website\models\KeyValue not found!', 404);
        $this->voip = KeyValue::getValueByKey('VOIP24H_KEY');
        $this->secret = KeyValue::getValueByKey('VOIP24H_SECRET');
    }

    public function rules()
    {
        return [
            [['search', 'status'], 'string', 'max' => 20],
            [['from', 'to', 'start', 'data'], 'safe'],
            [['from', 'to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'search' => LogModule::t('log', 'Phone'),
            'from' => LogModule::t('log', 'From Date'),
            'to' => LogModule::t('log', 'To Date'),
            'status' => LogModule::t('log', 'Status Call'),
        ];
    }

    /**
     * @param $params
     * @return ArrayDataProvider
     */
    public function search($params)
    {
        $this->load($params);
        if ($this->to == null) $this->to = date('d-m-Y');
        if ($this->from == null) $this->from = $this->to;
        $data = $this->getData($this->from . ' 00:00:00', $this->to . ' 23:59:59');
        if ($data == null) return new ArrayDataProvider([
            'allModels' => [],
            'pagination' => [
                'pageSize' => 0
            ]
        ]);
        $pageSize = $this->display;
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => $pageSize
            ]
        ]);
        return $dataProvider;
    }

    /**
     * @return string
     */
    public function getPrevPage()
    {
        if ($this->prev == null) return Html::tag('li', Html::tag('span', 'Prev', []), [
            'class' => 'paginate_button page-item disabled page-disabled'
        ]);
        return Html::tag('li', Html::a('Prev', 'javascript:;', [
            'class' => 'page-link',
            'data-start' => $this->prev
        ]), [
            'class' => 'page-item'
        ]);
    }

    /**
     * @return string
     */
    public function getNextPage()
    {
        if ($this->next == null) return Html::tag('li', Html::tag('span', 'Next', []), [
            'class' => 'paginate_button page-item disabled page-disabled'
        ]);
        return Html::tag('li', Html::a('Next', 'javascript:;', [
            'class' => 'page-link',
            'data-start' => $this->next
        ]), [
            'class' => 'page-item'
        ]);
    }

    /**
     * @param string|null $from
     * @param string|null $to
     * @return array|null
     */
    private function getData(string $from = null, string $to = null)
    {
        if ($this->voip == null || $this->secret == null) return null;
        $query = [
            'voip' => $this->voip,
            'secret' => $this->secret,
            'date_start' => strtotime($from),
            'date_end' => strtotime($to)
        ];
        if ($this->start != null) $query['start'] = $this->start;
        if ($this->search != null) $query['search'] = $this->search;
        if ($this->status != null) $query['status'] = $this->status;
        $client = new Client();
        $response = $client->get($this->url, [
            'query' => $query
        ]);
        if ($response->getStatusCode() != 200) return null;
        $data = json_decode($response->getBody());
        if ($data->status != 200) return null;
        $this->total = $data->result->recordsTotalAll;
        $this->display = $data->result->recordsDisplay;
        $this->next = isset($data->result->next) ? $data->result->next : null;
        $this->prev = isset($data->result->prev) ? $data->result->prev : null;
        return is_array($data->result->data) ? $data->result->data : [];
    }
}