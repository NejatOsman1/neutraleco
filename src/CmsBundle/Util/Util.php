<?php

namespace App\CmsBundle\Util;

/**
 * Description of Util
 *
 * @author frcho
 */
class Util {

    /**
     * Convert dashes and underscores to camelCase
     *
     * @param  string  $string                   Input string
     * @param  boolean $capitalizeFirstCharacter Capitalize first character
     *
     * @return string                            Output string
     */
    public static function dashesToCamelCase($string = '', $capitalizeFirstCharacter = false){

        $str = str_replace(' ', '', ucwords(str_replace(['-', '_'], [' ', ' '], $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }

    /**
     *
     * @param type $time el tiempo que se quiere calcular siendo este dias, minutos, horas
     * @param type $type el tipo para el que se calcula el tiempo (h, d, m)
     * @param type $isSecondsToRealTime variable boolean para definir si se calcula para guardar o mostrar, por defecto es false e indica que se calcula para guardar
     * @return type String
     */
    public static function convertDaysHoursMinutes($time, $type, $isSecondsToRealTime = false) {

        $dayInSeconds = 86400;
        $hoursInSeconds = 3600;
        $minutesInSeconds = 60;
        /**
         * En la primera entrada se calcula el tiempo para mostrar en la interfaz el puesto por usuario
         * en el else se calcula el tiempo ingresado por el usuario para guardarlo en segundos
         */
        $result = null;
        if ($isSecondsToRealTime) {
            if ($type == "crontask.days" || $type == "days") {
                $result = $time / $dayInSeconds;
            }
            if ($type == "crontask.hours" || $type == "hours") {
                $result = $time / $hoursInSeconds;
            }
            if ($type == "crontask.minutes" || $type == "minutes") {
                $result = $time / $minutesInSeconds;
            }
        } else {
            if ($type == "crontask.days" || $type == "days") {
                $result = $time * $dayInSeconds / 1;
            }
            if ($type == "crontask.hours" || $type == "hours") {
                $result = $time * $hoursInSeconds / 1;
            }
            if ($type == "crontask.minutes" || $type == "minutes") {
                $result = $time * $minutesInSeconds / 1;
            }
        }

        return $result;
    }

}
