<?php

namespace app\models;

use Yii;
use app\models\Curso;
use app\models\Manual;
use app\models\Manualdetalle;

/**
 * This is the model class for table "manual".
 *
 * @property int $ID
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $requisitos
 * @property string|null $objetivo
 * @property string|null $imagen
 * @property int|null $status
 * @property int $fk_curso
 *
 * @property Curso $fkCurso
 * @property Manualdetalle[] $manualdetalles
 */
class Manual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'requisitos', 'objetivo'], 'string'],
            [['status', 'fk_curso'], 'integer'],
            [['fk_curso'], 'required'],
            [['imagen'], 'string', 'max' => 255],
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
            'descripcion' => 'Descripcion',
            'requisitos' => 'Requisitos',
            'objetivo' => 'Objetivo',
            'imagen' => 'Imagen',
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
     * Gets query for [[Manualdetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManualdetalles()
    {
        return $this->hasMany(Manualdetalle::class, ['fk_manual' => 'ID']);
    }

    public function getManuales()
    {
        return $this->hasMany(Manual::class, ['ID' => 'fk_manual'])
            ->viaTable('cursomanual', ['fk_curso' => 'ID']);
    }
    
}
