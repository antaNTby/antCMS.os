<?php
#### antDB.php
class antDataBase
{
    static $link;
    static $count = 0;

    public static function connect(
        $host,
        $user,
        $pass,
        $db
    )
    {
        @self::$link = mysqli_connect($host, $user, $pass, $db)
        or exit('No connect (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
        mysqli_set_charset(self::$link, 'utf8mb3');
        return self::$link;
    }

    public static function escape($data)
    {
        if (is_array($data))
        {
            $data = array_map('self::escape', $data);
        }
        else
        {
            mysqli_set_charset(self::$link, 'utf8mb3');
            $data = mysqli_real_escape_string(self::$link, $data);
        }

        return $data;
    }

    public static function Query(
        $sql,
        $print = false
    )
    {
        self::$count++;

        $result = mysqli_query(self::$link, $sql);

        if ($result === false || $print === 1)
        {
            $error = mysqli_error(self::$link);
            $trace = debug_backtrace();
            $out   = array(1 => '');

            if (!empty($error))
            {
                preg_match("#'(.+?)'#is", $error, $out);
            }

            $head = $error ? '<b style="color:red">MySQL error: </b><br>
            <b style="color:orangered">' . $error . '</b><br>' : null;

            $error_log = date('Y-m-d h:i:s') . ' ' . $head . '
            <b>Query: </b><br>
            <pre><span style="color:#990099">'
            . str_replace($out[1], '<b style="color:red">' . $out[1] . '</b>', $trace[0]['args'][0])
                . '</pre></span><br>
            <b>File: </b><b style="color:#660099">' . $trace[0]['file'] . ':' . $trace[0]['line'] . '</b><br>
            <b>Line: </b><b style="color:#660099">' . $trace[0]['line'] . '</b>';
            exit($error_log);
        }

        return $result;
    }
}
