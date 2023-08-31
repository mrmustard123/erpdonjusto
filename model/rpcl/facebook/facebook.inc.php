<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("stdctrls.inc.php");
use_unit('facebook/sdk/src/facebook.php');

global $fbapplication;

define('rmIFrame','rmIFrame');
define('rmFBML','rmFBML');

function getBooleanAttribute($name,$value)
{
  if ($value) $result=' '.$name.'="true" '; else $result=' '.$name.'="false" ';
  return($result);
}

function getBooleanIntegerAttribute($name,$value)
{
  if ($value) $result=' '.$name.'="1" '; else $result=' '.$name.'="0" ';
  return($result);
}


function getStringAttribute($name,$value)
{
  if ($value!='') $result=' '.$name.'="'.$value.'" '; else $result='';
  return($result);
}

function getString($name, $value)
{
  return(' '.$name.'="'.$value.'" ');
}


//Class definition
class FBApplication extends Component
{
    function __construct($aowner = null)
    {
        parent::__construct($aowner);

        $this->createFacebook();

        global $fbapplication;

        $fbapplication=$this;
    }

    function createFacebook()
    {
        $options=array();
        //TODO: Validate properties
        $options['appId']=$this->_applicationid;
        $options['secret']=$this->_applicationsecret;
        if ($this->_usecookies) $options['cookie']=true;
        if ($this->_cookiedomain!='') $options['domain']=$this->_cookiedomain;
        // Create our Application instance.
        $this->_facebook = new Facebook($options);

    }

    function UserID()
    {
      $this->requireLoggedUser();
      //Get data from login user
      $me=$this->_facebook->api('/me');
      return($me[id]);
    }

    function requireLoggedUser()
    {
      $session=$this->_facebook->getSession();
      if (!$session)
      {
        $url = $this->_facebook->getLoginUrl(array('canvas' => 1,'fbconnect' => 0));
        echo '<fb:redirect url="'.$url.'"/>';
      }
    }

    function loaded()
    {
      parent::loaded();
      $this->createFacebook();
    }

    protected $_facebook=null;

    function readFacebook() { return $this->_facebook; }
    function writeFacebook($value) { $this->_facebook=$value; }
    function defaultFacebook() { return null; }


    protected $_applicationid='';

    function getApplicationID() { return $this->_applicationid; }
    function setApplicationID($value) { $this->_applicationid=$value; }
    function defaultApplicationID() { return ''; }

    protected $_applicationsecret='';

    function getApplicationSecret() { return $this->_applicationsecret; }
    function setApplicationSecret($value) { $this->_applicationsecret=$value; }
    function defaultApplicationSecret() { return ''; }

    protected $_usecookies='1';

    function getUseCookies() { return $this->_usecookies; }
    function setUseCookies($value) { $this->_usecookies=$value; }
    function defaultUseCookies() { return '1'; }

    protected $_cookiedomain='';

    function getCookieDomain() { return $this->_cookiedomain; }
    function setCookieDomain($value) { $this->_cookiedomain=$value; }
    function defaultCookieDomain() { return ''; }

    protected $_rendermethod=rmIFrame;

    function getRenderMethod() { return $this->_rendermethod; }
    function setRenderMethod($value) { $this->_rendermethod=$value; }
    function defaultRenderMethod() { return rmIFrame; }

}

class FBPermissionRule extends Persistent
{
  public $_control=null;
  public $_tag='';

  function readOwner()
  {
    return($this->_control);
  }

  function renderbegin()
  {

  }

  function renderend()
  {
    if ($this->_tag!='') return('</fb:'.$this->_tag.'>');
    else return('');
  }
}

class FBUserAgent extends FBPermissionRule
{
    protected $_includes='';

    function getIncludes() { return $this->_includes; }
    function setIncludes($value) { $this->_includes=$value; }
    function defaultIncludes() { return ''; }

    protected $_excludes='';

    function getExcludes() { return $this->_excludes; }
    function setExcludes($value) { $this->_excludes=$value; }
    function defaultExcludes() { return ''; }

