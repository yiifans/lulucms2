<?php

namespace source\modules\fragment\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use source\modules\fragment\models\Fragment2Data;
use source\LuLu;

/**
 * Fragment2DataSearch represents the model behind the search form about `source\modules\fragment\models\Fragment2Data`.
 */
class Fragment2DataSearch extends Fragment2Data
{
    public function init()
    {
        parent::init();
        $this->userValidate = false;
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fragment_id', 'created_at', 'sort_num', 'status'], 'integer'],
            [['title', 'title_format', 'thumb', 'url', 'sub_title', 'summary', 'created_by'], 'safe'],
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
        $query = Fragment2Data::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $this->fragment_id = LuLu::getGetValue('fid');
        $query->andFilterWhere([
            'fragment_id' => $this->fragment_id,
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

//         $query->andFilterWhere([
//             'id' => $this->id,
//             'fragment_id' => $this->fragment_id,
//             'created_at' => $this->created_at,
//             'sort_num' => $this->sort_num,
//             'status' => $this->status,
//         ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_format', $this->title_format])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'sub_title', $this->sub_title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
