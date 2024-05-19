<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursoinscrito".
 *
 * @property int $ID
 * @property int $fk_inscrito
 * @property int $fk_curso
 * @property int $status
 * @property string|null $certificado
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $fkUser
 *
 * @property Curso $fkCurso
 * @property User $fkInscrito
 */
class Cursoinscrito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursoinscrito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_inscrito', 'fk_curso', 'status'], 'required'],
            [['fk_inscrito', 'fk_curso', 'status', 'created_at', 'updated_at', 'fkUser'], 'integer'],
            [['certificado'], 'string', 'max' => 255],
            [['fk_inscrito'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['fk_inscrito' => 'id']],
            [['fk_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::class, 'targetAttribute' => ['fk_curso' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'fk_inscrito' => 'Fk Inscrito',
            'fk_curso' => 'Fk Curso',
            'status' => 'Status',
            'certificado' => 'Certificado',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'fkUser' => 'Fk User',
        ];
    }

    /**
     * Gets query for [[FkCurso]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursoQuery
     */
    public function getFkCurso()
    {
        return $this->hasOne(Curso::class, ['ID' => 'fk_curso']);
    }

    /**
     * Gets query for [[FkInscrito]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getFkInscrito()
    {
        return $this->hasOne(User::class, ['id' => 'fk_inscrito']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CursoinscritoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CursoinscritoQuery(get_called_class());
    }
}
