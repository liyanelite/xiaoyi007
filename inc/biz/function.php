<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function avoidgather( )
{
    global $rsdb;
    global $webdb;
    global $IS_BIZPhp168;
    if ( !$IS_BIZPhp168 )
    {
        return;
    }
    if ( $webdb[AvoidCopy] )
    {
        $rsdb[content] = "<body oncopy='return false' oncut='return false'>{$rsdb['content']}";
    }
    if ( $webdb[AvoidSave] )
    {
        $rsdb[content] = "{$rsdb['content']}<noscript><iframe scr='*.htm'></iframe></noscript>";
    }
    if ( !$webdb[AvoidGather] )
    {
        return;
    }
    $AvoidGatherpre = rands( 3 ).$webdb[AvoidGatherPre].rands( 3 );
    $rsdb[content] = "<div class='{$AvoidGatherpre}'>{$webdb['AvoidGatherString']}</div>{$rsdb['content']}<div class='{$AvoidGatherpre}'>{$webdb['AvoidGatherString']}</div>";
    $AvoidGatherpre = rands( 3 ).$webdb[AvoidGatherPre].rands( 3 );
    $rsdb[content] = str_replace( "<br>", "<br><div class='{$AvoidGatherpre}'>{$webdb['AvoidGatherString']}{$AvoidGatherpre}</div>", $rsdb[content] );
    $rsdb[content] = str_replace( "<BR>", "<BR><div class='{$AvoidGatherpre}'>{$webdb['AvoidGatherString']}{$AvoidGatherpre}</div>", $rsdb[content] );
    $AvoidGatherpre = rands( 3 ).$webdb[AvoidGatherPre].rands( 3 );
    $rsdb[content] = str_replace( "<p>", "<p><div class='{$AvoidGatherpre}'>{$webdb['AvoidGatherString']}{$AvoidGatherpre}</div>", $rsdb[content] );
}

function limt_ip( $type )
{
    global $webdb;
    global $ForceEnter;
    global $IS_BIZPhp168;
    global $onlineip;
    if ( !$IS_BIZPhp168 )
    {
    }
    else
    {
        if ( $type == "ForbidIp" && $webdb[ForbidIp] )
        {
            $detail = explode( "\r\n", $webdb[ForbidIp] );
            foreach ( $detail as $key => $value )
            {
                $value = trim( $value );
                if ( !$value )
                {
                    continue;
                }
                if ( ereg( "^{$value}", $onlineip ) )
                {
                    exit( "Forbid Ip!!" );
                }
            }
        }
        if ( $type == "AllowVisitIp" && $webdb[AllowVisitIp] )
        {
            $AllowVisit = 0;
            $detail = explode( "\r\n", $webdb[AllowVisitIp] );
            foreach ( $detail as $key => $value )
            {
                $value = trim( $value );
                if ( !$value )
                {
                    continue;
                }
                if ( ereg( "^{$value}", $onlineip ) )
                {
                    $AllowVisit = 1;
                }
            }
            if ( !$AllowVisit )
            {
                exit( "NO Allow Visit!!" );
            }
        }
        if ( $type == "AdminIp" && $ForceEnter == 0 && $webdb[AdminIp] )
        {
            $AllowVisit = 0;
            $detail = explode( "\r\n", $webdb[AdminIp] );
            foreach ( $detail as $key => $value )
            {
                $value = trim( $value );
                if ( !$value )
                {
                    continue;
                }
                if ( ereg( "^{$value}", $onlineip ) )
                {
                    $AllowVisit = 1;
                }
            }
            if ( !$AllowVisit )
            {
                exit( "NO Allow Login!!" );
            }
        }
    }
}

function biz_function( )
{
}

require_once( PHP168_PATH."inc/biz/biz.php" );
?>
