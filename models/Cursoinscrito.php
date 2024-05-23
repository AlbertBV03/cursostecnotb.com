<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

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
 * @property int $fk_telefono
 *
 * @property User $fkInscrito
 * @property Curso $fkCurso
 * @property User $fkUser0
 * @property Datospersonales $fkTelefono
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

    public function behaviors(){
        return[
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'fkUser',
                'updatedByAttribute' => 'fkUser',
            ],
            'timestamp' => [
            'class' => 'yii\behaviors\TimestampBehavior',
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
            ],
        ],
    ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_inscrito', 'fk_curso', 'status', 'fk_telefono'], 'required'],
            [['fk_inscrito', 'fk_curso', 'status', 'created_at', 'updated_at', 'fkUser', 'fk_telefono'], 'integer'],
            [['certificado'], 'string', 'max' => 255],
            [['fk_inscrito'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fk_inscrito' => 'id']],
            [['fk_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['fk_curso' => 'ID']],
            [['fkUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fkUser' => 'id']],
            [['fk_telefono'], 'exist', 'skipOnError' => true, 'targetClass' => Datospersonales::className(), 'targetAttribute' => ['fk_telefono' => 'ID']],
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
            'fk_telefono' => 'Fk Telefono',
        ];
    }

    /**
     * Gets query for [[FkInscrito]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getFkInscrito()
    {
        return $this->hasOne(User::className(), ['id' => 'fk_inscrito']);
    }

    /**
     * Gets query for [[FkCurso]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursoQuery
     */
    public function getFkCurso()
    {
        return $this->hasOne(Curso::className(), ['ID' => 'fk_curso']);
    }

    /**
     * Gets query for [[FkUser0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getFkUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'fkUser']);
    }

    /**
     * Gets query for [[FkTelefono]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\DatospersonalesQuery
     */
    public function getFkTelefono()
    {
        return $this->hasOne(Datospersonales::className(), ['ID' => 'fk_telefono']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CursoinscritoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CursoinscritoQuery(get_called_class());
    }

    /**
     * @return image
     */
    public function getImageUrl(){
        return Yii::getAlias('@web')."/uploads/portadacurso/".$this->fkCurso->portada;
    }
}
