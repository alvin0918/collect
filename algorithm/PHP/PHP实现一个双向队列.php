<?php

class Deque
{
    private $queue = array();

    public function addFirst($item)
    {
        return array_unshift($this->queue, $item);
    }

    public function addLast($item)
    {
        return array_push($this->queue, $item);
    }

    public function removeFirst()
    {
        return array_shift($this->queue);
    }

    public function removeLast()
    {
        return array_pop($this->queue);
    }
}

