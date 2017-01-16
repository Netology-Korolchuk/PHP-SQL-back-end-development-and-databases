<?php
class News
{
    protected $uid;
    protected $date;
    protected $title;
    protected $news;

    public function __construct($uid, $date, $title, $news)    {
        $this->uid = $uid;
        $this->date = $date;
        $this->title = $title;
        $this->news = $news;
    }

    protected function setDate($date)    {
        $this->date = $date;
    }

    protected function setTitle($title)    {
        $this->title = $title;
    }

    protected function setNews($news)    {
        $this->news = $news;
    }

    protected function getDate()    {
        return $this->date;
    }

    protected function getTitle()    {
        return $this->title;
    }

    protected function getNews()    {
        return $this->news;
    }

    protected function getComments ($comment)
    {
        echo 'Комментарии:<br/>';
        if(isset($comment[$this->uid]))  {
            for($i=0; $i < count($comment[$this->uid]); $i++) {
                $comment[$this->uid][$i]->showComment();
            }
        }
        else {
            echo 'Комментариев нет...';
        }
    }

    public function showNews ($comment) {
        echo '<i>Дата:'. $this->getDate() .'</i><br/>';
        echo '<h2>'. $this->getTitle() .'</h2>';
        echo '<b>'. $this->getNews() . '</b><br/>';
        echo $this->getComments($comment) . '<br/>';
    }

}