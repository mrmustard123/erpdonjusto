<?php

require_once("rpcl/rpcl.inc.php");
use_unit("controls.inc.php");


define('csLight','csLigth');
define('csDark','csDark');

define('ftArial','ftArial');
define('ftLucidaGrande','ftLucidaGrande');
define('ftSegoeUi','ftSegoeUi');
define('ftTahoma','ftTahoma');
define('ftTrebuchetMs','ftTrebuchetMs');
define('ftVerdana','ftVerdana');

define('lsStandard','lsStandard');
define('lsButtonCount','lsButtonCount');

define('vdRecommend','vdRecommend');
define('vdLike','vdLike');

class SocialPlugins extends Control
{
    protected $_expandtofit=false;

    protected $_url='http://www.embarcadero.com';
    /**
    * The canonical URL of your object that will be used as its permanent ID in the graph
    * @return string
    */
    function readURL() { return $this->_url; }
    function writeURL($value) { $this->_url=$value; }
    function defaultURL() { return 'http://www.embarcadero.com'; }

    protected $_colorscheme=csLight;
    /**
    *  The color scheme used to component
    * @return enum
    */
    function readColorScheme() { return $this->_colorscheme; }
    function writeColorScheme($value) { $this->_colorscheme=$value; }
    function defaultColorScheme() { return csLight; }


    protected $_fontfacebook='';
    /**
    * The font type used with text of component
    * @return string
    */
    function readFontFacebook() { return $this->_fontfacebook; }
    function writeFontFacebook($value) { $this->_fontfacebook=$value; }
    function defaultFontFacebook() { return ''; }

    /**
    * The value used into iframe src
    */
    protected $_iframe;

    /**
    *  The name of image used in design time
    */
    protected $_image;


    protected $_header='0';
    /**
    *  The enable / disable option of display header of component
    * @return boolean
    */
    function readHeader() { return $this->_header; }
    function writeHeader($value) { $this->_header=$value; }
    function defaultHeader() { return '0'; }

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_colorscheme=csLight;
        $this->ControlStyle="csVerySlowRedraw=1";
    }

    function dumpContents()
    {
        if (($this->ControlState & csDesigning)==csDesigning)
        {
          if ($this->_expandtofit)
          {
            echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"$this->Width\" height=\"$this->Height\"><tr><td align=\"left\" valign=\"top\"><img src=\"$this->_image\" width=\"$this->Width\" height=\"$this->Height\" /></td></tr></table>";
          }
          else
          {
            echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"$this->Width\" height=\"$this->Height\"><tr><td align=\"left\" valign=\"top\"><img src=\"$this->_image\" /></td></tr></table>";
          }
        }
        else
        {
            if($this->_iframe!='')
            {
                echo "<iframe src='$this->_iframe' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:".$this->Width."px; height:".$this->Height."px;' allowTransparency='true'></iframe>";
            }
        }
    }

    /**
    * Used to return the correct value of ColorScheme
    * @return String
    */
    function textColorScheme()
    {
        switch($this->_colorscheme)
        {
            case csDark:
                return 'dark';
                break;
            case csLight:
                return 'light';
                break;
        }
    }
    /**
    *  Used to return the correct value of FontFacebook
    * @return String
    */
    function textFontFacebook(){

        switch($this->_fontfacebook)
        {
            case ftArial:
                return 'arial';
                break;
            case ftLucidaGrande:
                return 'lucida+grande';
                break;
            case ftSegoeUi:
                return 'segoe+ui';
                break;
            case ftTahoma:
                return 'tahoma';
                break;
            case ftTrebuchetMs:
                return 'trebuchet+ms';
                break;
            case ftVerdana:
                return 'verdana';
                break;
        }
    }
}


/**
* This component provides a Like Button component of Facebook
*
* More info: http://developers.facebook.com/docs/reference/plugins/like
*
*/

