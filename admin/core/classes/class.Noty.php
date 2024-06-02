<?
/**
 * https://ned.im/noty/#/
 * https://github.com/needim/noty
 * https://daneden.github.io/animate.css/
 * A Dependency-free notification library
 * Class Noty
 */
class Noty
{
  /**
   * @param $type
   * @param $text
   * @param $timeout
   * @param $layout
   */
  public static function run($type, $text, $timeout, $layout)
  {


$nn=<<<HTML
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ee</title>
</head>
<body>
<link rel="stylesheet" href="/lib/noty/lib/noty.css" />
<!-- Подключаем нужную тему -->
<link href="/lib/noty/lib/themes/metroui.css" rel="stylesheet">
<link href="/lib/animate.css/animate.css" rel="stylesheet">
<script type="text/javascript" src="/lib/noty/lib/noty.js"></script>
<script>
var n = new Noty({
            text: "Hi! uhuhnjkn hbhubhu"});

            console.log(n); // Returns a NOTY javascript object

            // require("../../../vendor/needim/noty/lib/noty.js");
            new Noty({
                // container: "#custom_container",
                type: '."\"$type\"".',
                text: '."\"$text\"".',
                timeout: '."\"$timeout\"".',
                layout: '."\"$layout\"".',
                // theme: "semanticui",
                animation: {
                    open: "animated bounceInRight",
                    close: "animated bounceOutRight"
                }
            }).show();
</script>
</body>
</html>
HTML;
    die( $nn);
  }
}