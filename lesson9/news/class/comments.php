<?php
class Comment
{
    protected $date;
    protected $author;
    protected $comment;

    public function __construct($date, $author, $comment)
    {
        $this->date = $date;
        $this->author = $author;
        $this->comment = $comment;
    }

    public function showComment () {
        echo 'Дата:'. $this->date . '<br/>';
        echo 'Автор:'. $this->author . '<br/>';
        echo $this->comment.'<br/>';

    }
}