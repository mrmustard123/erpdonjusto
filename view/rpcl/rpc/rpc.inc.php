<?php
/*
   * qooxdoo - the new era of web development
   *
   * http://qooxdoo.org
   *
   * Copyright:
   *   2006-2007 Derrell Lipman
   *
   * License:
   *   LGPL: http://www.gnu.org/licenses/lgpl.html
   *   EPL: http://www.eclipse.org/org/documents/epl-v10.php
   *   See the LICENSE file in the project's top-level directory for details.
   *
   * Authors:
   *  * Derrell Lipman (derrell)
 */

/*
 * This is a simple JSON-RPC server.  We receive a service name in
 * dot-separated path format and expect to find the class containing the
 * service in a file of the service name (with dots converted to slashes and
 * ".php" appended).
 */

require "JSON.php";


/**
 * The location of the service class directories.
 */
define("servicePathPrefix",                "");



/*
 * Method Accessibility values
 *
 * Possible values are:
 *
 *   "public" -
 *     The method may be called from any session, and without any checking of
 *     who the Referer is.
 *
 *   "domain" -
 *     The method may only be called by a script obtained via a web page
 *     loaded from this server.  The Referer must match the request URI,
 *     through the domain part.
 *
 *   "session" -
 *     The Referer must match the Referer of the very first RPC request
 *     issued during the session.
 *
 *   "fail" -
 *     Access is denied
 */
define("Accessibility_Public",             "public");
define("Accessibility_Domain",             "domain");
define("Accessibility_Session",            "session");
define("Accessibility_Fail",               "fail");

/**
 * Default accessibility for methods when not overridden by the service class.
 */
define("defaultAccessibility",             Accessibility_Domain);



/**
 * JSON-RPC error origins
 */
define("JsonRpcError_Origin_Server",      1);
define("JsonRpcError_Origin_Application", 2);
define("JsonRpcError_Origin_Transport",   3); // never generated by server
define("JsonRpcError_Origin_Client",      4); // never generated by server



/*
 * JSON-RPC server-generated error codes
 */

/**
 * Error code, value 0: Unknown Error
 *
 * The default error code, used only when no specific error code is passed to
 * the JsonRpcError constructor.  This code should generally not be used.
 */
define("JsonRpcError_Unknown",      0);

/**
 * Error code, value 1: Illegal Service
 *
 * The service name contains illegal characters or is otherwise deemed
 * unacceptable to the JSON-RPC server.
 */
define("JsonRpcError_IllegalService",      1);

/**
 * Error code, value 2: Service Not Found
 *
 * The requested service does not exist at the JSON-RPC server.
 */
define("JsonRpcError_ServiceNotFound",     2);

/**
 * Error code, value 3: Class Not Found
 *
 * If the JSON-RPC server divides service methods into subsets (classes), this
 * indicates that the specified class was not found.  This is slightly more
 * detailed than "Method Not Found", but that error would always also be legal
 * (and true) whenever this one is returned.
 */
define("JsonRpcError_ClassNotFound",       3);

/**
 * Error code, value 4: Method Not Found
 *
 * The method specified in the request is not found in the requested service.
 */
define("JsonRpcError_MethodNotFound",      4);

/**
 * Error code, value 5: Parameter Mismatch
 *
 * If a method discovers that the parameters (arguments) provided to it do not
 * match the requisite types for the method's parameters, it should return
 * this error code to indicate so to the caller.
 */
define("JsonRpcError_ParameterMismatch",   5);

/**
 * Error code, value 6: Permission Denied
 *
 * A JSON-RPC service provider can require authentication, and that
 * authentication can be implemented such the method takes authentication
 * parameters, or such that a method or class of methods requires prior
 * authentication.  If the caller has not properly authenticated to use the
 * requested method, this error code is returned.
 */
define("JsonRpcError_PermissionDenied",    6);


define("ScriptTransport_NotInUse",         -1);

