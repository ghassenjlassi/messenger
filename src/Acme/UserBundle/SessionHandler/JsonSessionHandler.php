<?php

namespace Acme\UserBundle\SessionHandler; 
use Snc\RedisBundle\Session\Storage\Handler\RedisSessionHandler;

/**
 * Sessionhandler to serialize PHP sessions into redis using json as
 * format.
 *This way we can read the session in node.js websockets.
 */
class JsonSessionHandler extends RedisSessionHandler
{
    
    /*
     *  {@inheritdoc}
     */
    public function write($sessionId, $data)
    {
        $raw = $this->unserializeSession($data);
        $session = json_encode($raw);
        parent::write($sessionId, $session);
    }

    /*
     *  {@inheritdoc}
     */
    public function read($sessionId)
    {   
        //$serializer = $container->get('jms_serializer');
        $raw = parent::read($sessionId);

        if (strlen($raw) == 0) {
            return $raw;
        }

        return $this->serializeSession(json_decode($raw, true));
    }

    /**
     * @see http://php.net/manual/en/function.session-decode.php#108037
     * @param array $session_data
     * @throws Exception
     * @return multitype:mixed
     */
    private function unserializeSession($session_data)
    {
        $return_data = array();
        $offset = 0;
        while ($offset < strlen($session_data)) {
            if (!strstr(substr($session_data, $offset), "|")) {
                throw new Exception("invalid data, remaining: " . substr($session_data, $offset));
            }
            $pos = strpos($session_data, "|", $offset);
            $num = $pos - $offset;
            $varname = substr($session_data, $offset, $num);
            $offset += $num + 1;
            $data = unserialize(substr($session_data, $offset));
            $return_data[$varname] = $data;
            $offset += strlen(serialize($data));
        }
        return $return_data;
    }

    /**
     * @see http://php.net/manual/en/function.session-encode.php#76425
     * @param array $array
     * @return string
     */
    private function serializeSession(array $array)
    {
        $raw = '';
        $line = 0;
        $keys = array_keys($array);
        foreach ($keys as $key) {
            $value = $array[$key];
            $line++;

            $raw .= $key . '|';

            if (is_array($value) && isset($value['huge_recursion_blocker_we_hope'])) {
                $raw .= 'R:' . $value['huge_recursion_blocker_we_hope'] . ';';
            } else {
                $raw .= serialize($value);
            }
            $array[$key] = Array('huge_recursion_blocker_we_hope' => $line);
        }
        return $raw;
    }   
}