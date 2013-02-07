<?php

namespace Keep\Speed;

/**
* Class to calculate the time elapsed from time saved points
*
* tick = the sound produced by a cronometer
*
* Why speed Racer? http://en.wikipedia.org/wiki/Speed_racer
*
* @author Jessé Alves Galdino <galdino.jesse@gmail.com> (jgskin@github)
*/
class Racer
{
    /**
     * tick points
     *
     * @var string
     **/
    protected $tick_points = array();

    /**
     * perform a tick (save the current time)
     */
    public function tick()
    {
        $this->tick_points[] = microtime(true);
    }

    /**
     * return the diff from the two last ticks (time elapsed between two recorded times)
     */
    public function diff()
    {
        $last = end($this->tick_points);
        $prev = prev($this->tick_points);

        return $last - $prev;
    }

    /**
     * return the diff from the first and the last tick (total time elapsed)
     */
    public function total()
    {
        $first = reset($this->tick_points);
        $last = end($this->tick_points);

        return $last - $first;
    }
}