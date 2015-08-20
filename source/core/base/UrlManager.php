<?php

namespace source\core\base;

use yii\helpers\StringHelper;
use Yii;

class UrlManager extends \yii\web\UrlManager
{
    public $encodeUrl= false;
    public function createUrl($params)
    {
        $params = (array) $params;
        $anchor = isset($params['#']) ? '#' . $params['#'] : '';
        unset($params['#'], $params[$this->routeParam]);
    
        $route = trim($params[0], '/');
        unset($params[0]);
    
        $baseUrl = $this->showScriptName || !$this->enablePrettyUrl ? $this->getScriptUrl() : $this->getBaseUrl();
    
        if ($this->enablePrettyUrl) {
            $cacheKey = $route . '?' . implode('&', array_keys($params));
    
            /* @var $rule UrlRule */
            $url = false;
            if (isset($this->_ruleCache[$cacheKey])) {
                foreach ($this->_ruleCache[$cacheKey] as $rule) {
                    if (($url = $rule->createUrl($this, $route, $params)) !== false) {
                        break;
                    }
                }
            } else {
                $this->_ruleCache[$cacheKey] = [];
            }
    
            if ($url === false) {
                foreach ($this->rules as $rule) {
                    if (($url = $rule->createUrl($this, $route, $params)) !== false) {
                        $this->_ruleCache[$cacheKey][] = $rule;
                        break;
                    }
                }
            }
    
            if ($url !== false) {
                if (strpos($url, '://') !== false) {
                    if ($baseUrl !== '' && ($pos = strpos($url, '/', 8)) !== false) {
                        return substr($url, 0, $pos) . $baseUrl . substr($url, $pos);
                    } else {
                        return $url . $baseUrl . $anchor;
                    }
                } else {
                    return "$baseUrl/{$url}{$anchor}";
                }
            }
    
            if ($this->suffix !== null) {
                $route .= $this->suffix;
            }
            if (!empty($params) && ($query = http_build_query($params)) !== '') {
                $route .= '?' . $query;
            }
    
            return "$baseUrl/{$route}{$anchor}";
        } else {
            $url = "$baseUrl?{$this->routeParam}=";
            
            $url .= $this->encodeUrl?urlencode($route):$route;
            
            if (!empty($params) && ($query = http_build_query($params)) !== '') {
                $url .= '&' . $query;
            }
    
            return $url . $anchor;
        }
    }
}
