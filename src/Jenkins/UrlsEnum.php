<?php
/**
 * Created by PhpStorm.
 * User: a.puggioni
 * Date: 02/03/2019
 * Time: 11:19
 */

namespace JenkinsKhan\Jenkins;


class UrlsEnum
{
const JOB_ENABLE = '/job/%jobname%/enable';
const JOB_DISABLE = '/job/%jobname%/disable';
const JOB_CONFIG = '/job/%jobname%/api/json';

    public static function getJobDisable(Job $job)
    {
        return strtr(self::JOB_DISABLE,['%jobname%'=>$job->getName()]);
    }
    public static function getJobEnable(Job $job)
    {
        return strtr(self::JOB_ENABLE,['%jobname%'=> rawurlencode($job->getName())]);
    }

    public static function getJobConfig($job)
    {
        return strtr(self::JOB_CONFIG,['%jobname%'=> rawurlencode($job->getName())]);

    }
}