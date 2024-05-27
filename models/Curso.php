<?php

namespace app\models;

use Yii;
use app\models\Manual;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "curso".
 *
 * @property int $ID
 * @property string|null $codigo
 * @property string $portada
 * @property string $nombre
 * @property string $detalle
 * @property float $costo
 * @property string $inicio
 * @property string $fin
 * @property int $fk_revisor
 * @property int $fk_tipo
 * @property int $fk_categoria
 * @property int|null $visitas
 * @property int|null $votos
 * @property int|null $like
 * @property int|null $dislike
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $fkUser
 *
 * @property Cursoinscrito[] $cursoinscritos
 * @property Examen[] $examens
 * @property Cursocategoria $fkCategoria
 * @property User $fkRevisor
 * @property Cursotipo $fkTipo
 * @property User $fkUser0
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;
    public $usuario;

    public static function tableName()
    {
        return 'curso';
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
            [['codigo', 'portada', 'nombre', 'detalle', 'costo', 'inicio', 'fin', 'fk_tipo', 'fk_categoria', 'status'], 'required'],
            [['detalle'], 'string'],
            [['costo'], 'number'],
            [['inicio', 'fin'], 'safe'],
            [['fk_revisor', 'fk_tipo', 'fk_categoria', 'visitas', 'votos', 'like', 'dislike', 'status', 'created_at', 'updated_at', 'fkUser'], 'integer'],
            [['codigo', 'portada'], 'string', 'max' => 255],
            [['nombre'], 'string', 'max' => 120],
            [['imageFile'], 'safe'],
            [['imageFile'], 'file', 'extensions'=>'jpg, gif, png'],
            [['imageFile'], 'file', 'maxSize'=>'100000000'],
            [['usuario'], 'validateUser'],
            [['fk_revisor'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['fk_revisor' => 'id']],
            [['fkUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['fkUser' => 'id']],
            [['fk_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Cursotipo::class, 'targetAttribute' => ['fk_tipo' => 'ID']],
            [['fk_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Cursocategoria::class, 'targetAttribute' => ['fk_categoria' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'codigo' => 'Codigo',
            'portada' => 'Portada',
            'nombre' => 'Nombre',
            'detalle' => 'Detalle',
            'costo' => 'Costo',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
            'fk_revisor' => 'Fk Revisor',
            'fk_tipo' => 'Fk Tipo',
            'fk_categoria' => 'Fk Categoria',
            'visitas' => 'Visitas',
            'votos' => 'Votos',
            'like' => 'Like',
            'dislike' => 'Dislike',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'fkUser' => 'Fk User',
        ];
    }

    /**
     * Valida la correcta escritura del correo electrónico del solicitante y asigna datos del solicitante y el instituto al que pertenece
     */
    public function validateUser($attribute, $params)
    {
        $user = User::find()->select('id')->where(['username' => $this->usuario])->One();

        if ($user == null) {
            $this->addError($attribute, 'No se encontró la dirección proporcionada, verifique que el correo está registrado en el sistema.');
        } else {
            $this->fk_revisor = $user->id;
            /* $userProfile = Userprofile::find()->select('IDUProfile')->where(['fkUser'=>$this->fkuser])->one();
            $this->fk_instituto = $userProfile->IDUProfile; */
            return true;
        }
    }

    /**
     * Gets query for [[Cursoinscritos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursoinscritoQuery
     */
    public function getCursoinscritos()
    {
        return $this->hasMany(Cursoinscrito::class, ['fk_curso' => 'ID']);
    }

    /**
     * Gets query for [[Examens]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ExamenQuery
     */
    public function getExamens()
    {
        return $this->hasMany(Examen::class, ['fk_curso' => 'ID']);
    }

    public function getManuales()
    {
        return $this->hasMany(Manual::class, ['ID' => 'fk_manual'])
            ->viaTable('cursomanual', ['fk_curso' => 'ID']);
    }


    /**
     * Gets query for [[FkCategoria]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursocategoriaQuery
     */
    public function getFkCategoria()
    {
        return $this->hasOne(Cursocategoria::class, ['ID' => 'fk_categoria']);
    }

    /**
     * Gets query for [[FkRevisor]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getFkRevisor()
    {
        return $this->hasOne(User::class, ['id' => 'fk_revisor']);
    }

    /**
     * Gets query for [[FkTipo]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursotipoQuery
     */
    public function getFkTipo()
    {
        return $this->hasOne(Cursotipo::class, ['ID' => 'fk_tipo']);
    }

    /**
     * Gets query for [[FkUser0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getFkUser0()
    {
        return $this->hasOne(User::class, ['id' => 'fkUser']);
    }

    /**
     * Obtiene la url de la imagen para guardar en la base de datos y mostrar en las vistas
     */
    public function getImageUrl(){
        return Yii::getAlias('@web')."/uploads/portadacurso/".$this->portada;
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CursoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CursoQuery(get_called_class());
    }
}
