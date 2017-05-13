<?php
    function GetMainInfo() 
    {
        $url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=Minsk&mode=json&units=metric&cnt=4&lang=en&appid=23b4abe43b4554582b08aa8e8a599f24";
        $data = @file_get_contents($url);
        if ($data) 
        {
            $data_json = json_decode($data);
            $neededDays = $data_json->list;
            return $neededDays;
        }
        else return null;
    }

    function GetDayInfo($info, $dayNum)
    {
        return GetNightTemperature($info, $dayNum) . " at night" . "<br/>" . GetMorningTemperature($info, $dayNum) . " in morning" . "<br/>" . GetDayTemperature($info, $dayNum) . "main day" . "<br/>" . GetEverningTemperature($info, $dayNum) . " in everning" . "<br/>" . GetWind($info, $dayNum) . " is wind speed" . "<br/>" . GetPressure($info, $dayNum) . " pressure that day" . "<br/>" . GetHumidity($info, $dayNum) . " humidity" . "<br/>" . GetClouds($info, $dayNum) . " it's clodness";
    }

    function GetDayDate($neededDays, $dayNum) { return $neededDays[$dayNum]->dt; }

    function GetMorningTemperature($neededDays, $dayNum) 
    {
        return ($neededDays[$dayNum]->temp->morn > 0 ? "+" . $neededDays[$dayNum]->temp->morn : $neededDays[$dayNum]->temp->morn) . "&deg";
    }

    function GetDayTemperature($neededDays, $dayNum)
    {
        return ($neededDays[$dayNum]->temp->day > 0 ? "+" . $neededDays[$dayNum]->temp->day : $neededDays[$dayNum]->temp->day) . "&deg";
    }

    function GetEverningTemperature($neededDays, $dayNum)
    {
        return ($neededDays[$dayNum]->temp->eve > 0 ? "+" . $neededDays[$dayNum]->temp->eve : $neededDays[$dayNum]->temp->eve) . "&deg";
    }

    function GetNightTemperature($neededDays, $dayNum)
    {
        return ($neededDays[$dayNum]->temp->night > 0 ? "+" . $neededDays[$dayNum]->temp->night : $neededDays[$dayNum]->temp->night) . "&deg";
    }

    function GetClouds($neededDays, $dayNum) { return $neededDays[$dayNum]->clouds . "%"; }

    function GetHumidity($neededDays, $dayNum) { return $neededDays[$dayNum]->humidity . "%"; }

    function GetPressure($neededDays, $dayNum) { return $neededDays[$dayNum]->pressure . " hPa"; }

    function GetWind($neededDays, $dayNum) { return $neededDays[$dayNum]->speed . " m/s"; }

    function GetSkyIcon($neededDays, $dayNum)
    {
        $icon = $neededDays[$dayNum]->weather[0]->icon;
        return "http://openweathermap.org/img/w/$icon.png";
    }
?>