class LikeButton extends SocialPlugins
{
    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/likebutton.gif';
        $this->Height=32;
        $this->Width=212;
    }

    function dumpContents()
    {
      if (($this->ControlState & csDesigning)==csDesigning)
      {
        $leftimage='likebutton';
        if ($this->_verb==vdRecommend) $leftimage='recommendbutton';

        $scheme='_light';
        if ($this->_colorscheme==csDark) $scheme='_dark';

        $rightimage='like_text';
        if ($this->_layout==lsButtonCount) $rightimage='like_number';


        $leftimage=RPCL_HTTP_PATH.'/facebook/images/'.$leftimage.$scheme.'.png';
        $rightimage=RPCL_HTTP_PATH.'/facebook/images/'.$rightimage.$scheme.'.png';

        echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"$this->Width\" height=\"$this->Height\"><tr><td width=\"53\" align=\"left\" valign=\"top\"><img src=\"$leftimage\" /><td width=\"100%\" align=\"left\" valign=\"top\"><img src=\"$rightimage\" /></td></td></tr></table>";
      }
      else
      {
        if($this->_url!='')
        {
          $text="http://www.facebook.com/plugins/like.php?href=".$this->_url;
          switch($this->_layout)
          {
            case 'lsStandard': $text.="&layout=standard"; break;
            case 'lsButtonCount': $text.="&layout=button_count"; break;
          }

          $text.=(!$this->_showfaces)?'&show_faces=false':'&show_faces=true';

          if($this->Width<=450) $text.="&width=450";
          else $text.="&width=".$this->Width;

          switch($this->_verb)
          {
            case 'vdLike': $text.="&action=like";break;
            case 'vdRecommend': $text.="&action=recommend";break;
          }

          if($this->_fontfacebook!='')
          {
            $text.="&font=".$this->textFontFacebook();
          }
          $text.="&colorscheme=".$this->textColorScheme();
          $text.="&height=".$this->Height;
          $this->_iframe=$text;
          parent::dumpContents();
        }
      }
    }


    function dumpHeaderCode()
    {
        if(!defined('LIKEBUTTON'))
        {
            define('LIKEBUTTON',1);
            if($this->_title!=''){
                echo '<meta property="og:title" content="'.$this->_title.'"/>';
            }
            if($this->_siteName!='')
            {
                echo '<meta property="og:site_name" content="'.$this->_siteName.'"/>';
            }
            if($this->_imageSite!='')
            {
                echo '<meta property="og:image" content="'.$this->_imageSite.'"/>';
            }
        }
    }

    protected $_layout=lsStandard;

    /**
    * Get value of layout
    * Used to define the layout to display the LikeButton.
    * The options are 'lsStandard' and 'lsButtonCount'.
    * @return string
    */
    function getLayout(){return $this->_layout;}
    function setLayout($layout){$this->_layout=$layout;}
    function defaultLayout(){return lsStandard;}

    protected $_verb=vdLike;

    /**
    * Get the verb
    * Used to define the verb used into text of LikeButton.
    * The options are 'vdLike' and 'vdRecommend'.
    * @return String
    */
    function getVerb(){return $this->_verb;}
    function setVerb($verb){$this->_verb=$verb;}
    function defaultVerb(){return vdLike;}


    protected $_showfaces='0';

    /**
    * Used to enable / disable the display pictures of users.
    * @return Boolean
    */
    function getShowFaces(){return $this->_showfaces;}
    function setShowFaces($faces){ $this->_showfaces=$faces; }
    function defaultShowFaces(){return '0';}


    protected $_title='';

    /**
    * The title of your page; if not specified, the title element will be used.
    * @return String
    */
    function getTitle(){return $this->_title;}
    function setTitle($title){$this->_title=$title;}
    function defaultTitle(){return '';}

    protected $_siteName='';

    /**
    * The name of your web site, like "CNN" or "IMDb".
    * @return String
    */
    function getSiteName(){return $this->_siteName;}
    function setSiteName($site){$this->_siteName=$site;}
    function defaultSiteName(){return '';}

    protected $_imageSite='';

    /**
    * The URL of the best picture for this page. The image must be at least 50px by 50px and have a maximum aspect ratio of 3:1.
    * @return String
    */
    function getImageSite(){return $this->_imageSite;}
    function setImageSite($image){$this->_imageSite=$image;}
    function defaultImageSite(){return '';}

    function getURL() { return $this->readurl(); }
    function setURL($value) { $this->writeurl($value); }

    function getFontFacebook() { return $this->readfontfacebook(); }
    function setFontFacebook($value) { $this->writefontfacebook($value); }

    function getColorScheme() { return $this->readcolorscheme(); }
    function setColorScheme($value) { $this->writecolorscheme($value); }
}

