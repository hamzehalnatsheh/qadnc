<?php

namespace app\models\memberscouncil;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\memberscouncil\MembersCouncil;

/**
 * MembersCouncilSearch represents the model behind the search form of `app\models\memberscouncil\MembersCouncil`.
 */
class MembersCouncilSearch extends MembersCouncil
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'position', 'image', 'general_definition', 'experiences', 'courses'], 'safe'],
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
        $query = MembersCouncil::find();

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

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'general_definition', $this->general_definition])
            ->andFilterWhere(['like', 'experiences', $this->experiences])
            ->andFilterWhere(['like', 'courses', $this->courses]);

        return $dataProvider;
    }
}
