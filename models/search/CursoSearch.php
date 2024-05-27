<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Curso;

/**
 * CursoSearch represents the model behind the search form of `app\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'fk_revisor', 'fk_tipo', 'fk_categoria', 'visitas', 'votos', 'like', 'dislike', 'status', 'created_at', 'updated_at', 'fkUser'], 'integer'],
            [['codigo', 'portada', 'nombre', 'detalle', 'inicio', 'fin'], 'safe'],
            [['costo'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Curso::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'costo' => $this->costo,
            'inicio' => $this->inicio,
            'fin' => $this->fin,
            'fk_revisor' => $this->fk_revisor,
            'fk_tipo' => $this->fk_tipo,
            'fk_categoria' => $this->fk_categoria,
            'visitas' => $this->visitas,
            'votos' => $this->votos,
            'like' => $this->like,
            'dislike' => $this->dislike,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fkUser' => $this->fkUser,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'portada', $this->portada])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'detalle', $this->detalle]);

        return $dataProvider;
    }
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public function searchTutorado($ID, $params)
    {
        $query = Curso::find()->where(['fk_revisor' => $ID]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'costo' => $this->costo,
            'inicio' => $this->inicio,
            'fin' => $this->fin,
            'fk_revisor' => $this->fk_revisor,
            'fk_tipo' => $this->fk_tipo,
            'fk_categoria' => $this->fk_categoria,
            'visitas' => $this->visitas,
            'votos' => $this->votos,
            'like' => $this->like,
            'dislike' => $this->dislike,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fkUser' => $this->fkUser,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'portada', $this->portada])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'detalle', $this->detalle]);

        return $dataProvider;
    }
}
