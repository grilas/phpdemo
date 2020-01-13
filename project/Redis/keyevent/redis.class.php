<?php
class RedisObj
{
    private $redis;

    public function __construct($host = '39.96.3.198', $port = 6379)
    {
        $this->redis = new Redis();
        $this->redis->connect($host, $port);
        $this->redis->auth('123456');
    }

    public function setex($key, $time, $val)
    {
        return $this->redis->setex($key, $time, $val);
    }

    public function set($key, $val)
    {
        return $this->redis->set($key, $val);
    }

    public function get($key)
    {
        return $this->redis->get($key);
    }

    public function del($key){
        return $this->redis->del($key);
    }
    public function expire($key = null, $time = 0)
    {
        return $this->redis->expire($key, $time);
    }

    public function psubscribe($patterns = array(), $callback)
    {
        $this->redis->psubscribe($patterns, $callback);
    }

    public function setOption()
    {
        $this->redis->setOption(\Redis::OPT_READ_TIMEOUT, -1);
    }
}