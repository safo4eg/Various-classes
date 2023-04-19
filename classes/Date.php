<?php

class Date {
    private $date_time;
    private $date_info;

    public function __construct($input_date = null) {
        if(isset($input_date)) $this->date_time = new DateTime($input_date);
        else $this->date_time = new DateTime();
        $this->date_info = getdate($this->date_time->getTimestamp());
    }

    public function __toString() {
        $year = $this->date_info['year'];
        $month = (int) ($this->date_info['mon'] / 10)? $this->date_info['mon']: "0{$this->date_info['mon']}";
        $day = (int) ($this->date_info['mday'] / 10)? $this->date_info['mday']: "0{$this->date_info['mday']}";
        return "$year-$month-$day";
    }

    public function getDay() {
        return $this->date_info['mday'];
    }

    public function getMonth() {
        return $this->date_info['mon'];
    }

    public function getYear() {
        return $this->date_info['year'];
    }

    public function getWeekDay() {
        $days_names = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        return $days_names[$this->date_info['wday']];
    }

    public function addDay($amount) {
        $date_interval = DateInterval::createFromDateString("$amount days");
        $this->date_time = $this->date_time->add($date_interval);
        $this->changeDateInfo();
        return $this;
    }

    public function subDay($amount) {
        $date_interval = DateInterval::createFromDateString("$amount days");
        $this->date_time = $this->date_time->sub($date_interval);
        $this->changeDateInfo();
        return $this;
    }

    public function addMonth($amount) {
        $date_interval = DateInterval::createFromDateString("$amount months");
        $this->date_time = $this->date_time->add($date_interval);
        $this->changeDateInfo();
        return $this;
    }

    public function subMonth($amount) {
        $date_interval = DateInterval::createFromDateString("$amount months");
        $this->date_time = $this->date_time->sub($date_interval);
        $this->changeDateInfo();
        return $this;
    }

    public function addYear($amount) {
        $date_interval = DateInterval::createFromDateString("$amount years");
        $this->date_time = $this->date_time->add($date_interval);
        $this->changeDateInfo();
        return $this;
    }

    public function subYear($amount) {
        $date_interval = DateInterval::createFromDateString("$amount years");
        $this->date_time = $this->date_time->sub($date_interval);
        $this->changeDateInfo();
        return $this;
    }

    public function format($format) {
        return $this->date_time->format($format);
    }

    private function changeDateInfo() {
        $this->date_info = getdate($this->date_time->getTimestamp());
    }

}