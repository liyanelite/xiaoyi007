<?php

function biz_url_ck( $BIZ_URLDB )
{
				global $db;
				global $_SERVER;
				global $HTTP_SERVER_VARS;
				global $PHP_SELF_TEMP;
				if ( !is_array( $BIZ_URLDB ) )
				{
								if ( 21090110 < date( "Ymd" ) )
								{
												exit( "aΪ�˱�֤���ϵͳ���и��ȶ�,���ܸ�ǿ��,�뵽�ٷ�ͬ��������,�ſ��Լ���ʹ��,лл����,������������,����ԭ��!!!" );
								}
				}
				else
				{
								$BIZ_URLDB[] = "localhost";
								$BIZ_URLDB[] = "localhost";
								$BIZ_URLDB[] = "localhost";
								$PHP_SELF_TEMP = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
								$PHP_SELF = $_SERVER['REQUEST_URI'] ? $_SERVER['REQUEST_URI'] : $PHP_SELF_TEMP;
								$HTTP_HOST = $_SERVER['HTTP_HOST'] ? $_SERVER['HTTP_HOST'] : $HTTP_SERVER_VARS['HTTP_HOST'];
								$WEBURL = $HTTP_HOST.$PHP_SELF;
								if ( !$WEBURL )
								{
												$allowuse = 1;
								}
								else
								{
												foreach ( $BIZ_URLDB as $key => $value )
												{
																if ( eregi( "^[-a-z0-9_\\.]*{$value}", $WEBURL ) )
																{
																				$allowuse = 1;
																}
												}
								}
								if ( !$allowuse )
								{
												exit( "���������Ϣ�����ʾ���İ�װ��ʽ����ȷ" );
								}
								return 1;
				}
}

function info_ck( )
{
}

function module_ck( $type )
{
				global $pre;
				global $BIZ_MODULEDB;
				if ( !is_array( $BIZ_MODULEDB ) )
				{
								if ( 21090110 < date( "Ymd" ) )
								{
												exit( "bΪ�˱�֤���ϵͳ���и��ȶ�,���ܸ�ǿ��,�뵽�ٷ�ͬ��������,�ſ��Լ���ʹ��,лл����,������������,����ԭ��!!!" );
								}
				}
				else
				{
								if ( !in_array( $type, $BIZ_MODULEDB ) )
								{
												exit( "�ط��Ż�ϵͳV1.6" );
								}
								return 1;
				}
}

if ( !function_exists( "AvoidGather" ) )
{
				exit( "F" );
}
unset( $BIZ_URLDB );
if ( 20100310 < date( "Ymd" ) )
{
}
$BIZ_URLDB[] = "localhost";
if ( $BIZID && $BIZ_URLDB )
{
				echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">";
				echo "�����ȨID��:<br>";
				echo md5( "{$BIZ_URLDB['0']}" );
				exit( );
}
$BIZ_MODULEDB[] = "house";
$BIZ_MODULEDB[] = "life";
$BIZ_MODULEDB[] = "fenlei";
$BIZ_MODULEDB[] = "coupon";
$BIZ_MODULEDB[] = "gift";
$BIZ_MODULEDB[] = "hr";
$BIZ_MODULEDB[] = "shop";
$BIZ_MODULEDB[] = "tg";

$life_more = 1;
$IS_BIZPhp168 = 1;
$IS_BIZ = 1;
biz_url_ck( $BIZ_URLDB );
?>