function SendReply($reply, $scriptTransportId)
{
    /* If not using ScriptTransport... */
    if ($scriptTransportId == ScriptTransport_NotInUse)
    {
        /* ... then just output the reply. */
        print $reply;
    }
    else
    {
        /* Otherwise, we need to add a call to a qooxdoo-specific function */
        $reply =
            "qx.io.remote.ScriptTransport._requestFinished(" .
            $scriptTransportId . ", " . $reply .
            ");";
        print $reply;
    }
}


/*
 * class JsonRpcError
 *
 * This class allows service methods to easily provide error information for
 * return via JSON-RPC.
 */
class JsonRpcError
{
    var             $json;
    var             $data;
    var             $id;
    var             $scriptTransportId;

    function JsonRpcError($json,
                          $origin = JsonRpcError_Origin_Server,
                          $code = JsonRpcError_Unknown,
                          $message = "Unknown error")
    {
        $this->json = $json;
        $this->data = array("origin"  => $origin,
                            "code"    => $code,
                            "message" => $message);

        /* Assume we're not using ScriptTransporrt */
        $this->scriptTransportId = ScriptTransport_NotInUse;
    }

    function SetOrigin($origin)
    {
        $this->data["origin"] = $origin;
    }

    function SetError($code, $message)
    {
        $this->data["code"] = $code;
        $this->data["message"] = $message;
    }

    function SetId($id)
    {
        $this->id = $id;
    }

    function SetScriptTransportId($id)
    {
        $this->scriptTransportId = $id;
    }

    function SendAndExit()
    {
        $error = $this;
        $id = $this->id;
        $ret = array("error" => $this->data,
                     "id"    => $id);
        SendReply($this->json->encode($ret), $this->scriptTransportId);
        exit;
    }
}

function debug($str)
{
    static $fw = null;
    if ($fw === null)
    {
        $fw = fopen("/tmp/phpinfo", "a");
    }
    fputs($fw, $str, strlen($str));
    fflush($fw);
}


/*
 * Start or join an existing session
 */
 if (session_id()=='') @session_start();

/*
 * Create a new instance of JSON and get the JSON-RPC request from
 * the POST data.
 */
$json = new JSON();
$error = new JsonRpcError($json);

/* Assume (default) we're not using ScriptTransport */
$scriptTransportId = ScriptTransport_NotInUse;

if (isset($_SERVER["REQUEST_METHOD"]))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    /*
     * For POST data, the only acceptable content type is application/json.
     */
  if (isset($_SERVER["CONTENT_TYPE"]))
  {
    switch($_SERVER["CONTENT_TYPE"])
    {
    case "application/json; charset=UTF-8":
    case "application/json":
        /* We found literal POSTed json-rpc data (we hope) */
        $input = file_get_contents('php://input');
        $jsonInput = $json->decode($input);
        break;

    default:
          //Try to guest if this is a json request or not
          $ctype=$_SERVER["CONTENT_TYPE"];
          $jsonpos=strpos($ctype,'application/json');
          if ($jsonpos===false)
          {
            /*
             * This request was not issued with JSON-RPC so echo the error rather
             * than issuing a JsonRpcError response.
             */
             //Do nothing, normal processing
          }
          else
          {
            $input = file_get_contents('php://input');
            $jsonInput = $json->decode($input);
            break;
          }

    }
}
}
else if ($_SERVER["REQUEST_METHOD"] == "GET" &&
         isset($_GET["_ScriptTransport_id"]) &&
         $_GET["_ScriptTransport_id"] != ScriptTransport_NotInUse &&
         isset($_GET["_ScriptTransport_data"]))
{
    /* We have what looks like a valid ScriptTransport request */
    $scriptTransportId = $_GET["_ScriptTransport_id"];
    $error->SetScriptTransportId($scriptTransportId);
    $input = $_GET["_ScriptTransport_data"];
    $jsonInput = $json->decode(stripslashes($input));
}
}

