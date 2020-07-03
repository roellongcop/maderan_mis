<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Blotter;

/**
 * BlotterSearch represents the model behind the search form of `app\models\Blotter`.
 */
class BlotterSearch extends Blotter
{
    public $complainants;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nature_of_case', 'action_taken', 'remarks', 'case_no', 'status', 'created_at', 'updated_at', 'complainants'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Blotter::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10000
            ]
        ]);

        $dataProvider->sort->attributes['complainants'] = [
            'asc' => ['case_no' => SORT_ASC],
            'desc' => ['case_no' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['respondents'] = [
            'asc' => ['case_no' => SORT_ASC],
            'desc' => ['case_no' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'complainants' => $this->complainants,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nature_of_case', $this->nature_of_case])
            ->andFilterWhere(['like', 'action_taken', $this->action_taken])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'case_no', $this->case_no])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
