<?php

namespace source\modules\rbac\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use source\modules\rbac\models\Assignment;

/**
 * AssignmentSearch represents the model behind the search form about `app\modules\rbac\models\Assignment`.
 */
class AssignmentSearch extends Assignment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'role', 'note'], 'safe'],
            [['created_at'], 'integer'],
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
        $query = Assignment::find();

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
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
