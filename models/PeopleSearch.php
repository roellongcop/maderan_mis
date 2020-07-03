<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\People;
use yii\helpers\ArrayHelper;

/**
 * PeopleSearch represents the model behind the search form of `app\models\People`.
 */
class PeopleSearch extends People
{
    public $keyword;
    public $no_print = false;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age', 'is_resident'], 'integer'],


            [['fname', 'mname', 'lname', 'sex', 'blk_id', 'lot_id', 'street_id', 'position', 'status', 'keyword', 'height', 'weight', 'no_print', 'date_id_issued', 'control_no'], 'safe'],
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
        $query = People::find()
            ->alias('p');

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
            'p.id' => $this->id,
            'is_resident' => $this->is_resident,
        ]);

        if ($this->keyword) {
            $query->andFilterWhere(['p.control_no' => $this->keyword]);
        } 
        

        $query->andFilterWhere(['p.status' => $this->status])
            ->andFilterWhere(['p.age' => $this->age])
            ->andFilterWhere(['p.height' => $this->height])
            ->andFilterWhere(['p.weight' => $this->weight])
            ->andFilterWhere(['b.blk_no' => $this->blk_id])
            ->andFilterWhere(['l.lot_no' => $this->lot_id])
            ->andFilterWhere(['s.name' => $this->street_id])
            ->andFilterWhere(['p.sex' => $this->sex])
            ->andFilterWhere(['p.status' => 'active'])
            ->andFilterWhere(['<>' , 'p.status', 'deleted']);

        if ($this->no_print) {
            $query->andWhere(['<>', 'date_id_issued', '0000-00-00']);
        }

        $query->joinWith('block b');
        $query->joinWith('lot l');
        $query->joinWith('street s');
        
        $query->orderBy(['fname' => SORT_ASC]);
        $query->groupBy('p.id');

        return $dataProvider;
    }

    public static function lists($is_resident = '')
    {
        $records = People::find()
            ->select(['id', 'CONCAT(fname, " ", mname, " ", lname) AS people_name'])
            ->where(['status' => 'active'])
            ->andFilterWhere(['is_resident' => $is_resident])
            ->all();

        $records = ArrayHelper::map($records, 'id', 'people_name');


        return $records;

    }

    public static function available($blotter_id=0)
    {

        $records = People::find()
            ->alias('p')
            ->select(['p.id AS people_id', 'CONCAT(p.fname, " ", p.mname, " ", p.lname) AS people_name'])
            ->andWhere("p.id NOT IN (SELECT user_id FROM {{%complainant}} WHERE blotter_id = $blotter_id)")
            ->andWhere("p.id NOT IN (SELECT user_id FROM {{%respondent}} WHERE blotter_id = $blotter_id)")
            ->andWhere("p.status != 'deleted'")
            ->all();

        $records = ArrayHelper::map($records, 'people_id', 'people_name');

        return $records;
    }
}
