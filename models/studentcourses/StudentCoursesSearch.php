<?php

namespace app\models\studentcourses;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\studentcourses\StudentCourses;

/**
 * StudentCoursesSearch represents the model behind the search form of `app\models\studentcourses\StudentCourses`.
 */
class StudentCoursesSearch extends StudentCourses
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'student_id'], 'integer'],
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
        $query = StudentCourses::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //        $query->joinWith('course');
//        $query->joinWith('student');
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'course_id' => $this->course_id,
            'student_id' => $this->student_id,
        ]);

        return $dataProvider;
    }
}