/* Ensure that this was a JSON-RPC service request */
if (! isset($jsonInput) ||
    ! isset($jsonInput->service) ||
    ! isset($jsonInput->method) ||
    ! isset($jsonInput->params))
{
        //Do nothing here!
}
else
{
/*
 * Ok, it looks like JSON-RPC, so we'll return an Error object if we encounter
 * errors from here on out.
 */
$error->SetId($jsonInput->id);

/*
 * Ensure the requested service name is kosher.  A service name should be:
 *
 *   - a dot-separated sequences of strings; no adjacent dots
 *   - first character of each string is in [a-zA-Z]
 *   - other characters are in [_a-zA-Z0-9]
 */

/* First check for legal characters */
if (ereg("^[_.a-zA-Z0-9]+$", $jsonInput->service) === false)
{
    /* There's some illegal character in the service name */
    $error->SetError(JsonRpcError_IllegalService,
                     "Illegal character found in service name.");
    $error->SendAndExit();
    /* never gets here */
}

/* Now ensure there are no double dots */
if (strstr($jsonInput->service, "..") !== false)
{
    $error->SetError(JsonRpcError_IllegalService,
                     "Illegal use of two consecutive dots in service name");
    $error->SendAndExit();
}

/* Explode the service name into its dot-separated parts */
$serviceComponents = explode(".", $jsonInput->service);

/* Ensure that each component begins with a letter */
for ($i = 0; $i < count($serviceComponents); $i++)
{
    if (ereg("^[a-zA-Z]", $serviceComponents[$i]) === false)
    {
        $error->SetError(JsonRpcError_IllegalService,
                         "A service name component does not begin with a letter");
        $error->SendAndExit();
        /* never gets here */
    }
}

/*
 * Now replace all dots with slashes so we can locate the service script.  We
 * also retain the exploded components of the path, as the class name of the
 * service is the last component of the path.
 */
//$servicePath = implode("/", $serviceComponents);

/* Try to load the requested service */
//if ((@include servicePathPrefix . $servicePath . ".php") === false)
//{
    /* Couldn't find the requested service */
//    $error->SetError(JsonRpcError_ServiceNotFound,
//                     "Service `$servicePath` not found.");
//    $error->SendAndExit();
    /* never gets here */
//}

/* The service class is the last component of the service name */
//$className = "class_" . $serviceComponents[count($serviceComponents) - 1];

/* Ensure that the class exists */
//if (! class_exists($className))
//{
//    $error->SetError(JsonRpcError_ClassNotFound,
//                     "Service class `$className` not found.");
//    $error->SendAndExit();
    /* never gets here */
//}

/* Instantiate the service */
//$service = new $className();

$form=$serviceComponents[0];
$object=$serviceComponents[1];

global $$form;

$page=$$form;

if (empty($page))
{
    $error->SetError(JsonRpcError_ServiceNotFound, "Service `$form` not found.");
    $error->SendAndExit();
}

$service=$page->$object;

if (empty($service))
{
    $error->SetError(JsonRpcError_ClassNotFound, "Component `$object` not found.");
    $error->SendAndExit();
}

/*
 * Do referer checking.  There is a global default which can be overridden by
 * each service for a specified method.
 */

/* Assign the default accessibility */
$accessibility = defaultAccessibility;

/*
 * See if there is a "ReadAccessibility" method in the class.  If there is, it
 * should take two parameters: the method name and the default accessibility,
 * and return one of the Accessibililty values.
 */
if (method_exists($service, "readAccessibility"))
{
    /* Yup, there is.  Get the accessibility for the requested method */
    $accessibility = $service->ReadAccessibility($jsonInput->method,
                                                $accessibility);
}

/* Do the accessibility test. */
switch($accessibility)
{
case Accessibility_Public:
    /* Nothing to do.  The method is accessible. */
    break;

case Accessibility_Domain:
    /* Determine the protocol used for the request */
    if (isset($_SERVER["SSL_PROTOCOL"]))
    {
        $requestUriDomain = "https://";
    }
    else
    {
        $requestUriDomain = "http://";
    }

    // Add the server name
    $requestUriDomain .= $_SERVER["SERVER_NAME"];

    // The port number optionally follows.  We don't know if they manually
    // included the default port number, so we just have to assume they
    // didn't.
    if ((! isset($_SERVER["SSL_PROTOCOL"]) && $_SERVER["SERVER_PORT"] != 80) ||
        (  isset($_SERVER["SSL_PROTOCOL"]) && $_SERVER["SERVER_PORT"] != 443))
    {
        // Non-default port number, so append it.
        $requestUriDomain .= ":" . $_SERVER["SERVER_PORT"];
    }

    /* Get the Referer, up through the domain part */
    if (ereg("^(https?://[^/]*)", $_SERVER["HTTP_REFERER"], $regs) === false)
    {
        /* unrecognized referer */
        $error->SetError(JsonRpcError_PermissionDenied,
                         "Permission Denied [2]");
        $error->SendAndExit();
        /* never gets here */
    }

    /* Retrieve the referer component */
    $refererDomain = $regs[1];

    /* Is the method accessible? */
    if ($refererDomain != $requestUriDomain)
    {
        /* Nope. */
        $error->SetError(JsonRpcError_PermissionDenied,
                         "Permission Denied [3]");
        $error->SendAndExit();
        /* never gets here */
    }

    /* If no referer domain has yet been saved in the session... */
    if (! isset($_SESSION["session_referer_domain"]))
    {
        /* ... then set it now using this referer domain. */
        $_SESSION["session_referer_domain"] = $refererDomain;
    }
    break;

case Accessibility_Session:
    /* Get the Referer, up through the domain part */
    if (ereg("(((http)|(https))://[^/]*)(.*)",
             $_SERVER["HTTP_REFERER"],
             $regs) === false)
    {
        /* unrecognized referer */
        $error->SetError(JsonRpcError_PermissionDenied,
                         "Permission Denied [4]");
        $error->SendAndExit();
        /* never gets here */
    }

    /* Retrieve the referer component */
    $refererDomain = $regs[1];

    /* Is the method accessible? */
    if (isset($_SESSION["session_referer_domain"]) &&
        $refererDomain != $_SESSION["session_referer_domain"])
    {
        /* Nope. */
        $error->SetError(JsonRpcError_PermissionDenied,
                         "Permission Denied [5]");
        $error->SendAndExit();
        /* never gets here */
    }
    else if (! isset($_SESSION["session_referer_domain"]))
    {
        /* No referer domain is yet saved in the session.  Save it. */
        $_SESSION["session_referer_domain"] = $refererDomain;
    }

    break;

case Accessibility_Fail:
    $error->SetError(JsonRpcError_PermissionDenied,
                     "Permission Denied [6]");
    $error->SendAndExit();
    /* never gets here */
    break;

default:
    /* Service's ReadAccessibility() function returned a bogus value */
    $error->SetError(JsonRpcError_PermissionDenied,
                     "Service error: unknown accessibility.");
    $error->SendAndExit();
    /* never gets here */
}

/* Now that we've instantiated service, we should find the requested method */
$method = $jsonInput->method;
if (! method_exists($service, $method))
{
    $error->SetError(JsonRpcError_MethodNotFound,
                     "Method `$method` not found " .
                     "in service class `$className`.");
    $error->SendAndExit();
    /* never gets here */
}

/* Errors from here on out will be Application-generated */
$error->SetOrigin(JsonRpcError_Origin_Application);

/* Call the requested method passing it the provided params */
$output = $service->$method($jsonInput->params, $error);

/* See if the result of the function was actually an error */
if (get_class($output) == "JsonRpcError")
{
    /* Yup, it was.  Return the error */
    $error->SendAndExit();
    /* never gets here */
}

/* Give 'em what they came for! */
$ret = array("result" => $output,
             "id"     => $jsonInput->id);

SendReply($json->encode($ret), $scriptTransportId);
exit;
}

?>