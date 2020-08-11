<?php

namespace modava\faq\models;

use common\models\User;
use modava\faq\FaqModule;
use modava\faq\models\table\FaqCategoryTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use common\helpers\MyHelper;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "faq_faq_category".
*
    * @property int $id
    * @property string $title
    * @property string $slug
    * @property int $status 0: Không hiển thị, 1: Hiển thị
    * @property string $description Mô tả
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property FaqFaq[] $faqFaqs
            * @property User $createdBy
            * @property User $updatedBy
    */
class FaqCategory extends FaqCategoryTable
{
    public $toastr_key = 'faq-category';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'slug' => [
                    'class' => SluggableBehavior::class,
                    'immutable' => false,
                    'ensureUnique' => true,
                    'value' => function () {
                        return MyHelper::createAlias($this->title);
                    }
                ],
                [
                    'class' => BlameableBehavior::class,
                    'createdByAttribute' => 'created_by',
                    'updatedByAttribute' => 'updated_by',
                ],
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
                    'preserveNonEmptyValues' => false,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['title', ], 'required'],
			[['status',], 'integer'],
			[['description'], 'string'],
			[['title', 'slug'], 'string', 'max' => 255],
			[['slug'], 'unique'],
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
            'id' => FaqModule::t('faq', 'ID'),
            'title' => FaqModule::t('faq', 'Title'),
            'slug' => FaqModule::t('faq', 'Slug'),
            'status' => FaqModule::t('faq', 'Status'),
            'description' => FaqModule::t('faq', 'Description'),
            'created_at' => FaqModule::t('faq', 'Created At'),
            'updated_at' => FaqModule::t('faq', 'Updated At'),
            'created_by' => FaqModule::t('faq', 'Created By'),
            'updated_by' => FaqModule::t('faq', 'Updated By'),
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
