<?php

namespace app\models;

use Yii;
use app\models\Pregunta;

/**
 * This is the model class for table "respuesta".
 *
 * @property int $ID
 * @property string $respuesta
 * @property int $validado
 * @property int $fk_pregunta
 * @property int $fk_user
 *
 * @property Pregunta $fkPreguntas
 * @property User $fkUser
 */
class Respuesta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respuesta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['respuesta', 'validado', 'fk_pregunta', 'fk_user'], 'required'],
            [['respuesta'], 'string'],
            [['validado', 'fk_pregunta', 'fk_user'], 'integer'],
            [['fk_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Preguntum::class, 'targetAttribute' => ['fk_pregunta' => 'ID']],
            [['fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['fk_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'respuesta' => 'Respuesta',
            'validado' => 'Validado',
            'fk_pregunta' => 'Fk Pregunta',
            'fk_user' => 'Fk User',
        ];
    }

    /**
     * Gets query for [[FkPregunta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkPregunta()
    {
        return $this->hasOne(Pregunta::class, ['ID' => 'fk_pregunta']);
    }

    /**
     * Gets query for [[FkUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkUser()
    {
        return $this->hasOne(User::class, ['id' => 'fk_user']);
    }
}
