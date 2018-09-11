<?php
namespace MyApp\Entity\Template;

interface DateRestricted
{
    public function getDateFrom();
    public function getDateTo();
    public function setDateFrom($date);
    public function setDateTo($date);
    // current date < dateFrom
    public function isInactiveByDate();
    // current date is >= dateFrom and < dateTo
    public function isActiveByDate();
    // current date >= dateTo
    public function isExpiredByDate();
}