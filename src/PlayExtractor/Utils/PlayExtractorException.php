<?php
namespace SiegSB\PlayExtractor\Utils;

/**
 * Exceptions for PlayExtractor
 *
 * @package PlayExtractor\Utils\PlayExtractorException
*/
class PlayExtractorException extends \Exception
{

    private $types = array(
        -1 => 'UNKNOWN_CONNECTION_ERROR',
        0 => 'INVALID_PARAMETER',
        404 => 'APP_NO_EXIST'
    );

    /**
     * constructor for the Exception
     *
     * @param string $message
     * @param int $code
    */
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }

    /**
     * Gets the exception in a simple string
     *
     * @return string $exception
    */
    public function __toString()
    {
        return __CLASS__ . ": code " . $this->getCode() . " (" . $this->types[$this->getCode()] . "): " . $this->getMessage() . "\n";
    }

    /**
     * Gets the type of the exception based in the error code
     *
     * @return string $type
    */
    public function getType()
    {
        if(in_array($this->getCode(), $this->types)) {
            return $this->types[$this->getCode()];
        } else {
            return 'UNKNOWN_EXCEPTION';
        }
    }

}
