<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manual".
 *
 * @property int $ID
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $requisitos
 * @property string|null $objetivo
 * @property resource|null $imagen
 * @property int|null $status
 *
 * @property Cursomanual[] $cursomanuals
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
            [['ID', 'status'], 'integer'],
            [['nombre', 'descripcion', 'requisitos', 'objetivo'], 'string'],
            [['imagen'], 'string', 'max' => 200],
            [['imagen'], 'file', 'extensions' => 'jpeg, jpg, png'],
            [['ID'], 'unique'],
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
        ];
    }

    public function uploadImage()
    {
        if ($this->validate()) {
            $path = 'web/images/fotos' . $this->imagen->baseName . '.' . $this->imagen->extension;
            $this->imagen->saveAs($path);
            $this->imagen = $path;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets query for [[Cursomanuals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursomanuals()
    {
        return $this->hasMany(Cursomanual::class, ['fk_manual' => 'ID']);
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
}
