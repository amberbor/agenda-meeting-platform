<?php

namespace App\Helpers\Classes;

class Flash
{
    /**
     * @var string
     */
    private static $session_name = 'TOASTR_NOTIFICATIONS';

    /**
     * @param string $message
     */
    public static function info(string $message) : void
    {
        self::addNotification('info', __('Info!'), $message);
    }

    /**
     * @param string $message
     */
    public static function success(string $message) : void
    {
        self::addNotification('success', __('Success!'), $message);
    }

    /**
     * @param string $message
     */
    public static function warning(string $message) : void
    {
        self::addNotification('warning', __('Warning!'), $message);
    }

    /**
     * @param string $message
     */
    public static function error(string $message) : void
    {
        self::addNotification('error', __('Error!'), $message);
    }

    /**
     * @param string $type
     * @param string $title
     * @param string $message
     */
    public static function addNotification(string $type, string $title, string $message) : void
    {
        $notifications = [];

        if(session()->has(self::$session_name)){
            $notifications = session()->get(self::$session_name);
        }

        array_push($notifications, self::formatNotification($type, $title, $message));

        session()->flash(self::$session_name, $notifications);
    }

    /**
     * @param string $type
     * @param string $title
     * @param string $message
     * @return array
     */
    private static function formatNotification(string $type, string $title, string $message) : array
    {
        return [
            'type' => $type,
            'title' => $title,
            'message' => $message
        ];
    }
}
