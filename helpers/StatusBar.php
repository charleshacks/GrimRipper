<?php

namespace Helpers;

class StatusBar
{
    /**
     * Total possible value (typically 100 if using a percentage.)
     * 
     * @var integer
     */
    private $total;

    /**
     * Width of progress bar in characters.
     * 
     * @var integer
     */
    private $width;

    /**
     * Current progress within $total.
     * 
     * @var integer
     */
    private $progress = 1;

    /**
     * Instantiate a new instance.
     * 
     * @param  integer $total Total possibel value.
     * @param  integer $width Width of the progress bar.
     * @return void
     */
    public function __construct($total, $width = 30)
    {
        $this->total = $total;
        $this->width = $width;

        $this->output();
    }

    /**
     * Set the progress to a fixed amount.
     * 
     * @param  integer $amount Amount of progress.
     * @return void
     */
    public function setProgress($amount)
    {
        $this->progress = $amount;

        $this->output();
    }

    /**
     * Increment the progress by 1.
     * 
     * @return void
     */
    public function incrementProgress()
    {
        $this->progress++;

        $this->output();
    }

    /**
     * Write a visual progress bar to the command line.
     * 
     * @return void
     */
    private function output()
    {
        if($this->progress > $this->total) {
            return;
        }

        $percentComplete = (double) ($this->progress / $this->total);

        $bar = floor($percentComplete * $this->width);

        $statusBar = "\r[";
        $statusBar .= str_repeat('#', $bar);

        if ($bar < $this->width) {
            $statusBar .= str_repeat(' ', $this->width - $bar);
        }

        $statusBar .= ']';

        echo $statusBar;

        flush();
    }
}