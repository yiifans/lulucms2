<?php

namespace source\modules\dict\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use source\modules\dict\models\Dict;
use source\LuLu;

/**
 * DictSearch represents the model behind the search form about `source\models\Dict`.
 */
class DictSearch extends Dict
{
    public function init()
    {
        parent::init();
        $this->userValidate = false;
        $this->category_id=LuLu::getGetValue('category');
    }
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'status', 'sort_num'], 'integer'],
            [['category_id', 'name', 'value', 'description', 'thumb'], 'safe'],
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
        $query = Dict::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //$query->andFilterWhere([
        //    'id' => $this->id,
        //    'parent_id' => $this->parent_id,
        //    'status' => $this->status,
        //    'sort_num' => $this->sort_num,
        //]);

        $query->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'thumb', $this->thumb]);

        return $dataProvider;
    }
}
