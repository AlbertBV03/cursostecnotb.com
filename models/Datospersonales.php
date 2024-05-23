<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datospersonales".
 *
 * @property int $ID
 * @property string $nombre
 * @property string $telefono
 * @property string|null $rol
 * @property int $fk_user
 *
 * @property Cursoinscrito[] $cursoinscritos
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
            [['rol'], 'string', 'max' => 60],
            [['fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fk_user' => 'id']],
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
            'rol' => 'Rol',
            'fk_user' => 'Fk User',
        ];
    }

    /**
     * Gets query for [[Cursoinscritos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursoinscritoQuery
     */
    public function getCursoinscritos()
    {
        return $this->hasMany(Cursoinscrito::className(), ['fk_telefono' => 'ID']);
    }

    /**
     * Gets query for [[FkUser]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getFkUser()
    {
        return $this->hasOne(User::className(), ['id' => 'fk_user']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\DatospersonalesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\DatospersonalesQuery(get_called_class());
    }
}
