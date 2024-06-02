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
    echo '
    <script>
    new Noty({
      type: '."\"$type\"".',
      text: '."\"$text\"".',
      timeout: '."\"$timeout\"".',
      layout: '."\"$layout\"".',
      theme: "semanticui",
      animation: {
        open: "animated bounceInRight",
        close: "animated bounceOutRight"
      }
    }).show();
    </script>';
  }
}