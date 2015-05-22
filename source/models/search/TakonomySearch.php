<?php

namespace source\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use source\models\Takonomy;

/**
 * TakonomySearch represents the model behind the search form about `app\models\Takonomy`.
 */
class TakonomySearch extends Takonomy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'contents', 'sort_num'], 'integer'],
            [['name', 'url_alias', 'description','category_id'], 'safe'],
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
        $query = Takonomy::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere($params);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url_alias', $this->url_alias])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
