<?php

namespace source\libs;

use source\LuLu;
use yii\base\Object;
use yii\db\Query;

use source\modules\fragment\models\Fragment1Data;
use source\modules\fragment\models\Fragment2Data;
use source\modules\fragment\models\Fragment;
use source\models\Content;

class DataSource
{
    public static function getPagedContents($where=null,$pageSize=10)
    {
        $query = Content::leftJoinWith('taxonomy');
        if(!empty($where))
        {
            $query->andWhere($where);
        }
        
        $locals = LuLu::getPagedRows($query, [
            'orderBy' => 'created_at desc',
            'pageSize' => $pageSize
        ]);
        return $locals;
    }

    public static function getContents($where=null,$orderBy=null,$limit=10,$options=[])
    {
        
        $query = Content::find();
        if(!empty($where))
        {
            $query->andWhere($where);
        }
        if(isset($options['is_pic']))
        {
            $query->andWhere(['!=','thumb','']);
        }
        if(isset($options['content_type']))
        {
            $type = null;
            if(is_string($options['content_type']))
            {
                $type = $options['content_type'];
            }
            else 
            {
                $moduleId = LuLu::$app->controller->module->id;
                if( $moduleId!=='app-frontend')
                {
                    $type = $moduleId;
                }
            }
            if(!empty($type))
            {
                $query->andWhere(['=','content_type',$type]);
            }
        }
        if(empty($orderBy))
        {
            $orderBy = 'created_at desc';
            
        }
        $query->orderBy($orderBy);
     
        if($limit>0)
        {
            $query->limit($limit);
        }
      
        return $query->all();
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
	
	
	public static function getFragmentData($fid, $other = [],$fromCache=true)
	{
	    return Fragment::getData($fid,$other,$fromCache);
	}

	public static function getPageByCategory($catid)
	{
		return Page::findAll(['category_id' => $catid]);
	}
}