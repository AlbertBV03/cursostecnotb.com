<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarioexamen;

/**
 * UsuarioexamenSearch represents the model behind the search form of `app\models\Usuarioexamen`.
 */
class UsuarioexamenSearch extends Usuarioexamen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'status', 'fk_examen', 'fk_user'], 'integer'],
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
        $query = Usuarioexamen::find();

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
            'status' => $this->status,
            'fk_examen' => $this->fk_examen,
            'fk_user' => $this->fk_user,
        ]);

        return $dataProvider;
    }
}
