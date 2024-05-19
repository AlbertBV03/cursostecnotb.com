<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursocategoria".
 *
 * @property int $ID
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Curso[] $cursos
 */
class Cursocategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursocategoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 60],
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
        ];
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursoQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::class, ['fk_categoria' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CursocategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CursocategoriaQuery(get_called_class());
    }
}
