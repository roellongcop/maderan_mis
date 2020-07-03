<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Certificate;

/**
 * CertificateSearch represents the model behind the search form of `app\models\Certificate`.
 */
class CertificateSearch extends Certificate
{
    public $control_no;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'status', 'created_at', 'updated_at', 'user_id', 'control_no'], 'safe'],
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
        $query = Certificate::find()
            ->alias('c');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10000
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'c.id' => $this->id,
            // 'user_id' => $this->user_id,
            'p.control_no' => $this->control_no,
            'c.updated_at' => $this->updated_at,
        ]);


        $query->andFilterWhere(['like', 'c.name', $this->name])
            ->andFilterWhere(['like', 'CONCAT(p.fname, " ", p.mname, " ", p.lname)', $this->user_id])
            ->andFilterWhere(['like', 'c.created_at', $this->created_at])
            ->andFilterWhere(['like', 'c.status', $this->status]);

        $query->joinWith('people p');
        return $dataProvider;
    }
}