    function renderbegin()
    {
      $this->_tag='user-agent';
      $result='<fb:'.$this->_tag.' ';
      $result.=getStringAttribute('includes',$this->_includes);
      $result.=getStringAttribute('excludes',$this->_excludes);
      $result.='>';
      if ($result!='<fb:'.$this->_tag.' >') return($result);
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

define('wSearch'        ,'wSearch');
define('wProfile'       ,'wProfile');
define('wFriends'       ,'wFriends');
define('wNot_limited'   ,'wNot_limited');
define('wOnline'        ,'wOnline');
define('wStatusupdates' ,'wStatusupdates');
define('wWall'          ,'wWall');
define('wGroups'        ,'wGroups');
define('wPhotosofme'    ,'wPhotosofme');
define('wNotes'         ,'wNotes');
define('wFeed'          ,'wFeed');
define('wContact'       ,'wContact ');
define('wEmail'         ,'wEmail');
define('wAim'           ,'wAim');
define('wCell'          ,'wCell');
define('wPhone'         ,'wPhone');
define('wMailbox'       ,'wMailbox');
define('wAddress'       ,'wAddress');
define('wBasic'         ,'wBasic');
define('wEducation'     ,'wEducation');
define('wProfessional'  ,'wProfessional ');
define('wPersonal'      ,'wPersonal');
define('wSeasonal'      ,'wSeasonal');

class FBIfCanSee extends FBPermissionRule
{
    protected $_userid='';

    function getUserID() { return $this->_userid; }
    function setUserID($value) { $this->_userid=$value; }
    function defaultUserID() { return ''; }

    protected $_what=wSearch;

    function getWhat() { return $this->_what; }
    function setWhat($value) { $this->_what=$value; }
    function defaultWhat() { return wSearch; }

    function renderbegin()
    {
      $this->_tag='if-can-see';
      $result='<fb:'.$this->_tag.' ';
      if ($this->_userid!='')
      {
        $what=strtolower(substr($this->_what,1,strlen($this->_what)));
        $result.=getStringAttribute('uid',$this->_userid);
        $result.=getStringAttribute('what',$what);
      }
      $result.='>';
      if ($result!='<fb:'.$this->_tag.' >') return($result);
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

class FBIfCanSeePhoto extends FBPermissionRule
{
    protected $_photoid='';

    function getPhotoID() { return $this->_photoid; }
    function setPhotoID($value) { $this->_photoid=$value; }
    function defaultPhotoID() { return ''; }

    protected $_userid='';

    function getUserID() { return $this->_userid; }
    function setUserID($value) { $this->_userid=$value; }
    function defaultUserID() { return ''; }

    function renderbegin()
    {
      $this->_tag='if-can-see-photo';
      $result='<fb:'.$this->_tag.' ';
      $result.=getStringAttribute('pid',$this->_photoid);
      $result.=getStringAttribute('uid',$this->_userid);
      $result.='>';
      if ($result!='<fb:'.$this->_tag.' >') return($result);
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

class FBIfIsFriendsWithViewer extends FBPermissionRule
{
    protected $_userid='';

    function getUserId() { return $this->_userid; }
    function setUserId($value) { $this->_userid=$value; }
    function defaultUserId() { return ''; }

    protected $_includeself='1';

    function getIncludeSelf() { return $this->_includeself; }
    function setIncludeSelf($value) { $this->_includeself=$value; }
    function defaultIncludeSelf() { return '1'; }

    function renderbegin()
    {
      $this->_tag='if-is-friends-with-viewier';
      $result='<fb:'.$this->_tag.' ';
      $result.=getStringAttribute('uid',$this->_userid);
      $result.=getBooleanAttribute('includeself',$this->_includeself);
      $result.='>';
      if ($result!='<fb:'.$this->_tag.' >') return($result);
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

define('rMember','rMember');
define('rOfficer','rOfficer');
define('rAdmin','rAdmin');

class FBIfIsGroupMember extends FBPermissionRule
{
    protected $_groupid='';

    function getGroupID() { return $this->_groupid; }
    function setGroupID($value) { $this->_groupid=$value; }
    function defaultGroupID() { return ''; }

    protected $_userid='';

    function getUserId() { return $this->_userid; }
    function setUserId($value) { $this->_userid=$value; }
    function defaultUserId() { return ''; }

    protected $_role=rMember;

    function getRole() { return $this->_role; }
    function setRole($value) { $this->_role=$value; }
    function defaultRole() { return rMember; }

    function renderbegin()
    {
      $this->_tag='if-is-group-member';
      $result='<fb:'.$this->_tag.' ';
      $result.=getStringAttribute('gid',$this->_groupid);
      $result.=getStringAttribute('uid',$this->_userid);
      $role=strtolower(substr($this->_role,1,strlen($this->_role)));
      $result.=getStringAttribute('role',$role);
      $result.='>';
      if ($result!='<fb:'.$this->_tag.' >') return($result);
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

class FBIsInNetwork extends FBPermissionRule
{
    protected $_networkid='';

    function getNetworkId() { return $this->_networkid; }
    function setNetworkId($value) { $this->_networkid=$value; }
    function defaultNetworkId() { return ''; }

    protected $_userid='';

    function getUserId() { return $this->_userid; }
    function setUserId($value) { $this->_userid=$value; }
    function defaultUserId() { return ''; }

    function renderbegin()
    {
      $this->_tag='is-in-network';
      $result='<fb:'.$this->_tag.' ';
      $result.=getStringAttribute('network',$this->_networkid);
      $result.=getStringAttribute('uid',$this->_userid);
      $result.='>';
      if ($result!='<fb:'.$this->_tag.' >') return($result);
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

class FBRestrictedTo extends FBPermissionRule
{
    protected $_age='';

    function getAge() { return $this->_age; }
    function setAge($value) { $this->_age=$value; }
    function defaultAge() { return ''; }

    protected $_location='';

    function getLocation() { return $this->_location; }
    function setLocation($value) { $this->_location=$value; }
    function defaultLocation() { return ''; }

    protected $_type='';

    function getType() { return $this->_type; }
    function setType($value) { $this->_type=$value; }
    function defaultType() { return ''; }

    protected $_agedistribution=array();

    function getAgeDistribution() { return $this->_agedistribution; }
    function setAgeDistribution($value) { $this->_agedistribution=$value; }
    function defaultAgeDistribution() { return array(); }

    function renderbegin()
    {
      $this->_tag='restricted-to';
      $result='<fb:'.$this->_tag.' ';
      $result.=getStringAttribute('age',$this->_age);
      $result.=getStringAttribute('location',$this->_location);
      //TODO: agedistribution
      $result.=getStringAttribute('type',$this->_type);
      $result.='>';
      if ($result!='<fb:'.$this->_tag.' >') return($result);
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

class FBVisibleToAppUsers extends FBPermissionRule
{
    protected $_enable='0';

    function getEnable() { return $this->_enable; }
    function setEnable($value) { $this->_enable=$value; }
    function defaultEnable() { return '0'; }

    protected $_bgcolor='';

    function getBgColor() { return $this->_bgcolor; }
    function setBgColor($value) { $this->_bgcolor=$value; }
    function defaultBgColor() { return ''; }

    function renderbegin()
    {
      if ($this->_enable)
      {
        $this->_tag='visible-to-app-users';
        $result='<fb:'.$this->_tag.' ';
        $result.=getStringAttribute('bgcolor',$this->_bgcolor);
        $result.='>';
        return($result);
      }
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

class FBVisibleToConnection extends FBPermissionRule
{
    protected $_enable='0';

    function getEnable() { return $this->_enable; }
    function setEnable($value) { $this->_enable=$value; }
    function defaultEnable() { return '0'; }

    protected $_bgcolor='';

    function getBgColor() { return $this->_bgcolor; }
    function setBgColor($value) { $this->_bgcolor=$value; }
    function defaultBgColor() { return ''; }

    function renderbegin()
    {
      if ($this->_enable)
      {
        $this->_tag='visible-to-connection';
        $result='<fb:'.$this->_tag.' ';
        $result.=getStringAttribute('bgcolor',$this->_bgcolor);
        $result.='>';
        return($result);
      }
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

class FBVisibleToFriends extends FBPermissionRule
{
    protected $_enable='0';

    function getEnable() { return $this->_enable; }
    function setEnable($value) { $this->_enable=$value; }
    function defaultEnable() { return '0'; }

    protected $_bgcolor='';

    function getBgColor() { return $this->_bgcolor; }
    function setBgColor($value) { $this->_bgcolor=$value; }
    function defaultBgColor() { return ''; }

    function renderbegin()
    {
      if ($this->_enable)
      {
        $this->_tag='visible-to-friends';
        $result='<fb:'.$this->_tag.' ';
        $result.=getStringAttribute('bgcolor',$this->_bgcolor);
        $result.='>';
        return($result);
      }
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

class FBVisibleToOwner extends FBPermissionRule
{
    protected $_enable='0';

    function getEnable() { return $this->_enable; }
    function setEnable($value) { $this->_enable=$value; }
    function defaultEnable() { return '0'; }

    protected $_bgcolor='';

    function getBgColor() { return $this->_bgcolor; }
    function setBgColor($value) { $this->_bgcolor=$value; }
    function defaultBgColor() { return ''; }

    function renderbegin()
    {
      if ($this->_enable)
      {
        $this->_tag='visible-to-owner';
        $result='<fb:'.$this->_tag.' ';
        $result.=getStringAttribute('bgcolor',$this->_bgcolor);
        $result.='>';
        return($result);
      }
      else
      {
        $this->_tag='';
        return('');
      }
    }
}

define('sNone','sNone');
define('sProfile','sProfile');
define('sInfo','sInfo');

class FBPermission extends Component
{
    protected $_begin='';
    protected $_end='';

    protected $_ifcondition='1';

    function getIfCondition() { return $this->_ifcondition; }
    function setIfCondition($value) { $this->_ifcondition=$value; }
    function defaultIfCondition() { return '1'; }

    protected $_mobile='0';

    function getMobile() { return $this->_mobile; }
    function setMobile($value) { $this->_mobile=$value; }
    function defaultMobile() { return '0'; }

    protected $_useragent=null;

    function getUserAgent() { return $this->_useragent; }
    function setUserAgent($value) { if (is_object($value)) $this->_useragent=$value; }
    function defaultUserAgent() { return null; }

    protected $_ifcansee=null;

    function getIfCanSee() { return $this->_ifcansee; }
    function setIfCanSee($value) { if (is_object($value)) $this->_ifcansee=$value; }
    function defaultIfCanSee() { return null; }

    protected $_ifcanseephoto=null;

    function getIfCanSeePhoto() { return $this->_ifcanseephoto; }
    function setIfCanSeePhoto($value) { if (is_object($value)) $this->_ifcanseephoto=$value; }
    function defaultIfCanSeePhoto() { return null; }

    protected $_ifisappuser='';

    function getIfIsAppUser() { return $this->_ifisappuser; }
    function setIfIsAppUser($value) { $this->_ifisappuser=$value; }
    function defaultIfIsAppUser() { return ''; }

    protected $_ifisfriendswithviewer=null;

    function getIfIsFriendsWithViewer() { return $this->_ifisfriendswithviewer; }
    function setIfIsFriendsWithViewer($value) { if (is_object($value)) $this->_ifisfriendswithviewer=$value; }
    function defaultIfIsFriendsWithViewer() { return null; }

    protected $_ifisgroupmember=null;

    function getIfIsGroupMember() { return $this->_ifisgroupmember; }
    function setIfIsGroupMember($value) { if (is_object($value)) $this->_ifisgroupmember=$value; }
    function defaultIfIsGroupMember() { return null; }

    protected $_ifisuser='';

    function getIfIsUser() { return $this->_ifisuser; }
    function setIfIsUser($value) { $this->_ifisuser=$value; }
    function defaultIfIsUser() { return ''; }

    protected $_ifisverified='0';

    function getIfIsVerified() { return $this->_ifisverified; }
    function setIfIsVerified($value) { $this->_ifisverified=$value; }
    function defaultIfIsVerified() { return '0'; }

    protected $_isinnetwork=null;

    function getIsInNetwork() { return $this->_isinnetwork; }
    function setIsInNetwork($value) { if (is_object($value)) $this->_isinnetwork=$value; }
    function defaultIsInNetwork() { return null; }

    protected $_userid='';

    function getUserId() { return $this->_userid; }
    function setUserId($value) { $this->_userid=$value; }
    function defaultUserId() { return ''; }

    protected $_is18plus='0';

    function getIs18Plus() { return $this->_is18plus; }
    function setIs18Plus($value) { $this->_is18plus=$value; }
    function defaultIs18Plus() { return '0'; }

    protected $_is21plus='0';

    function getIs21Plus() { return $this->_is21plus; }
    function setIs21Plus($value) { $this->_is21plus=$value; }
    function defaultIs21Plus() { return '0'; }

    protected $_restrictedto=null;

    function getRestrictedTo() { return $this->_restrictedto; }
    function setRestrictedTo($value) { if (is_object($value)) $this->_restrictedto=$value; }
    function defaultRestrictedTo() { return null; }

    protected $_visibletoappusers=null;

    function getVisibleToAppUsers() { return $this->_visibletoappusers; }
    function setVisibleToAppUsers($value) { if (is_object($value)) $this->_visibletoappusers=$value; }
    function defaultVisibleToAppUsers() { return null; }

    protected $_visibletoconnection=null;

    function getVisibleToConnection() { return $this->_visibletoconnection; }
    function setVisibleToConnection($value) { if (is_object($value)) $this->_visibletoconnection=$value; }
    function defaultVisibleToConnection() { return null; }

    protected $_visibletofriends=null;

    function getVisibleToFriends() { return $this->_visibletofriends; }
    function setVisibleToFriends($value) { if (is_object($value)) $this->_visibletofriends=$value; }
    function defaultVisibleToFriends() { return null; }

    protected $_visibletoowner=null;

    function getVisibleToOwner() { return $this->_visibletoowner; }
    function setVisibleToOwner($value) { if (is_object($value)) $this->_visibletoowner=$value; }
    function defaultVisibleToOwner() { return null; }

    protected $_ifsectionnotadded=sNone;

    function getIfSectionNotAdded() { return $this->_ifsectionnotadded; }
    function setIfSectionNotAdded($value) { $this->_ifsectionnotadded=$value; }
    function defaultIfSectionNotAdded() { return sNone; }


    protected $_orpermission=null;

    function getORPermission() { return $this->_orpermission; }
    function setORPermission($value) { if (is_object($value)) $this->_orpermission=$value; }
    function defaultORPermission() { return null; }

    protected $_andpermission=null;

    function getANDPermission() { return $this->_andpermission; }
    function setANDPermission($value) { if (is_object($value)) $this->_andpermission=$value; }
    function defaultANDPermission() { return null; }

    function __construct($aowner = null)
    {
        parent::__construct($aowner);

        $this->_useragent=new FBUserAgent();
        $this->_useragent->_control=$this;

        $this->_ifcansee=new FBIfCanSee();
        $this->_ifcansee->_control=$this;

        $this->_ifcanseephoto=new FBIfCanSeePhoto();
        $this->_ifcanseephoto->_control=$this;

        $this->_ifisfriendswithviewer=new FBIfIsFriendsWithViewer();
        $this->_ifisfriendswithviewer->_control=$this;

        $this->_ifisgroupmember=new FBIfIsGroupMember();
        $this->_ifisgroupmember->_control=$this;

        $this->_isinnetwork=new FBIsInNetwork();
        $this->_isinnetwork->_control=$this;

        $this->_restrictedto=new FBRestrictedTo();
        $this->_restrictedto->_control=$this;

        $this->_visibletoappusers=new FBVisibleToAppUsers();
        $this->_visibletoappusers->_control=$this;

        $this->_visibletoconnection=new FBVisibleToConnection();
        $this->_visibletoconnection->_control=$this;

        $this->_visibletofriends=new FBVisibleToFriends();
        $this->_visibletofriends->_control=$this;

        $this->_visibletoowner=new FBVisibleToOwner();
        $this->_visibletoowner->_control=$this;
    }

    function render()
    {
      $this->_begin='';
      $this->_end='';

      //fb:if
      $this->_begin.='<fb:if value="'.$this->_ifcondition.'">';
      $this->_end='</fb:if>'.$this->_end;

      //fb:mobile
      if ($this->_mobile)
      {
        $this->_begin.='<fb:mobile>';
        $this->_end='</fb:mobile>'.$this->_end;
      }

      $this->_begin.=$this->_useragent->renderbegin();
      $this->_end=$this->_useragent->renderend().$this->_end;

      $this->_begin.=$this->_ifcansee->renderbegin();
      $this->_end=$this->_ifcansee->renderend().$this->_end;

      $this->_begin.=$this->_ifcanseephoto->renderbegin();
      $this->_end=$this->_ifcanseephoto->renderend().$this->_end;

      if ($this->_ifisappuser!='')
      {
        $this->_begin.='<fb:if-is-app-user uid="'.$this->_ifisappuser.'">';
        $this->_end='</fb:if-is-app-user>'.$this->_end;
      }

      $this->_begin.=$this->_ifisfriendswithviewer->renderbegin();
      $this->_end=$this->_ifisfriendswithviewer->renderend().$this->_end;

      $this->_begin.=$this->_ifisgroupmember->renderbegin();
      $this->_end=$this->_ifisgroupmember->renderend().$this->_end;

      if ($this->_ifisuser!='')
      {
        $this->_begin.='<fb:if-is-user uid="'.$this->_ifisuser.'">';
        $this->_end='</fb:if-is-user>'.$this->_end;
      }

      if ($this->_ifisverified)
      {
        $this->_begin.='<fb:if-is-verified>';
        $this->_end='</fb:if-is-verified>'.$this->_end;
      }

      $this->_begin.=$this->_isinnetwork->renderbegin();
      $this->_end=$this->_isinnetwork->renderend().$this->_end;

      if ($this->_userid!='')
      {
        $this->_begin.='<fb:user uid="'.$this->_userid.'">';
        $this->_end='</fb:user>'.$this->_end;
      }

      if ($this->_is18plus)
      {
        $this->_begin.='<fb:18-plus>';
        $this->_end='</fb:18-plus>'.$this->_end;
      }

      if ($this->_is21plus)
      {
        $this->_begin.='<fb:21-plus>';
        $this->_end='</fb:21-plus>'.$this->_end;
      }

      if ($this->_ifsectionnotadded!=sNone)
      {
        $section=strtolower(substr($this->_ifsectionnotadded,1,strlen($this->_ifsectionnotadded)));
        $this->_begin.='<fb:if-section-not-added section="'.$section.'">';
        $this->_end='</fb:if-section-not-added>'.$this->_end;
      }

      $this->_begin.=$this->_restrictedto->renderbegin();
      $this->_end=$this->_restrictedto->renderend().$this->_end;

      $this->_begin.=$this->_visibletoappusers->renderbegin();
      $this->_end=$this->_visibletoappusers->renderend().$this->_end;

      $this->_begin.=$this->_visibletoconnection->renderbegin();
      $this->_end=$this->_visibletoconnection->renderend().$this->_end;

      $this->_begin.=$this->_visibletofriends->renderbegin();
      $this->_end=$this->_visibletofriends->renderend().$this->_end;

      $this->_begin.=$this->_visibletoowner->renderbegin();
      $this->_end=$this->_visibletoowner->renderend().$this->_end;

    }

    function renderBegin()
    {
      $this->render();
      echo $this->_begin;
    }

    function renderEnd()
    {
      //The previous call to render will be performed by renderBegin()
      echo $this->_end;
    }
}

class FBControl extends Control
{
  protected $_image='';
  protected $_iconic=false;

  function dumpContents()
  {
    if (($this->ControlState & csDesigning)==csDesigning)
    {
      if ($this->_iconic)
      {
        echo "<table width=\"$this->Width\" style=\"border: 1px dotted #000000\" height=\"$this->Height\"><tr><td align=\"center\" valign=\"center\"><img src=\"$this->_image\"></td></tr></table>";
      }
      else echo "<img src=\"$this->_image\" />";
    }
    else
    {
      global $fbapplication;

      if ($fbapplication->RenderMethod==rmIFrame){

       $this->dumpFBCode();
       }
      else
      {
        $this->renderPermissionBegin();
        $this->dumpFBMLCode();
        $this->renderPermissionEnd();
      }
    }
  }

    protected $_permission=null;

    function getPermission() { return $this->_permission; }
    function setPermission($value) { $this->_permission=$this->fixupProperty($value); }
    function defaultPermission() { return null; }

    function renderPermissionBegin()
    {
      if ($this->_permission!=null)
      {
        $this->_permission->renderBegin();
      }
    }

    function renderPermissionEnd()
    {
      if ($this->_permission!=null)
      {
        $this->_permission->renderEnd();
      }
    }

    function loaded()
    {
      parent::loaded();
      $this->_permission=$this->fixupProperty($this->_permission);
    }

  function dumpFBCode()
  {
?>
<fb:serverFbml width="<?php echo $this->Width; ?>" height="<?php echo $this->Height; ?>">
    <script type="text/fbml">
      <fb:fbml>
<?php
    $this->dumpFBMLCode();
?>
      </fb:fbml>
    </script>
  </fb:serverFbml>
<?php

  }
}

/**
* Renders a CAPTCHA on your canvas page inside of a form
*/
class FBCaptcha extends FBControl
{
  function dumpFBMLCode()
  {
    echo '<fb:captcha ';
    echo getBooleanAttribute('showalways',$this->_showalways);
    echo ' />';
  }

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/captcha.gif';
        $this->Width=314;
        $this->Height=208;
        $this->ControlStyle='csFixedWidth=1';
        $this->ControlStyle='csFixedHeight=1';
    }


   protected $_showalways='0';
  /**
  * If it set true, Facebook will show a CAPTCHA to all users.
  * If it is not set, then only users with accounts unverified by Facebook will see the CAPTCHA
  * @return  boolean
  */
   function getShowAlways(){return $this->_showalways;}
   function setShowAlways($value){$this->_showalways=$value;}
   function defaultShowAlways(){return '0';}
}

/**
* Renders a predictive friend selector input for a given person.
*/
class FBFriendSelector extends FBControl
{
    function dumpFBMLCode()
    {
      echo "<fb:friend-selector ";
      echo getStringAttribute('uid',$this->_userid);
      echo getString('name',$this->Name);
      echo getStringAttribute('idname',$this->_idname);
      echo getBooleanAttribute('include_me',$this->_includeme);
      echo getStringAttribute('exclude_ids',$this->_excludeids);
      echo getBooleanAttribute('include_lists',$this->_includelists);
      echo getStringAttribute('prefill_id',$this->_prefillid);
      echo "/>";
    }

    protected $_userid='';

    /**
    * The user whose friends you can select.
    * Default value is the uid of the currently logged-in user
    * @return string
    */
    function getUserID() { return $this->_userid; }
    function setUserID($value) { $this->_userid=$value; }
    function defaultUserID() { return ''; }


    protected $_idname='friend_selector_id';

    /**
    * The name of the hidden form element that contains the user ID of the selected friend.
    * Default value is friend_selector_id
    * @return string
    */
    function getIDName() { return $this->_idname; }
    function setIDName($value) { $this->_idname=$value; }
    function defaultIDName() { return 'friend_selector_id'; }


    protected $_includeme='0';
    /**
    * Indicates whether or not to include the logged in user in the suggested options
    * Default value is false
    * @return boolean
    */
    function getIncludeMe() { return $this->_includeme; }
    function setIncludeMe($value) { $this->_includeme=$value; }
    function defaultIncludeMe() { return '0'; }


    protected $_excludeids='';

    /**
    * A list of user IDs to exclude from the selector.
    * (comma-separated)
    * @return string
    */
    function getExcludeIDs() { return $this->_excludeids; }
    function setExcludeIDs($value) { $this->_excludeids=$value; }
    function defaultExcludeIDs() { return array(); }


    protected $_includelists='0';
    /**
    * Indicates whether or not to include friend lists in the suggested options.
    * Default value is false
    * @return boolean
    */
    function getIncludeLists() { return $this->_includelists; }
    function setIncludeLists($value) { $this->_includelists=$value; }
    function defaultIncludeLists() { return '0'; }


    protected $_prefillid='';

    /**
    * A single user ID to pre-populate in the selector.
    * If the viewing user cannot see the prefilled user's name due to privacy, then this parameter will be ignored.
    * Note that this cannot be used inside an .
    * Default value is null
    * @return string
    */
    function getPrefillID() { return $this->_prefillid; }
    function setPrefillID($value) { $this->_prefillid=$value; }
    function defaultPrefillID() { return ''; }

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/friendselector.gif';
        $this->Width=153;
        $this->Height=22;
        $this->ControlStyle='csFixedWidth=1';
        $this->ControlStyle='csFixedHeight=1';
    }
}

/**
* Displays a discussion board with a unique identifier.
* Facebook handles pagination, topic display, posting and storage.
*/

class FBBoard extends FBControl
{
    /**
    * Generate the FBML tag for board
    */
    function dumpFBMLCode()
    {
        echo "<fb:board ";
        echo getStringAttribute('xid',$this->_xid);
        echo getBooleanAttribute('canpost',$this->_canpost);
        echo getBooleanAttribute('candelete',$this->_candelete);
        echo getBooleanAttribute('canmark',$this->_canmark);
        echo getBooleanAttribute('cancreatetopic',$this->_cancreatetopic);
        echo getStringAttribute('numtopics',$this->_numtopics);
        echo getStringAttribute('callbackurl',$this->_callbackurl);
        echo getStringAttribute('returnurl',$this->_returnurl);
        echo '/>';
        if($this->_title!=''){ echo '<fb:title>'.$this->_title.'</fb:title>';}
        echo "</fb:board>";

    }


    protected $_xid='';

    /**
    * The unique identifier for this board.
    * The board name can contain alphanumeric characters (Aa-Zz, 0-9), hyphens (-) and underscores (_) only.
    * @return string
    */
    function getXid(){ return $this->_xid;}
    function setXid($value){ $this->_xid=$value;}
    function defaultXid(){return '';}


    protected $_canpost='1';

     /**
    * Indicates whether the viewing user can post on this board.
    * Default value is true
    * @return boolean
    */
    function getCanPost(){return $this->_canpost;}
    function setCanPost($value){ $this->_canpost=$value;}
    function defaultCanPost(){return '1';}


    protected $_candelete='0';

    /**
    * Indicates whether the viewing user can delete any post or topic on this board.
    * Default value is false
    * @return boolean
    */
    function getCanDelete(){return $this->_candelete;}
    function setCanDelete($value){$this->_candelete=$value;}
    function defaultCanDelete(){return '0';}

    protected $_canmark='0';

    /**
    * Indicates whether the viewing user can mark a post as relevant or irrelevant.
    * Default value is false
    * @return boolean
    */
    function getCanMark(){return $this->_canmark;}
    function setCanMark($value){$this->_canmark=$value;}
    function defaultCanMark(){return '0';}

    protected $_cancreatetopic='1';

    /**
    * Indicates whether the viewing user can create a topic on this board.
    * Default value is true
    * @return boolean
    */
    function getCanCreateTopic(){return $this->_cancreatetopic;}
    function setCanCreateTopic($value){$this->_cancreatetopic=$value;}
    function defaultCanCreateTopic(){return '1';}


    protected $_numtopics=3;

    /**
    * The maximum number of topics to show in the box.
    * Default value is 3
    * @return integer
    */
    function getNumTopics(){return $this->_numtopics;}
    function setNumTopics($value){$this->_numtopics=$value;}
    function defaultNumTopics(){return 3;}

    protected $_callbackurl='';

    /**
    * The URL to refetch this configuration.
    * Default value is the current page
    * @return string
    */
    function getCallbackUrl(){return $this->_callbackurl;}
    function setCallbackUrl($value){$this->_callbackurl=$value;}
    function defaultCallbackUrl(){return '';}

    protected $_returnurl='';

    /**
    * The URL where the user is returned after selecting a "back" link.
    * Default value is the current page
    * @return string
    */
    function getReturnUrl(){return $this->_returnurl;}
    function setReturnUrl($value){$this->_returnurl=$value;}
    function defaultReturnUrl(){return '';}


    protected $_title='';

    /**
    * Define title of board
    * @return String
    */
    function getTitle(){return $this->_title;}
    function setTitle($value){$this->_title=$value;}
    function defaultTitle(){return '';}

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/board.png';
        $this->_iconic=true;
        $this->Width=153;
        $this->Height=87;
    }



}

define ('sbOnFacebook','sbOnFacebook');
define ('sbOffFacebook','sbOffFacebook');

/**
* Renders a button that lets a user bookmark your application or Facebook Connect website so a link to your application appears on the user's profile.
*/
class FBBookmark extends FBControl
{
    function dumpFBMLCode(){
       echo '<fb:bookmark ';
       switch ($this->_styleButton)
       {
          case sbOnFacebook: echo getString('type','on-facebook'); break;
          case sbOffFacebook: echo getString('type','off-facebook'); break;
       }
       echo "></fb:bookmark>";
    }


    protected $_styleButton=sbOnFacebook;

    /**
    * Define style used to display button
    * @return string
    */
    function getStyleButton(){return $this->_styleButton;}
    function setStyleButton($value){$this->_styleButton=$value;}
    function defaultStyleButton(){return sbOnFacebook;}

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/bookmark.png';
        $this->Width=118;
        $this->Height=22;
        $this->ControlStyle='csFixedWidth=1';
        $this->ControlStyle='csFixedHeight=1';
    }
}

/**
* Enables your users to initiate Facebook Chat with their friends from within your applications.
*/
Class FBChatInvite extends FBControl
{
    function dumpFBMLCode()
    {
      echo '<fb:chat-invite ';
      echo getStringAttribute('msg',$this->_message);
      echo getBooleanAttribute('condensed',$this->_condensed);
      echo getStringAttribute('exclude_ids',$this->_excludeids);
      echo '></fb:chat-invite>';
    }


    protected $_message='';

    /**
    * The default message that gets sent to the friend along with the chat invite.
    * You can use plain text only here.
    * However, if you include a URL, it gets formatted properly as a hyperlink.
    * @return string
    */
    function getMessage(){return $this->_message;}
    function setMessage($value){$this->_message=$value;}
    function defaultMessage(){return '';}

    protected $_condensed='0';

    /**
    * Indicates whether to display the user's profile pic and name, or just the user's name.
    * Default value is false
    * @return boolean
    */
    function getCondensed(){return $this->_condensed;}
    function setCondensed($value){$this->_condensed=$value;}
    function defaultCondensed(){return '0';}


    protected $_excludeids='';

    /**
    * A comma-separated list of user IDs to exclude from the chat invite.
    * @return string
    */
    function getExcludeIDs(){return $this->_excludeids;}
    function setExcludeIDs($value){$this->_excludeids=$value;}
    function defaultExcludeIDs(){return '';}

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/chat-invite.png';
        $this->Width=212;
        $this->Height=337;
        $this->ControlStyle='csFixedWidth=1';
        $this->ControlStyle='csFixedHeight=1';
    }
}

/**
* Displays a set of comments for a unique identifier.
* Facebook handles posting, drawing, and see all page.
*/
class FBComments extends FBControl{


    protected $_xid='';
    /**
    * The unique identifier for this set of comments.
    * Comments can contain alphanumeric characters (Aa-Zz, 0-9), hyphens (-), percent (%), period (.), and underscores (_) (in effect, the result of any urlencode can be a valid XID).
    * @return string
    */
    function getXid(){return $this->_xid;}
    function setXid($value){$this->_xid=$value;}
    function defaultXid(){ return '';}

    protected $_canpost='1';

    /**
    * Indicates whether the viewing users can post on this comment set
    * @return boolean
    */
    function getCanPost(){return $this->_canpost;}
    function setCanPost($value){$this->_canpost=$value;}
    function defaultCanPost(){return '1';}


    protected $_candelete='0';

    /**
    * Indicates whether the viewing user can delete any post on this comment set.
    * Any user visiting that user's profile where the comment appears can delete comments made to it (so, avoid using candelete unless this is the intended functionality).
    * @return boolean
    */
    function getCanDelete(){return $this->_candelete;}
    function setCanDelete($value){$this->_candelete=$value;}
    function defaultCanDelete(){return '0';}


    protected $_numposts=10;

    /**
    * The maximum number of posts to display.
    * You can set numposts to 0 to not display any comments, for moderation purposes.
    * Default value is 10
    * @return integer
    */
    function getNumPosts(){return $this->_numposts;}
    function setNumPosts($value){$this->_numposts=$value;}
    function defaultNumPosts(){return 10;}


    protected $_callbackurl='';

    /**
    * The URL to refetch this configuration.
    * Default value is the current page
    * @return string
    */
    function getCallbackUrl(){ return $this->_callbackurl;}
    function setCallbackUrl($value){$this->_callbackurl=$value;}
    function defaultCallbackUrl(){return '';}

    protected $_returnurl='';

    /*
    * The URL where the user is returned after selecting a "back" link.
    * Default value is the current page
    * @return string
    */
    function getReturnUrl(){return $this->_returnurl;}
    function setReturnUrl($value){$this->_returnurl=$value;}
    function defaultReturnUrl(){return '';}

    protected $_showform='1';
    /**
    * Boolean whether to show the form (canpost "true" only) for inline posting.
    * Posts using this form will not go to a see-all page after posting, but rather refresh the page.
    * @return boolean
    */
    function getShowForm(){return $this->_showform;}
    function setShowForm($value){$this->_showform=$value;}
    function defaultShowForm(){return '1';}

    protected $_sendnotificationuid='';

    /**
    * User ID to send a notification to upon someone posting a comment.
    * (Only one uid allowed).
    * @return integer
    */
    function getSendNotificationUid(){return $this->_sendnotificationuid;}
    function setSendNotificationUid($value){$this->_sendnotificationuid=$value;}
    function defaultSendNotificationUid(){return '';}


    protected $_publishfeed='0';

    /**
    * Indicates whether to publish a Feed story when the comment gets posted.
    * The comment must be at least 5 words in length in order to be published to Feed.
    * Note: The comment can be published to a user's Feed only if the user checks Post comment to my Facebook profile.
    * @return boolean
    */
    function getPublishFeed(){return $this->_publishfeed;}
    function setPublishFeed($value){$this->_publishfeed=$value;}
    function defaultPublishFeed(){return '0';}


    protected $_simple='0';

    /**
    * Removes the rounded box around the text area to allow greater customization.
    * @return boolean
    */
    function getSimple(){return $this->_simple;}
    function setSimple($value){$this->_simple=$value;}
    function defaultSimple(){return '0';}

    protected $_reverse='0';

    /**
    * Changes the order of comments and comment area to allow greater customization.
    * @return boolean
    */
    function getReverse(){return $this->_reverse;}
    function setReverse($value){$this->_reverse=$value;}
    function defaultReverse(){return '0';}

    protected $_title='';

    /**
    * Define title of comments
    * @return String
    */
    function getTitle(){return $this->_title;}
    function setTitle($value){$this->_title=$value;}
    function defaultTitle(){return '';}

    function dumpFBMLCode(){

      echo '<fb:comments ';
        echo getStringAttribute('xid',$this->_xid);
        echo getBooleanAttribute('canpost',$this->_canpost);
        echo getBooleanAttribute('candelete',$this->_candelete);
        echo getStringAttribute('numposts',$this->_numposts);
        echo getStringAttribute('callbackurl',$this->_callbackurl);
        echo getStringAttribute('returnurl',$this->_returnurl);
        echo getBooleanAttribute('showform',$this->_showform);
        echo getStringAttribute('send_notification_uid',$this->_sendnotificationuid);
        echo getBooleanAttribute('publish_feed',$this->_publishfeed);
        echo getBooleanAttribute('simple',$this->_simple);
        echo getBooleanAttribute('reverse',$this->_reverse);
      echo '>';

      if($this->_title!='')
      {
          echo '<fb:title>'.$this->_title.'</fb:title>';
      }

      echo '</fb:comments>';
    }

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/comments.gif';
        $this->Width=153;
        $this->Height=22;
//        $this->ControlStyle='csFixedWidth=1';
//        $this->ControlStyle='csFixedHeight=1';
    }

}

/**
* Renders an application-specific News Feed, which displays recent application stories about the logged in user's friends.
*/
class FBFeed extends FBControl
{
     protected $_title='News Feed';

     /**
     * The title that should be publish at the top of an application's News Feed.
     * Default value is News Feed
     * @return string
     */
     function getTitle(){return $this->_title;}
     function setTitle($value){$this->_title=$value;}
     function defaultTitle(){return 'News Feed';}

     protected $_numberstories=5;

     /**
     * The maximum number of stories that should be displayed in the News Feed.
     * @return integer
     */
     function getNumberStories(){return $this->_numberstories;}
     function setNumberStories($value){$this->_numberstories=$value;}
     function defaultNumberStories(){return 5;}

    function dumpContents()
    {
      if (($this->ControlState & csDesigning)==csDesigning)
      {
        echo "<table width=\"$this->Width\" style=\"border: 1px solid #8496ba\" height=\"$this->Height\"><tr><td align=\"left\" valign=\"top\"><img src=\"$this->_image\"></td></tr></table>";
      }
      else parent::dumpContents();
    }

     function dumpFBMLCode()
     {
        echo '<fb:feed ';
        echo getStringAttribute('title',$this->_title);
        echo getStringAttribute('max',$this->_numberstories);
        echo '/>';
     }

      function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/feed.png';
        $this->Width=545;
        $this->Height=195;
    }
}

/**
* Renders a multi-friend form entry field like the one used in the message composer
*/
class FBMultiFriendInput extends FBControl
{

    protected $_bordercolor='#8496ba';

    /**
    * The color of entry field border.
    * Default value is #8496ba
    * @return string
    */
    function getBorderColor(){return $this->_bordercolor;}
    function setBorderColor($value){$this->_bordercolor=$value;}
    function defaultBorderColor(){return '';}

    protected $_includeme='0';

    /**
    * Indicates whether or not to include the logged-in user in the form.
    * Default value is false
    * @return boolean
    */
    function getIncludeMe(){return $this->_includeme;}
    function setIncludeMe($value){$this->_includeme=$value;}
    function defaultIncludeMe(){return '0';}

    protected $_maxnumberpeople=20;

    /**
    * The maximum number or people that can be selected.
    * Default value is 20
    * @return integer
    */
    function getMaxNumberPeople(){return $this->_maxnumberpeople;}
    function setMaxNumberPeople($value){$this->_maxnumberpeople=$value;}
    function defaultMaxNumberPeople(){return 20;}

    protected $_excludeids='';

    /**
    * A comma separated list of user IDs to exclude from the selector.
    * @return string
    */
    function getExcludeIDs(){return $this->_excludeids;}
    function setExcludeIDs($value){$this->_excludeids=$value;}
    function defaultExcludeIDs(){return '';}

    protected $_prefillids='';

    /**
    * A comma separated list of user IDs to pre-populate in the selector.
    * @var String
    */
    function getPrefillIDs(){return $this->_prefillids;}
    function setPrefillIDs($value){$this->_prefillids=$value;}
    function defaultPrefillIDs(){return '';}

    protected $_prefilllocked='0';

    /**
    * Set to true to prevent editing of the pre-populated IDs.
    * @return boolean
    */
    function getPrefillLocked(){return $this->_prefilllocked;}
    function setPrefillLocked($value){$this->_prefilllocked=$value;}
    function defaultPrefillLocked(){return '0';}

    protected $_namearrayusers='';

    /**
    * The name that should be given to the array of selected user IDs. This defaults to ids for the first <fb:multi-friend-input>, and to fb_multi_friend_input_ids<n> for all by the first.
    * In general, you should include name attributes if you include more than one <fb:multi-friend-input> in a single page.
    * @return string
    */
    function getNameArrayUsers(){return $this->_namearrayusers;}
    function setNameArrayUsers($value){$this->_namearrayusers=$value;}
    function defaultNameArrayUsers(){return '';}

    function dumpContents()
    {
      if (($this->ControlState & csDesigning)==csDesigning)
      {
        echo "<table width=\"$this->Width\" style=\"border: 1px solid #8496ba\" height=\"$this->Height\"><tr><td align=\"center\" valign=\"center\"></td></tr></table>";
      }
      else parent::dumpContents();
    }

    function dumpFBMLCode()
    {
        echo '<fb:multi-friend-input ';
        echo getStringAttribute('width',$this->_width.'px');
        echo getStringAttribute('border_color',$this->_bordercolor);
        echo getBooleanAttribute('include_me',$this->_includeme);
        echo getStringAttribute('max',$this->_maxnumberpeople);
        echo getStringAttribute('exclude_ids',$this->_excludeids);
        echo getStringAttribute('prefill_ids',$this->_prefillids);
        echo getBooleanAttribute('prefill_locked',$this->_prefilllocked);
        echo getBooleanAttribute('name',$this->_namearrayusers);
        echo '/>';

    }
      function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/multifriendinput.gif';
        $this->Width=350;
        $this->Height=25;
        $this->ControlStyle='csFixedHeight=1';
    }

}

define ('fsbBoxCount','fsbBoxCount');
define ('fsbButtonCount','fsbButtonCount');
define ('fsbButton','fsbButton');
define ('fsbIcon','fsbIcon');
define ('fsbIconLink','fsbIconLink');

define ('sbcUrl','sbcUrl');
define ('sbcMeta','sbcMeta');
/**
* Renders a standard Share button in a canvas page for the specified URL or content.
*
*/
class FBShareButton extends FBControl
{

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/share-button.png';
        $this->Width=60;
        $this->Height=22;
        $this->ControlStyle='csFixedWidth=1';
        $this->ControlStyle='csFixedHeight=1';
    }

    function dumpFBMLCode()
    {
        global $fbapplication;

        if ($fbapplication->RenderMethod==rmIFrame)
        {
            echo '<fb:share-button ';
            echo getString('class','url');
            echo getStringAttribute('href',$this->_href);
            switch($this->_type)
            {
                case fsbBoxCount: echo getString('type','box_count'); break;
                case fsbButtonCount: echo getString('type','button_count'); break;
                case fsbButton: echo getString('type','button'); break;
                case fsbIcon: echo getString('type','icon'); break;
                case fsbIconLink: echo getString('type','icon_link'); break;
            }

            echo '></fb:share-button>';
        }
        else
        {
            echo '<fb:share-button ';
            switch($this->_class)
            {
                case sbcUrl:
                    echo getString('class','url');
                    echo getStringAttribute('href',$this->_href);
                    break;
                case sbcMeta:
                    echo getString('class','meta');
                    echo getStringAttribute('link',$this->_link);
                    echo getStringAttribute('meta',$this->_meta);
                    break;
            }
             echo '/>';
        }

    }

    protected $_class=sbcUrl;

    /**
    * The type of share button.
    * Valid values are url, to render a share of the URL specified with the href attribute, and meta, to render a share with the given data.
    * @return string
    */
    function getClass(){return $this->_class;}
    function setClass($value){$this->_class=$value;}
    function defaultClass(){return sbcUrl;}

    protected $_href='';

    /**
    * The reference URL to share.
    * This attribute is required for the url class only.
    * @return string
    */
    function getHref(){return $this->_href;}
    function setHref($value){$this->_href=$value;}
    function defaultHref(){return '';}


    protected $_meta='';

    /**
    * The metadata about the shared item.
    * See descriptions of the necessary data.
    * The meta class may contain this attribute.
    * @return  string
    */
    function getMeta(){return $this->_meta;}
    function setMeta($value){$this->_meta=$value;}
    function defaultMeta(){return '';}

    protected $_link='';

    /**
    * The content (such as image thumbnails) for the shared item.
    * See descriptions of the necessary data.
    * The meta class may contain this attribute.
    * @return string
    */
    function getLink(){return $this->_link;}
    function setLink($value){$this->_link=$value;}
    function defaultLink(){return '';}

    protected $_type=fsbIconLink;

    /**
    * This attribute must be one of: box_count, button_count, button, icon, or icon_link.
    * See descriptions and images describing each option.
    * The value for the attribute indicates how the Share button will be rendered; it does not affect functionality.
    * Default value is icon_link
    * @return string
    */
    function getType(){return $this->_type;}
    function setType($value){$this->_type=$value;}
    function defaultType(){return fsbIconLink;}
}

define ('fbaLeft','fbaLeft');
define ('fbaRight','fbaRight');
define ('fbaTop','fbaTop');
define ('fbaBottom','fbaBottom');
define ('fbaTopLeft','fbaTopLeft');
define ('fbaTopRight','fbaTopRight');
define ('fbaBottomLeft','fbaBottomLeft');
define ('fbaBottomRight','fbaBottomRight');
/**
* Renders a Flash-based FLV player that can stream arbitrary FLV (video/audio) files on the page.
*/
class FBFlv extends FBControl
{
     function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/flash.png';
        $this->_iconic=true;
        $this->Width=200;
        $this->Height=150;

    }

    function dumpFBMLCode()
    {
        echo '<fb:flv ';
        echo getStringAttribute('src',$this->_src);
        echo getStringAttribute('title',$this->_title);
        switch($this->_scale)
        {
            case fbsShowAll: echo getString('scale','showall'); break;
            case fbsNoBorder: echo getString('scale','noborder'); break;
            case fbsExactFit: echo getString('scale','exactfit'); break;
        }
        echo getStringAttribute('img',$this->_imagemovie);
        switch($this->_align)
        {
            case fbaLeft: echo getString('align','l'); break;
            case fbaRight: echo getString('align','r'); break;
            case fbaTop: echo getString('align','t'); break;
            case fbaBottom: echo getString('align','b'); break;
        }

        switch($this->_salign)
        {
            case fbaLeft: echo getString('salign','l'); break;
            case fbaRight: echo getString('salign','r'); break;
            case fbaTop: echo getString('salign','t'); break;
            case fbaBottom: echo getString('salign','b'); break;
        }
        echo getStringAttribute('color',$this->_color);
        echo '/>';
    }

    protected $_src='';

    /**
    * The URL of the FLV file. The URL must be absolute.
    * @return string
    */
    function getSrc(){return $this->_src;}
    function setSrc($value){$this->_src=$value;}
    function defaultSrc(){return '';}

    protected $_title='';

    /**
    * Name of the video.
    * The Title appears on the movie´s control bar
    * @return string
    */
    function getTitle(){return $this->_title;}
    function setTitle($value){$this->_title=$value;}
    function defaultTitle(){return '';}


    protected $_scale=fbsShowAll;

    /**
    * A Flash attribute.
    * How to scale the movie within the container
    * Specify one of showall (displays the whole movie, overriding container dimensions while maintaining the original aspect ratio of the container),
    * noborder (movie fills the container, without distortion but possibly with some cropping, while maintaining the original aspect ratio of the container),
    * or exactfit (movie dimensions match container dimensions, which may result in distortion).
    * Default value is showall
    * @return string
    */
    function getScale(){return $this->_scale;}
    function setScale($value){$this->_scale=$value;}
    function defaultScale(){return fbsShowAll;}

    protected $_imagemovie='';

    /**
    * The URL of the image displayed behind the play button begore the movie starts playing.
    * The URL must be absolute
    * @return string
    */
    function getImageMovie(){return $this->_imagemovie;}
    function setImageMovie($value){$this->_imagemovie=$value;}
    function defaultImageMovie(){return '';}

    protected $_align=fbaLeft;

    /**
    * A Flash attribute.
    * Determines where the FLV file is aligned within the container.
    * @return string
    */
    function getAlign(){return $this->_align;}
    function setAlign($value){$this->_align=$value;}
    function defaultAlign(){return fbaLeft;}

    protected $_salign=fbaLeft;

    /**
    * a Flash attribute.
    * Specifies where the scaled FLV file appears within the container based on its width and height settings
    * @return string
    */
    function getSalign(){return $this->_salign;}
    function setSalign($value){$this->_salign=$value;}
    function defaultSalign(){return fbaLeft;}

    protected $_color='#000000';

    /**
    * The hex value for background color while the movie plays.
    * Default value is #000000
    * @return string
    */
    function getColor(){return $this->_color;}
    function setColor($value){$this->_color=$value;}
    function defaultColor(){return '#000000';}
}

define ('fisYes','fisYes');
define ('fisNo','fisNo');
define ('fisAuto','fisAuto');
/**
* Inserts an <iframe> tag into an application canvas page; you cannot use the tag on the profile page (that is, application tabs and profile boxes).
* You cannot use FBML inside an iframe; use XFBML tags instead.
*/
class FBIframe extends FBControl{

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/iframe.gif';
        $this->Width=153;
        $this->Height=22;
    }

    protected $_src='';

    /**
    * The URL of the iframe. Signed GET parameters are appended to the URL to prove that the frame was loaded through Facebook, as described in the forms section.
    * These parameters also include one named fb_sig_in_iframe to indicate this context.
    * @return string
    */
    function getSrc(){return $this->_src;}
    function setSrc($value){$this->_src=$value;}
    function defaultSrc(){return '';}

    protected $_smartsize='0';

    /**
    * This parameter smartly sizes the iframe to fit the remaining space on the page and disables the outer scrollbars. If you include more than one smartsizing iframe, they automatically distribute the size appropriately.
    * Default value is false
    * @return boolean
    */
    function getSmartSize(){return $this->_smartsize;}
    function setSmartSize($value){$this->_smartsize=$value;}
    function defaultSmartSize(){return '0';}

    protected $_frameborder='0';

    /**
    * Indicates whether to show (true) or hide (false) an iframe border.
    * Default value is true
    * @return boolean
    */
    function getFrameBorder(){return $this->_frameborder;}
    function setFrameBorder($value){$this->_frameborder=$value;}
    function defaultFrameBorder(){return '0';}

    protected $_scrolling=fisYes;

    /**
    * Indicates whether to show scrollbars.
    * Default value is yes
    * @return string
    */
    function getScrolling(){return $this->_scrolling;}
    function setScrolling($value){$this->_scrolling=$value;}
    function defaultScrolling(){return fisYes;}

    protected $_style='';

    /**
    * Indicates a custom inline style for the iframe
    * @return string
    */
    function getStyle(){return $this->_style;}
    function setStyle($value){$this->_style=$value;}
    function defaultStyle(){return '';}

    protected $_resizable='0';

    /**
    * Gives the ability to set the iframe's size using the JavaScript API.
    * See Resizable IFrame for details.
    * You must specify a name for this iframe.
    * This option cannot be used when smartsize is enabled.
    * @return boolean
    */
    function getResizable(){return $this->_resizable;}
    function setResizable($value){$this->_resizable=$value;}
    function defaultResizable(){return '0';}

    protected $_includefbsig='1';

    /**
    * Setting this to false indicates that credential information is not sent to the site in the iframe.
    * This prevents external sites from stealing private information.
    * Default value is true
    * @return boolean
    */
    function getIncludeFBSig(){return $this->_includefbsig;}
    function setIncludeFBSig($value){$this->_includefbsig=$value;}
    function defaultIncludeFBSig(){return '1';}

    function dumpContents()
    {
      if (($this->ControlState & csDesigning)==csDesigning)
      {
        echo "<table width=\"$this->Width\" style=\"border: 1px solid #000000\" height=\"$this->Height\"><tr><td align=\"center\" valign=\"center\" style=\"font-family:Verdana; font-size: 11px;\">$this->_src</td></tr></table>";
      }
      else
      {
        parent::dumpContents();
      }
    }


    function dumpFBMLCode()
    {
        echo '<fb:iframe ';
        echo getStringAttribute('src',$this->_src);
        echo getBooleanAttribute('smartsize',$this->_smartsize);
        echo getBooleanIntegerAttribute('frameborder',$this->_frameborder);

        switch($this->_scrolling)
        {
            case fisYes: echo getString('scrolling','yes'); break;
            case fisNo: echo getString('scrolling','no'); break;
            case fisAuto: echo getString('scrolling','auto'); break;
        }

        echo getStringAttribute('style',$this->_style);
        echo getString('width',$this->Width);
        echo getString('height',$this->Height);
        echo getBooleanAttribute('resizable',$this->_resizable);
        echo getString('name',$this->_name);
        echo getBooleanAttribute('include_fb_sig',$this->_includefbsig);
        echo '/>';
    }

}

/*
*Renders a Flash-based audio player.
*/
class FBMp3 extends FBControl
{
      function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/mp3.gif';
        $this->ControlStyle='csFixedHeight=1';
        $this->Width=313;
        $this->Height=29;
    }

    protected $_src='';

    /**
    * The URL of the audio file. The URL must be absolute.
    * @return string
    */
    function getSrc(){return $this->_src;}
    function setSrc($value){$this->_src=$value;}
    function defaultSrc(){return '';}

    protected $_title='';

    /**
    * The name of the song.
    * @return string
    */
    function getTitle(){return $this->_title;}
    function setTitle($value){$this->_title=$value;}
    function defaultTitle(){return '';}

    protected $_artist='';

    /**
    * The name of the artist performing the song.
    * @return string
    */
    function getArtist(){return $this->_artist;}
    function setArtist($value){$this->_artist=$value;}
    function defaultArtist(){return '';}

    protected $_album='';

    /**
    * The title of the album
    * @return string
    */
    function getAlbum(){return $this->_album;}
    function setAlbum($value){$this->_album=$value;}
    function defaultAlbum(){return '';}

    function dumpContents()
    {
      if (($this->ControlState & csDesigning)==csDesigning)
      {

?>
<table width="<?php echo $this->Width; ?>" height="<?php echo $this->Height; ?>" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="68"><img src="<?php echo RPCL_HTTP_PATH; ?>/facebook/images/mp3_left.png"></td>
<td background="<?php echo RPCL_HTTP_PATH; ?>/facebook/images/mp3_center.png">&nbsp;</td>
<td width="34"><img src="<?php echo RPCL_HTTP_PATH; ?>/facebook/images/mp3_right.png"></td>
</tr>
</table>
<?php
      }
      else parent::dumpContents();
    }

    function dumpFBMLCode()
    {

        echo '<fb:mp3 ';
        echo getStringAttribute('src',$this->_src);
        echo getStringAttribute('title',$this->_title);
        echo getStringAttribute('artist',$this->_artist);
        echo getStringAttribute('album',$this->_album);
        echo getString('width',$this->Width);
        echo getString('height',$this->Height);
        echo "></fb:mp3>";
    }

}
/**
* Renders a Microsoft Silverlight control.
* On profile pages, an image appears first.
* When the user clicks the image, it turns into the control.
* On canvas pages, the image does not appear, and the Silverlight control is directly included.
*/
class FBSilverlight extends FBControl
{

    function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/silverlight.png';
        $this->_iconic=true;
        $this->Width=200;
        $this->Height=150;

    }

    protected $_silverlightsrc='';

    /**
    * The URL of the Silverlight control.
    * @return string
    */
    function getSilverlightSrc(){return $this->_silverlightsrc;}
    function setSilverlightSrc($value){$this->_silverlightsrc=$value;}
    function defaultSilverlightSrc(){return '';}

    protected $_imagesrc='';

    /**
    * The URL of the image (.gif and .jpg formats only).
    * Default value is http://static.ak.facebook.com/images/spacer.gif .
    * Note that this renders the Silverlight control unusable and invisible on profile pages
    * @return string
    */
    function getImageSrc(){return $this->_imagesrc;}
    function setImageSrc($value){$this->_imagesrc=$value;}
    function defaultImageSrc(){return '';}

    protected $_imagestyle='';

    /**
    * The style attribute for the image
    * @return string
    */
    function getImageStyle(){return $this->_imagestyle;}
    function setImageStyle($value){$this->_imagestyle=$value;}
    function defaultImageStyle(){return '';}

    protected $_imageclass='';

    /**
    * The class attribute for the image
    * @return string
    */
    function getImageClass(){return $this->_imageclass;}
    function setImageClass($value){$this->_imageclass=$value;}
    function defaultImageClass(){return '';}

    protected $_swfbgcolor='';

    /**
    * The hex-encoded background color for the Silverlight control.
    * @return string
    */
    function getSwfBgColor(){return $this->_swfbgcolor;}
    function setSwfBgColor($value){$this->_swfbgcolor=$value;}
    function defaultSwfBgColor(){return '';}

    function dumpFBMLCode()
    {
        echo '<fb:silverlight ';
        echo getStringAttribute('silverlightsrc',$this->_silverlightsrc);
        echo getStringAttribute('imgsrc',$this->_imagesrc);
        echo getStringAttribute('imgstyle',$this->_imagestyle);
        echo getStringAttribute('imgclass',$this->_imageclass);
        echo getStringAttribute('swfbgcolor',$this->_swfbgcolor);
        echo getString('width',$this->Width);
        echo getString('height',$this->Height);
        echo '/>';
    }
}


define ('fsqBest','fsqBest');
define ('fsqHigh','fsqHigh');
define ('fsqMedium','fsqMedium');
define ('fsqLow','fsqLow');

define ('fbsShowAll','fbsShowAll');
define ('fbsNoBorder','fbsNoBorder');
define ('fbsExactFit','fbsExactFit');

define ('fbwTransparent','fbwTransparent');
define ('fbwOpaque','fbwOpaque');
define ('fbwWindow','fbwWindow');

/**
* Renders a Shockwave Flash (SWF) object.
* On profile pages, an image appears first.
* When the user clicks the image, it turns into the Flash object.
* On canvas pages, the image is ignored, and the Flash object is directly included.
*/
class FBSwf extends FBControl
{
      function __construct($aowner = null)
    {
        parent::__construct($aowner);
        $this->_image=RPCL_HTTP_PATH.'/facebook/images/flash.png';
        $this->_iconic=true;
        $this->Width=200;
        $this->Height=150;

    }

    function dumpFBMLCode()
    {
        echo '<fb:swf ';
        echo getString('height',$this->Height);
        echo getString('width',$this->Width);
        echo getStringAttribute('swfsrc',$this->_swfsrc);
        echo getStringAttribute('imgsrc',$this->_imagesrc);
        echo getStringAttribute('imgstyle',$this->_imagestyle);
        echo getStringAttribute('imgclass',$this->_imageclass);
        echo getStringAttribute('flashvars',$this->_flashvars);
        //TODO: Check here for #color or color
        echo getStringAttribute('swfbgcolor',$this->_swfbgcolor);
        echo getBooleanAttribute('waitforclick',$this->_waitforclick);
        switch($this->_salign)
        {
            case fbaTop: echo getString('salign','t'); break;
            case fbaBottom: echo getString('salign','b'); break;
            case fbaLeft: echo getString('salign','l'); break;
            case fbaRight: echo getString('salign','r'); break;
            case fbaTopLeft: echo getString('salign','tl'); break;
            case fbaTopRight: echo getString('salign','tr'); break;
            case fbaBottomLeft: echo getString('salign','bl'); break;
            case fbaBottomRight: echo getString('salign','br'); break;
        }
        echo getBooleanAttribute('loop',$this->_loop);
        switch($this->_quality)
        {
            case fsqBest: echo getString('quality','best'); break;
            case fsqHigh: echo getString('quality','high'); break;
            case fsqMedium: echo getString('quality','medium'); break;
            case fsqLow: echo getString('quality','low'); break;
        }
        switch($this->_scale)
        {
            case fbsShowAll: echo getString('scale','showall'); break;
            case fbsNoBorder: echo getString('scale','noborder'); break;
            case fbsExactFit: echo getString('scale','exactfit'); break;
        }
        switch($this->_align)
        {
            case fbaLeft: echo getString('align','left'); break;
            case fbaRight: echo getString('align','right'); break;
            case fbaCenter: echo getString('align','center'); break;
        }
        switch($this->_wmode)
        {
            case fbwTransparent: echo getString('wmode','transparent'); break;
            case fbwOpaque: echo getString('wmode','opaque'); break;
            case fbwWindow: echo getString('wmode','window'); break;
        }
        echo '/>';


    }

    protected $_swfsrc='';

    /**
    * The URL of the Flash object.
    * The URL must be absolute.
    * @return string
    */
    function getSwfSrc(){return $this->_swfsrc;}
    function setSwfSrc($value){$this->_swfsrc=$value;}
    function defaultSwfSrc(){return '';}

    protected $_imagesrc='';

    /**
    * The URL of the image (.gif and .jpg formats only).
    * Default value is http://static.ak.facebook.com/images/spacer.gif;
    * Note that this renders the Flash object unusable and invisible on profile pages, if no height/width parameters are set.
    * @return string
    */
    function getImageSrc(){return $this->_imagesrc;}
    function setImageSrc($value){$this->_imagesrc=$value;}
    function defaultImageSrc(){return '';}

    protected $_imagestyle='';

    /**
    * The style attribute for the image.
    * @var String
    */
    function getImageStyle(){return $this->_imagestyle;}
    function setImageStyle($value){$this->_imagestyle=$value;}
    function defaultImageStyle(){return '';}

    protected $_imageclass='';

    /**
    * The class attribute for the image.
    * @return string
    */
    function getImageClass(){return $this->_imageclass;}
    function setImageClass($value){$this->_imageclass=$value;}
    function defaultImageClass(){return '';}

    protected $_flashvars='';

    /**
    * The URL-encoded Flash variables.
    * Also passes the fb_sig_ values as described in the section on Forms.
    * @return string
    */
    function getFlashVars(){return $this->_flashvars;}
    function setFlashVars($value){$this->_flashvars=$value;}
    function defaultFlashVars(){return '';}

    protected $_swfbgcolor='';

    /**
    * The hex-encoded background color for the Flash object.
    * By default, a Flash object's background defaults to transparent, so if you want a background color, specify one for this attribute.
    * @return string
    */
    function getSwfBgColor(){ return $this->_swfbgcolor;}
    function setSwfBgColor($value){$this->_swfbgcolor=$value;}
    function defaultSwfBgColor(){return '';}

    protected $_waitforclick='1';

    /**
    * Indicates whether to autoplay the Flash object (false) when allowed.
    * false does not work in profiles for security and aesthetic reasons, except after an AJAX call.
    * Default value is true
    * @return boolean
    */
    function getWaitForClick(){return $this->_waitforclick;}
    function setWaitForClick($value){$this->_waitforclick=$value;}
    function defaultWaitForClick(){return '1';}

    protected $_salign=fbaLeft;

    /**
    * The salign attribute from normal Flash <embed>.
    * Specify t (top), b (bottom) l (left), r (right) or a combination (tl, tr, bl, br)
    * @return string
    */
    function getSalign(){return $this->_salign;}
    function setSalign($value){$this->_salign=$value;}
    function defaultSalign(){return fbaLeft;}

    protected $_loop='0';

    /**
    * Indicates whether to play the Flash object continuously.
    * @return boolean
    */
    function getLoop(){return $this->_loop;}
    function setLoop($value){$this->_loop=$value;}
    function defaultLoop(){return '0';}

    protected $_quality=fsqBest;

    /**
    * Indicates the quality of the object.
    * Specify best, high, medium or low.
    * @return string
    */
    function getQuality(){return $this->_quality;}
    function setQuality($value){$this->_quality=$value;}
    function defaultQuality(){return fsqBest;}

    protected $_scale=fbsShowAll;

    /**
    * The scaling to apply to the object.
    * Specify showall, noborder, exactfit
    * @return string
    */
    function getScale(){return $this->_scale;}
    function setScale($value){$this->_scale=$value;}
    function defaultScale(){return fbsShowAll;}

    protected $_align=fbaLeft;

    /**
    * Indicates how the browser aligns the obect.
    * Specify left, center or right
    * @return string
    */
    function getAlign(){return $this->_align;}
    function setAlign($value){$this->_align=$value;}
    function defaultAlign(){return fbaLeft;}

    protected $_wmode=fbwTransparent;

    /**
    * Indicates the opacity setting for the object.
    * Specify transparent, opaque or window.
    * Default value is transparent
    * @return string
    */
    function getWMode(){return $this->_wmode;}
    function setWMode($value){$this->_wmode=$value;}
    function defaultWMode(){return fbwTransparent;}
}
?>