/**
* This component provides a Like Box component of Facebook
*
* More info: http://developers.facebook.com/docs/reference/plugins/like-box
*
*/
class LikeBox extends SocialPlugins
{
    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->Height=255;
        $this->Width=297;
        //$this->ControlStyle='csFixedHeight=1';
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/likebox.png';
        $this->_connections=10;

    }

    function dumpContents()
    {
      if($this->_idPage!='')
      {
        $text="http://www.facebook.com/plugins/likebox.php?id=".$this->_idPage;

        $text.="&width=".$this->Width;
        $text.="&connections=".$this->_connections;
        $text.=(!$this->_stream)?'&stream=false':'&stream=true';
        $text.=(!$this->_header)?'&header=false':'&header=true';
        $text.="&height=".$this->Height;
        $this->_iframe=$text;
        echo "<iframe src='$this->_iframe' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:".$this->Width."px; height:".$this->Height."px;' allowTransparency='true'></iframe>";
      }
      else
      {
        $this->_expandtofit=true;
        parent::dumpContents();
      }
    }

    protected $_idPage='';

    /**
    * Used to define the idPage.
    * @return String
    */
    function getIdPage(){return $this->_idPage;}
    function setIdPage($idpage){$this->_idPage=$idpage;}
    function defaultIdPage(){return '';}

    protected $_connections=10;

    /**
    * Used to define de number of pictures display the LikeBox
    * @return Integer
    */
    function getConnections(){return $this->_connections;}
    function setConnections($connections){$this->_connections=$connections;}
    function defaultConnections(){return 10;}

    protected $_stream='0';

    /**
    * Used to enable / disable the visualization of the flow of the page associated with idPage
    * @return Boolean
    */
    function getStream(){return $this->_stream;}
    function setStream($stream)
    {
        $this->_stream=$stream;
        if($stream)
        {
            if($this->Height==255 || $this->Height==287)
                $this->Height+=300;
        }
        else
        {
            if($this->Height==555 || $this->Height==587)
                $this->Height-=300;
        }
    }
    function defaultStream(){return '0';}


    function getHeader() { return $this->readheader(); }
    function setHeader($value)
    {
      $this->writeheader($value);
        if($this->_header)
        {
            if($this->Height==555 || $this->Height==255)
            $this->Height+=32;
        }
        else
        {
            if($this->Height==287 || $this->Height==587)
              $this->Height-=32;
        }
    }
}


/**
* This component provides a Activity Feed component of Facebook
*
* More info : http://developers.facebook.com/docs/reference/plugins/activity
*/
class ActivityFeed extends SocialPlugins
{
    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->Height=300;
        $this->Width=300;
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/activityfeed.png';
    }

    function dumpContents()
    {
        if($this->_url!=''){
            $text="http://www.facebook.com/plugins/activity.php?site=".$this->_url;

            $text.="&width=".$this->Width;

            $text.="&colorscheme=".$this->textColorScheme();
            $text.="&recommendations=".$this->_recommendations;
            if($this->_fontfacebook!='')
                $text.="&font=".$this->textFontFacebook();
            $text.="&header=".$this->_header;
            $text.="&height=".$this->Height;
            if($this->_borderColor!='')
                $text.="&border_color=".$this->_borderColor;
            $this->_iframe=$text;
            echo "<iframe src='$this->_iframe' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:".$this->Width."px; height:".$this->Height."px;' allowTransparency='true'></iframe>";
        }
        else
        {
         $this->_expandtofit=true;
         parent::dumpContents();
        }
    }

    protected $_recommendations='0';

    /**
    *  Used to show the recommendations associated to url
    * @return Boolean
    */
    function getRecommendations(){return $this->_recommendations;}
    function setRecommendations($recommendations){$this->_recommendations=$recommendations;}
    function defaultRecommendations(){return '0';}

    protected $_borderColor='';

    /**
    * Used to define the border color of component
    * @return String
    */
    function getBorderColor(){return $this->_borderColor;}
    function setBorderColor($bordercolor){$this->_borderColor=$bordercolor;}
    function defaultBorderColor(){return '';}

    function getHeader() { return $this->readheader(); }
    function setHeader($value) { $this->writeheader($value); }

    function getUrl() { return $this->readurl(); }
    function setUrl($value) { $this->writeurl($value); }

    function getColorScheme() { return $this->readcolorscheme(); }
    function setColorScheme($value) { $this->writecolorscheme($value); }
}

/**
* This component provides a Live Stream component of Facebook
*
* More info: http://developers.facebook.com/docs/reference/plugins/live-stream
*
*/
class LiveStream extends SocialPlugins
{
    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->Width=400;
        $this->Height=500;
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/livestream.png';
    }

    function dumpContents()
    {
        if($this->_appId!='')
        {
            $text="http://www.facebook.com/plugins/livefeed.php?app_id=".$this->_appId;

            $text.="&width=".$this->_width;

            $text.="&height=".$this->_height;

            if($this->_xid!='')
                $text.="&xid=".$this->_xid;

            $this->_iframe=$text;
            echo "<iframe src='$this->_iframe' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:".$this->Width."px; height:".$this->Height."px;' allowTransparency='true'></iframe>";
        }
        else
        {
         $this->_expandtofit=true;
         parent::dumpContents();
        }

    }

    protected $_xid='';

    /**
    * Used to define unique id if used multiple stream.
    * @return String
    */
    function getXid(){return $this->_xid;}
    function setXid($xid){$this->_xid=$xid;}
    function defaultXid(){return '';}

    protected $_appId='';

    /**
    * Used to define appId associated to your application or apiKey
    * @return String;
    */
    function getAppId(){return $this->_appId;}
    function setAppId($appId){$this->_appId=$appId;}
    function defaultAppId(){return '';}
}
?>