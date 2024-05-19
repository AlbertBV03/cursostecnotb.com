<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursomanual".
 *
 * @property int $ID
 * @property int|null $fk_curso
 * @property int|null $fk_manual
 *
 * @property Curso $fkCurso
 * @property Manual $fkManual
 */
class Cursomanual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursomanual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'fk_curso', 'fk_manual'], 'integer'],
            [['ID'], 'unique'],
            [['fk_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::class, 'targetAttribute' => ['fk_curso' => 'ID']],
            [['fk_manual'], 'exist', 'skipOnError' => true, 'targetClass' => Manual::class, 'targetAttribute' => ['fk_manual' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'fk_curso' => 'Fk Curso',
            'fk_manual' => 'Fk Manual',
        ];
    }

    /**
     * Gets query for [[FkCurso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkCurso()
    {
        return $this->hasOne(Curso::class, ['ID' => 'fk_curso']);
    }

    /**
     * Gets query for [[FkManual]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkManual()
    {
        return $this->hasOne(Manual::class, ['ID' => 'fk_manual']);
    }
}
