<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cursomanual;

/**
 * CursomanualSearch represents the model behind the search form of `app\models\Cursomanual`.
 */
class CursomanualSearch extends Cursomanual
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'fk_curso', 'fk_manual'], 'integer'],
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
        $query = Cursomanual::find();

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
            'fk_curso' => $this->fk_curso,
            'fk_manual' => $this->fk_manual,
        ]);

        return $dataProvider;
    }
}
