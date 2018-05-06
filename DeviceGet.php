<?php
/**
 * 显示评论用户的手机信息
 *
 * @package DeviceGet
 * @author web1n
 * @version 1.0.0
 * @link http://https.vc
 */
class DeviceGet implements Typecho_Plugin_Interface {
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate() {
    }
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate() {
    }
    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form) {
        echo '<p>请在模板适当位置插入: <span style="color:#467B96;font-weight:bold;">&lt;?php echo DeviceGet::getDevice($comments->agent);  ?&gt;</span></p>';
        echo '<p>需要在评论中显示的内容:</p>';
        $showDevice = new Typecho_Widget_Helper_Form_Element_Checkbox('showDevice', array(1 => _t('手机型号')), NULL, NULL, NULL);
        $form->addInput($showDevice);
        $showVersion = new Typecho_Widget_Helper_Form_Element_Checkbox('showVersion', array(1 => _t('系统版本')), NULL, NULL, NULL);
        $form->addInput($showVersion);
    }
    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form) {
    }
    
    static public function getDevice($useragent) {
   $showDevice=Typecho_Widget::widget('Widget_Options')->plugin('DeviceGet')->showDevice;
    $showVersion = Typecho_Widget::widget('Widget_Options')->plugin('DeviceGet')->showVersion;
        if (preg_match('#Android([\s]{0,1})([a-zA-Z0-9.]+);([\s]{0,1})(([a-zA-Z]{2}-[a-zA-Z]{2};){0,6})([\s]{0,1})(.*)([\s]{0,1})Build#i', $useragent, $matches)) {
            $device = $matches[7];
            $version = $matches[2];
            return ($showDevice ? $device : null) .' '. ($showVersion ? 'Android ' . $version : null);
        } else if (preg_match('#iPhone([\s]{0,1})([a-zA-Z0-9]{0,10});([\s]{0,1})CPU iPhone OS ([0-9_]{3,5}) like Mac OS X#i', $useragent, $matches)) {
            $device = $matches[2];
            $version = $matches[4];
            return ($showDevice ? $device : null) .' '. ($showVersion ? 'IOS ' . $version : null);
        }
        return null;
    }
}

