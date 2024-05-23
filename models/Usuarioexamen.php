<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarioexamen".
 *
 * @property int $ID
 * @property int $status
 * @property int $fk_examen
 * @property int $fk_user
 *
 * @property Examen $fkExamen
 * @property User $fkUser
 */
class Usuarioexamen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarioexamen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'fk_examen', 'fk_user'], 'required'],
            [['status', 'fk_examen', 'fk_user'], 'integer'],
            [['fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['fk_user' => 'id']],
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
            'status' => 'Status',
            'fk_examen' => 'Fk Examen',
            'fk_user' => 'Fk User',
        ];
    }

    /**
     * Gets query for [[FkExamen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkExamen()
    {
        return $this->hasOne(Examen::class, ['ID' => 'fk_examen']);
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
