<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manualdetalle".
 *
 * @property int $ID
 * @property int|null $fk_manual
 * @property string|null $titulo
 * @property string|null $contenido
 * @property int|null $status
 *
 * @property Manual $fkManual
 */
class Manualdetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manualdetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'fk_manual', 'status'], 'integer'],
            [['titulo', 'contenido'], 'string'],
            [['ID'], 'unique'],
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
            'fk_manual' => 'Fk Manual',
            'titulo' => 'Titulo',
            'contenido' => 'Contenido',
            'status' => 'Status',
        ];
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
