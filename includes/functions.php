<?php

function dateFormat($date, $from, $to)
{
    $dateObj = DateTime::createFromFormat($from, $date);

    if ($dateObj !== false) {
        $minDate = '1000-01-01';
        $maxDate = '9999-12-31';
        $minDateObj = DateTime::createFromFormat('Y-m-d', $minDate);
        $maxDateObj = DateTime::createFromFormat('Y-m-d', $maxDate);
        if ($dateObj >= $minDateObj && $dateObj <= $maxDateObj) {
            return $dateObj->format($to);
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function calculateAge($birthdate)
{
    $birthdateObj = DateTime::createFromFormat('Y-m-d', $birthdate);

    $currentDateObj = new DateTime();

    $ageInterval = $currentDateObj->diff($birthdateObj);

    return $ageInterval->y;
}

function alert($text)
{
    echo "<script>alert('{$text}')</script>";
}
