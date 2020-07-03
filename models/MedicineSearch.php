<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Medicine;
use yii\helpers\ArrayHelper;

/**
 * MedicineSearch represents the model behind the search form of `app\models\Medicine`.
 */
class MedicineSearch extends Medicine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['name', 'description', 'expiration_date', 'status', 'date_added', 'date_updated'], 'safe'],
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
        $query = Medicine::find();

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
            'id' => $this->id,
            'category_id' => $this->category_id,
            'expiration_date' => $this->expiration_date,
            'date_added' => $this->date_added,
            'date_updated' => $this->date_updated,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status]);



        return $dataProvider;
    }

    public static function lists($dropdown = false)
    {
        $models = Medicine::find()
            ->where(['>', 'expiration_date', date('m/d/Y')])
            ->orderBy(['expiration_date' => SORT_ASC])
            ->all();

        if ($dropdown == true) {
            $models = ArrayHelper::map($models, 'id', 'name');
        }

        return $models;
    }
}
