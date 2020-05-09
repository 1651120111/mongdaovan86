<?php

namespace modava\article\models;

use modava\article\Article;
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
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class ArticleCategory extends ActicleCategoryTable
{
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
            [['ads_pixel', 'ads_session'], 'string'],
            [['title', 'slug', 'image', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Article::t('article', 'ID'),
            'title' => Article::t('article', 'Title'),
            'slug' => Article::t('article', 'Slug'),
            'parent_id' => Article::t('article', 'Parent ID'),
            'image' => Article::t('article', 'Image'),
            'description' => Article::t('article', 'Description'),
            'position' => Article::t('article', 'Position'),
            'ads_pixel' => Article::t('article', 'Ads Pixel'),
            'ads_session' => Article::t('article', 'Ads Session'),
            'status' => Article::t('article', 'Status'),
            'created_at' => Article::t('article', 'Created At'),
            'updated_at' => Article::t('article', 'Updated At'),
            'created_by' => Article::t('article', 'Created By'),
            'updated_by' => Article::t('article', 'Updated By'),
        ];
    }


    public static function getUserAsArticleCategory($UserId)
    {
        return 'Mong';
    }
}
