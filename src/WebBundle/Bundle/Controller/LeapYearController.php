<?php

namespace WebBundle\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WebBundle\Bundle\Model\LeapYear;

class LeapYearController
{
    public function indexAction(Request $request, $year)
    {
        if (LeapYear::isLeapYear($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year!');
        }
 
        return new Response('Nope, this is not a leap year.');
    }
}