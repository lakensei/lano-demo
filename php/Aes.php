<?php
/**
	加密模式：AES/CBC/PKCS5Padding
	加密初始化向量：长度为 16 的空字节数组
	测试用密钥：1234567890123456
	加密样例如下原文：
	abcdefghigklmnopqrstuvwxyz0123456789
	加密后：
	8Z3dZzqn05FmiuBLowExK0CAbs4TY2GorC2dDPVlsn/tP+VuJGePqIMv1uSaVErr
*/
class Aes
{
    /**
     * var string $method 加解密方法，可通过openssl_get_cipher_methods()获得
     */
    protected $method;

    /**
     * var string $secret_key 加解密的密钥
     */
    protected $secret_key='1234567890abcde'; 
 
    /**
     * var string $iv 加解密的向量
     */
    protected $iv;
 
    /**
     * var string $options （不知道怎么解释，目前设置为0没什么问题）
     */
    protected $options;
 
    /**
     * 构造函数
     * @param string $method 加密方式
     */
    public function __construct($method='AES-128-CBC')
    {
		error_reporting(E_ALL ^ E_WARNING);
        $this->method = $method;
        $this->iv = openssl_cipher_iv_length(16);
        $this->options = 0;
    }
 
    /**
     * 加密方法，对数据进行加密，返回加密后的数据
     *
     * @param string $data 要加密的数据
     *
     * @return string
     *
     */
    public function encrypt($data)
    {
		$ciphertext_raw = openssl_encrypt($data,$this->method, $this->secret_key, $this->options,$this->iv);
		return $ciphertext_raw;
		
	}
	
    /**
     * 解密方法，对数据进行解密，返回解密后的数据
     *
     * @param string $data 要解密的数据
     *
     * @return string
     *
     */
    public function decrypt($data)
    {
		$original_plaintext = openssl_decrypt($data, $this->method, $this->secret_key, $this->options, $this->iv);
		return $original_plaintext;

    }
}
