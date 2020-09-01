<?php

namespace modava\article\models;

use common\models\User;
use modava\article\ArticleModule;
use modava\article\models\table\ActicleCategoryTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use common\helpers\MyHelper;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "article_category".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int|null $parent_id
 * @property string|null $image
 * @property string|null $description
 * @property int|null $position
 * @property string|null $ads_pixel
 * @property string|null $ads_session
 * @property int $status
 * @property string $language Language
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class ArticleCategory extends ActicleCategoryTable
{
    public $toastr_key = 'article-category';

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
                    'preserveNonEmptyValues' => true,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
            ]);
    }


    public function afterSave($insert, $changedAttributes)
    {
        $this->on(yii\db\BaseActiveRecord::EVENT_AFTER_INSERT, function (yii\db\AfterSaveEvent $e) {
            if ($this->position == null)
                $this->position = $this->primaryKey;
            $this->save();
        });
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parent_id', 'position', 'status',], 'integer'],
            [['ads_pixel', 'ads_session', 'language'], 'string'],
            [['title', 'slug', 'image', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'slug' => Yii::t('backend', 'Slug'),
            'parent_id' => Yii::t('backend', 'Parent ID'),
            'image' => Yii::t('backend', 'Image'),
            'description' => Yii::t('backend', 'Description'),
            'position' => Yii::t('backend', 'Position'),
            'ads_pixel' => Yii::t('backend', 'Ads Pixel'),
            'ads_session' => Yii::t('backend', 'Ads Session'),
            'status' => Yii::t('backend', 'Status'),
            'language' => Yii::t('backend', 'Language'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_by' => Yii::t('backend', 'Updated By'),
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
