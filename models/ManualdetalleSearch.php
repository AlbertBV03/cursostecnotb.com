<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Manualdetalle;

/**
 * ManualdetalleSearch represents the model behind the search form of `app\models\Manualdetalle`.
 */
class ManualdetalleSearch extends Manualdetalle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'fk_manual', 'status'], 'integer'],
            [['titulo', 'contenido'], 'safe'],
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
        $query = Manualdetalle::find();

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
            'fk_manual' => $this->fk_manual,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'contenido', $this->contenido]);

        return $dataProvider;
    }
}
