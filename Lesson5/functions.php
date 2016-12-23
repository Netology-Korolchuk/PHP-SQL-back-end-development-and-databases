<?
define('DATA_JSON_FILE', __DIR__ . '/phonebook.json');
/**
 * @return array|mixed
 */
function getRecords()
    {
    if (!file_exists(DATA_JSON_FILE))
         {
         die('The data file is not found!');
         }

    $json = file_get_contents(DATA_JSON_FILE);
    $arrayData = @json_decode($json, true);

    if (!empty($arrayData))
        {
        return $arrayData;
        }
        echo 'The structure of the data file is broken!';
        return [];
    }
