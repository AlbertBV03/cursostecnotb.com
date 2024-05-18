<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "examen".
 *
 * @property int $ID
 * @property string $nombre
 * @property int $status
 * @property int $fk_curso
 *
 * @property Curso $fkCurso
 * @property Preguntum[] $pregunta
 * @property Usuarioexaman[] $usuarioexamen
 */
class Examen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'examen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'status', 'fk_curso'], 'required'],
            [['status', 'fk_curso'], 'integer'],
            [['nombre'], 'string', 'max' => 150],
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
            'nombre' => 'Nombre',
            'status' => 'Status',
            'fk_curso' => 'Fk Curso',
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
     * Gets query for [[Pregunta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPregunta()
    {
        return $this->hasMany(Preguntum::class, ['fk_examen' => 'ID']);
    }

    /**
     * Gets query for [[Usuarioexamen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioexamen()
    {
        return $this->hasMany(Usuarioexaman::class, ['fk_examen' => 'ID']);
    }
}
