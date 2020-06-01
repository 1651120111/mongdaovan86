<?php

namespace modava\location\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\location\LocationModule;
use modava\location\models\table\LocationCountryTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "location_country".
 *
 * @property int $id
 * @property string $CountryCode
 * @property string $CommonName
 * @property string $slug
 * @property string $FormalName
 * @property string $CountryType
 * @property string $CountrySubType
 * @property string $Sovereignty
 * @property string $Capital
 * @property string $CurrencyCode
 * @property string $CurrencyName
 * @property string $TelephoneCode
 * @property string $CountryCode3
 * @property string $CountryNumber
 * @property string $InternetCountryCode
 * @property int $SortOrder
 * @property int $status
 * @property string $language Language
 * @property string $Flags
 * @property int $IsDeleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property LocationProvince[] $locationProvinces
 */
class LocationCountry extends LocationCountryTable
{
    public $toastr_key = 'location-country';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => BlameableBehavior::class,
                    'createdByAttribute' => 'created_by',
                    'updatedByAttribute' => 'updated_by',
                ],
                [
                    'class' => SluggableBehavior::class,
                    'ensureUnique' => true,
                    'value' => function () {
                        return MyHelper::createAlias($this->CommonName);
                    }
                ],
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
                    'preserveNonEmptyValues' => true,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
            ]
        );
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SortOrder', 'status', 'IsDeleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['language'], 'string'],
            [['CountryCode', 'CommonName', 'slug', 'FormalName', 'CountryType', 'CountrySubType', 'Sovereignty', 'Capital', 'CurrencyCode', 'CurrencyName', 'TelephoneCode', 'CountryCode3', 'CountryNumber', 'InternetCountryCode', 'Flags'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => LocationModule::t('location', 'ID'),
            'CountryCode' => LocationModule::t('location', 'Country Code'),
            'CommonName' => LocationModule::t('location', 'Common Name'),
            'slug' => LocationModule::t('location', 'Slug'),
            'FormalName' => LocationModule::t('location', 'Formal Name'),
            'CountryType' => LocationModule::t('location', 'Country Type'),
            'CountrySubType' => LocationModule::t('location', 'Country Sub Type'),
            'Sovereignty' => LocationModule::t('location', 'Sovereignty'),
            'Capital' => LocationModule::t('location', 'Capital'),
            'CurrencyCode' => LocationModule::t('location', 'Currency Code'),
            'CurrencyName' => LocationModule::t('location', 'Currency Name'),
            'TelephoneCode' => LocationModule::t('location', 'Telephone Code'),
            'CountryCode3' => LocationModule::t('location', 'Country Code3'),
            'CountryNumber' => LocationModule::t('location', 'Country Number'),
            'InternetCountryCode' => LocationModule::t('location', 'Internet Country Code'),
            'SortOrder' => LocationModule::t('location', 'Sort Order'),
            'status' => LocationModule::t('location', 'Status'),
            'language' => LocationModule::t('location', 'Language'),
            'Flags' => LocationModule::t('location', 'Flags'),
            'IsDeleted' => LocationModule::t('location', 'Is Deleted'),
            'created_at' => LocationModule::t('location', 'Created At'),
            'updated_at' => LocationModule::t('location', 'Updated At'),
            'created_by' => LocationModule::t('location', 'Created By'),
            'updated_by' => LocationModule::t('location', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCreated()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserUpdated()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}
