<?php
/**
*  This file is part of the RPCL project
*
*  Copyright (c) 2004-2008 qadram software S.L. <support@qadram.com>
*
*  Checkout AUTHORS file for more information on the developers
*
*  This library is free software; you can redistribute it and/or
*  modify it under the terms of the GNU Lesser General Public
*  License as published by the Free Software Foundation; either
*  version 2.1 of the License, or (at your option) any later version.
*
*  This library is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
*  Lesser General Public License for more details.
*
*  You should have received a copy of the GNU Lesser General Public
*  License along with this library; if not, write to the Free Software
*  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307
*  USA
*
*/
   require_once("rpcl/rpcl.inc.php");
   use_unit("designide.inc.php");

   setPackageTitle("System RPCL Components");
   setIconPath("./icons");

   registerComponents("System",array("Timer", "PaintBox"),"extctrls.inc.php");
   registerComponents("System",array("BasicAuthentication"),"auth.inc.php");
   registerComponents("System",array("StyleSheet"),"styles.inc.php");

   registerBooleanProperty("Timer","Enabled");

   registerBooleanProperty("CustomStyleSheet","IncludeStandard");
   registerBooleanProperty("CustomStyleSheet","IncludeID");
   registerBooleanProperty("CustomStyleSheet","IncludeSubStyle");
   registerPropertyEditor("CustomStyleSheet","FileName","TFilenamePropertyEditor","native");
?>
