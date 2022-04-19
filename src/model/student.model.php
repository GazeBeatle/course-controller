<?php

/**
 * This is the object class for the Student entity
 */
class Student implements Stringable
{
    private string $firstname;
    private string $lastname;
    private string $email;

    public function __construct($firstname = 'Unknown', $lastname = 'Unknown', $email = 'unknown@unknown.com')
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    public function __destruct()
    {
        echo 'Destroying: ',
            $this->firstname . ' ' . 
            $this->lastname . ' ' . 
            $this->email;
    }
    
    function __toString(): string
    {
        return  $this->firstname . ' ' . 
                $this->lastname . ' ' . 
                $this->email;
    }
}
