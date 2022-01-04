<?php

namespace app\models\consultation;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\consultation\Consultation;

/**
 * ConsultationSearch represents the model behind the search form of `app\models\consultation\Consultation`.
 */
class ConsultationSearch extends Consultation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['project_name', 'specified_time', 'communication', 'target', 'about_project'], 'safe'],
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
        $query = Consultation::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'specified_time', $this->specified_time])
            ->andFilterWhere(['like', 'communication', $this->communication])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'about_project', $this->about_project]);

        return $dataProvider;
    }
}
