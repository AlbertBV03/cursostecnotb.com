<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pregunta".
 *
 * @property int $ID
 * @property string $contenido
 * @property string $respuesta
 * @property int $status
 * @property int $fk_examen
 *
 * @property Examan $fkExamen
 * @property Respuesta[] $respuesta0
 */
class Pregunta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pregunta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contenido', 'respuesta', 'status', 'fk_examen'], 'required'],
            [['contenido', 'respuesta'], 'string'],
            [['status', 'fk_examen'], 'integer'],
            [['fk_examen'], 'exist', 'skipOnError' => true, 'targetClass' => Examan::class, 'targetAttribute' => ['fk_examen' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'contenido' => 'Contenido',
            'respuesta' => 'Respuesta',
            'status' => 'Estado',
            'fk_examen' => 'Examen',
        ];
    }

    /**
     * Gets query for [[FkExamen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkExamen()
    {
        return $this->hasOne(Examan::class, ['ID' => 'fk_examen']);
    }

    /**
     * Gets query for [[Respuesta0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRespuesta()
    {
        return $this->hasMany(Respuesta::class, ['fk_pregunta' => 'ID']);
    }
}
