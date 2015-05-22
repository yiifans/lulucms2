<?php

namespace common\includes;

use components\LuLu;
use yii\base\Object;
use yii\db\Query;
use common\models\Fragment1Data;
use common\models\Fragment2Data;
use common\models\Fragment3Data;
use common\models\Fragment;
use common\models\Page;

class DataSource extends Object
{

	public static function queryAll($sql)
	{
		return LuLu::queryAll($sql);
	}

	public static function queryOne($sql)
	{
		return LuLu::queryOne($sql);
	}
	
	/*
	 * $channelsIds = 1 or '1,3,4'
	*
	* $other
	* $other['fields']='*' or 'id,name,title'
	* $other['where']='status=1';
	* $other['order']='sort_num desc';
	* $other['offset']=0;
	* $other['limit']=10;
	*
	* $other['att1']=1;
	* $other['att2']=2;
	* $other['att3']=3;
	* $other['flag']='a,b,c,d';
	* $other['is_pic']=true;
	*/
	public static function getContentByChannel($channelIds, $other = [])
	{
		$tableName = '';
		
		$where = '';
		
		$cachedChannels = LuLu::getAppParam('cachedChannels');
		
		if(intval($channelIds) > 0)
		{
			$channel = $cachedChannels[$channelIds];
			
			$tableName = $channel['table'];
			if(empty($tableName))
			{
				return [];
			}
			
			if($channel['is_leaf'])
			{
				$where = 'channel_id=' . $channelIds;
			}
			else
			{
				$leafIds = $channel['leaf_ids'];
				if($leafIds == '')
				{
					return [];
				}
				
				$where = 'channel_id in(' . $leafIds . ')';
			}
		}
		else
		{
			$channelIdArray = explode(',', $channelIds);
			$tableName = $channel[$channelIdArray[0]];
			if(empty($tableName))
			{
				return [];
			}
			
			$leafIds = '';
			foreach($channelIdArray as $id)
			{
				$leafIds .= $cachedChannels[$id]['leaf_ids'] . ',';
			}
			
			$leafIdsArray = explode(',', rtrim($leafIds, ','));
			$leafIdsArray = array_unique($leafIdsArray);
			$leafIds = implode(',', $leafIdsArray);
			
			$where = 'channel_id in(' . $leafIds . ')';
		}
		
		$query = self::buildContentQuery($tableName, $other, $where);
		
		return $query->all();
	}

	public static function getContentByTable($tableName, $other = [])
	{
		$query = self::buildContentQuery($tableName, $other);
		
		return $query->all();
	}

	public static function buildContentQuery($tableName, $other = [], $where = null)
	{
		$query = new Query();
		
		if(isset($other['fields']))
		{
			$query->select($other['fields']);
		}
		
		if(empty($tableName))
		{
			// todo
			$tableName = 'model_news';
		}
		$query->from($tableName);
		
		if($where !== null)
		{
			$query->andWhere($where);
		}
		if(isset($other['where']))
		{
			$query->andWhere($other['where']);
		}
		
		if(isset($other['att1']) && is_integer($other['att1']))
		{
			$query->andWhere(['att1' => $other['att1']]);
		}
		if(isset($other['att2']) && is_integer($other['att2']))
		{
			$query->andWhere(['att2' => $other['att2']]);
		}
		if(isset($other['att3']) && is_integer($other['att3']))
		{
			$query->andWhere(['att3' => $other['att3']]);
		}
		
		if(isset($other['flag']))
		{
			$flagValue = CommonUtility::getFlagValue($other['flag']);
			if($flagValue > 0)
			{
				$query->andWhere('flag&' . $flagValue . '>0');
			}
		}
		
		if(isset($other['is_pic']) && $other['is_pic'])
		{
			$query->andWhere(['is_pic' => 1]);
		}
		
		if(isset($other['order']))
		{
			$query->orderBy($other['order']);
		}
		else
		{
			$query->orderBy('publish_time desc');
		}
		
		if(isset($other['offset']))
		{
			$query->offset(intval($other['offset']));
		}
		else
		{
			$query->offset(0);
		}
		
		if(isset($other['limit']))
		{
			$query->limit(intval($other['limit']));
		}
		else
		{
			$query->limit(10);
		}
		
		return $query;
	}
	
	/*
	 * get one fragment
	 */
	public static function getFragment($id)
	{
		return Fragment::findOne($id);
	}
	
	/*
	 * get fragments by category id
	 */
	public static function getFragmentByCategory($catid)
	{
		return Fragment::findAll(['category_id' => $catid]);
	}

	/*
	 * get data of a fragment id
	*
	* $other
	* $other['where]=''
	* $other['order']='sort_num asc'
	* $other['offset]=''
	* $other['limit]=''
	*/
	public static function getFragmentData($fraid, $other = [], $withFragment = false)
	{
		$query = null;
		// $query=Fragment1Data::find();
		
		$fragment = Fragment::findOne($fraid);
		if($fragment == null)
		{
			return [];
		}
		
		$type = $fragment->type;
		
		if($type == 1)
		{
			$query = Fragment1Data::find();
		}
		else if($type == 2)
		{
			$query = Fragment2Data::find();
		}
		else if($type == 3)
		{
			$query = Fragment3Data::find();
		}
		
		if($query == null)
		{
			return [];
		}
		
		$query->where(['fragment_id' => $fraid]);
		
		if(isset($other['where']))
		{
			$query->andWhere($other['where']);
		}
		
		if(isset($other['order']))
		{
			$query->orderBy($other['where']);
		}
		else 
		{
			$query->orderBy('sort_num asc');
		}
		
		if(isset($other['offset']) && is_integer($other['offset']))
		{
			$query->offset($other['offset']);
		}
		
		if(isset($other['limit']) && $other['limit'])
		{
			$query->limit($other['limit']);
		}
		$ret = $query->all();
		if($type === 3)
		{
			$temp = [];
			foreach($ret as $row)
			{
				$item = self::getContentByChannel($row['channel_id'], ['where' => 'id=' . $row['content_id']]);
				if(empty($item))
				{
					continue;
				}
				$temp[] = $item[0];
			}
			$ret = $temp;
		}
		
		if($withFragment)
		{
			return [$fragment, $ret];
		}
		else
		{
			return $ret;
		}
	}

	public static function getPageByCategory($catid)
	{
		return Page::findAll(['category_id' => $catid]);
	}
}