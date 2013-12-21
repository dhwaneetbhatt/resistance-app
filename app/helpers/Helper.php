<?php

/**
 * Base helper class (contains common functions)
 */
class Helper
{
    /**
     * Returns the array of ids of the given models
     */
    public static function getIds($models)
    {
        // array to be returned to the UI
        $ids = array();

        foreach ($models as $model)
        {
            array_push($ids, $model->id);
        }
        return $ids;
    }
}