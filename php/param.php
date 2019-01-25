<?php
class param
{
	protected $input;
	
	function __construct() 
	{
		$this->input=file_get_contents("php://input");
	}
	/**
     * 获取参数
     * @access public
     * @param  string  $param 变量名
     * @param  mixed   $default 默认值
     * @return mixed
     */
	public function input($param='',$default='')
	{
		if(isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD'] == "PUT"||$_SERVER['REQUEST_METHOD'] == "DELETE"){
			$this->httpHead('405');
			exit;
		}
		if(isset($_SERVER['CONTENT_TYPE'])&&false !== strpos($_SERVER['CONTENT_TYPE'], 'application/json')){
			$arr= json_decode($this->input, true);
			if($param){
				if (isset($arr[$param])) {
					if(!is_array($arr[$param])){
						return trim($arr[$param]);
					}else{
						return $arr[$param];
					}
					
				}else{
					return $default;
				}				
			}else{
				return $arr?$arr:$default;
			}			
		}else{
			if($param){
				if (isset($_GET[$param])) {
					return trim($_GET[$param]);
				}elseif (isset($_POST[$param])) {
					return trim($_POST[$param]);
				}else{
					return $default;
				}
			}else{
				if (empty($_POST)) {
					return $_GET?$_GET:$default;
				}else{
					return $_POST?$_POST:$default;
				}
			}
		}
	}
	
	/*http状态码*/
	public function httpHead($code)
	{
		$arr=[
			'100'=>"HTTP/1.1 100 Continue",
			'101'=>"HTTP/1.1 101 Switching Protocols",
			'200'=>"HTTP/1.1 200 OK",
			'201'=>"HTTP/1.1 201 Created",
			'202'=>"HTTP/1.1 202 Accepted",
			'203'=>"HTTP/1.1 203 Non-Authoritative Information",
			'204'=>"HTTP/1.1 204 No Content",
			'205'=>"HTTP/1.1 205 Reset Content",
			'206'=>"HTTP/1.1 206 Partial Content",
			'300'=>"HTTP/1.1 300 Multiple Choices",
			'301'=>"HTTP/1.1 301 Moved Permanently",
			'302'=>"HTTP/1.1 302 Found",
			'303'=>"HTTP/1.1 303 See Other",
			'304'=>"HTTP/1.1 304 Not Modified",
			'305'=>"HTTP/1.1 305 Use Proxy",
			'307'=>"HTTP/1.1 307 Temporary Redirect",
			'400'=>"HTTP/1.1 400 Bad Request",
			'401'=>"HTTP/1.1 401 Unauthorized",
			'402'=>"HTTP/1.1 402 Payment Required",
			'403'=>"HTTP/1.1 403 Forbidden",
			'404'=>"HTTP/1.1 404 Not Found",
			'405'=>"HTTP/1.1 405 Method Not Allowed",
			'406'=>"HTTP/1.1 406 Not Acceptable",
			'407'=>"HTTP/1.1 407 Proxy Authentication Required",
			'408'=>"HTTP/1.1 408 Request Time-out",
			'409'=>"HTTP/1.1 409 Conflict",
			'410'=>"HTTP/1.1 410 Gone",
			'411'=>"HTTP/1.1 411 Length Required",
			'412'=>"HTTP/1.1 412 Precondition Failed",
			'413'=>"HTTP/1.1 413 Request Entity Too Large",
			'414'=>"HTTP/1.1 414 Request-URI Too Large",
			'415'=>"HTTP/1.1 415 Unsupported Media Type",
			'416'=>"HTTP/1.1 416 Requested range not satisfiable",
			'417'=>"HTTP/1.1 417 Expectation Failed",
			'500'=>"HTTP/1.1 500 Internal Server Error",
			'501'=>"HTTP/1.1 501 Not Implemented",
			'502'=>"HTTP/1.1 502 Bad Gateway",
			'503'=>"HTTP/1.1 503 Service Unavailable",
			'504'=>"HTTP/1.1 504 Gateway Time-out"
		];
		header("$arr[$code]");
	}
	
}

/*
{
    "action":"query",
    "page":2
}
*/
$param = new param();
$param->input(); //["action"=>"query","page"=>2]
$param->input('action'); //query
