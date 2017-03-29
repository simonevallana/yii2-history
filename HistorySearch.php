<?php

namespace boolean\history;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HistorySearch represents the model behind the search form about `common\components\history\HistoryEntity`.
 */
class HistorySearch extends HistoryEntity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'initiator', 'created_at'], 'integer'],
            [['ip', 'event', 'class', 'table_name', 'row_id', 'log'], 'safe'],
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
        $query = HistoryEntity::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => [
                'pageSize' => 40,
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
            'initiator' => $this->initiator,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'event', $this->event])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'table_name', $this->table_name])
            ->andFilterWhere(['like', 'row_id', $this->row_id])
            ->andFilterWhere(['like', 'log', $this->log]);

        return $dataProvider;
    }
}
