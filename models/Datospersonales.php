<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datospersonales".
 *
 * @property int $ID
 * @property string $nombre
 * @property string $telefono
 * @property int $fk_user
 *
 * @property User $fkUser
 */
class Datospersonales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datospersonales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'telefono', 'fk_user'], 'required'],
            [['fk_user'], 'integer'],
            [['nombre'], 'string', 'max' => 90],
            [['telefono'], 'string', 'max' => 10],
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
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'fk_user' => 'Fk User',
        ];
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
