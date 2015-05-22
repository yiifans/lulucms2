<?php

namespace source\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use source\models\TakonomyContent;

/**
 * TakonomyContentSearch represents the model behind the search form about `app\models\TakonomyContent`.
 */
class TakonomyContentSearch extends TakonomyContent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'takonomy_id', 'content_id'], 'integer'],
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
        $query = TakonomyContent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'takonomy_id' => $this->takonomy_id,
            'content_id' => $this->content_id,
        ]);

        return $dataProvider;
    }
}
