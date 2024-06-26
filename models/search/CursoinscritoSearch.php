<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cursoinscrito;

/**
 * CursoinscritoSearch represents the model behind the search form of `app\models\Cursoinscrito`.
 */
class CursoinscritoSearch extends Cursoinscrito
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'fk_inscrito', 'fk_curso', 'status', 'created_at', 'updated_at', 'fkUser', 'fk_telefono'], 'integer'],
            [['certificado'], 'safe'],
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
        $query = Cursoinscrito::find();

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
            'fk_inscrito' => $this->fk_inscrito,
            'fk_curso' => $this->fk_curso,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fkUser' => $this->fkUser,
            'fk_telefono' => $this->fk_telefono,
        ]);

        $query->andFilterWhere(['like', 'certificado', $this->certificado]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchInscrito($ID, $params)
    {
        $query = Cursoinscrito::find()->where(['fk_curso' => $ID]);

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
            'fk_inscrito' => $this->fk_inscrito,
            'fk_curso' => $this->fk_curso,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fkUser' => $this->fkUser,
            'fk_telefono' => $this->fk_telefono,
        ]);

        $query->andFilterWhere(['like', 'certificado', $this->certificado]);

        return $dataProvider;
    }
}
