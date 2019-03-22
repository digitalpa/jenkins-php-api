<?php
/**
 * Created by PhpStorm.
 * User: a.puggioni
 * Date: 02/03/2019
 * Time: 11:19
 */

namespace JenkinsKhan\Jenkins;


class UrlsFactory
{
const JOB_ENABLE = '/job/%jobname%/enable';
const JOB_DISABLE = '/job/%jobname%/disable';
const JOB_CONFIG = '/job/%jobname%/api/json';

const VIEW_DELETE = '/view/%viewname%/doDelete';
const VIEW_CONFIG = '/view/%viewpath%';

    public static function getJobDisable($job)
    {
        if(is_string($job)){
            $jobname = $job;

        }else{
            $jobname = $job->getName();
        }
        return strtr(self::JOB_DISABLE,['%jobname%'=>$jobname]);
    }
    public static function getJobEnable($job)
    {
        if(is_string($job)){
            $jobname = $job;

        }else{
            $jobname = $job->getName();
        }

        return strtr(self::JOB_ENABLE,['%jobname%'=> rawurlencode($jobname)]);
    }

    public static function getJobConfig($job)
    {
        return strtr(self::JOB_CONFIG,['%jobname%'=> rawurlencode($job->getName())]);

    }

    public static function getViewDelete($view_name)
    {
        return strtr(self::VIEW_DELETE,['%viewname%'=> $view_name]);
    }

    public static function getViewConfig($viewName)
    {
        return strtr(self::VIEW_CONFIG,['%viewpath%'=> str_replace('/','/view/',trim($viewName,'/'))]);
    }
}