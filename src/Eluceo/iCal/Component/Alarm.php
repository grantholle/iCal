<?php

/*
 * This file is part of the eluceo/iCal package.
 *
 * (c) Radoslav Lukac <dev@elceka.sk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eluceo\iCal\Component;

use Eluceo\iCal\Component;
use Eluceo\iCal\PropertyBag;
use Eluceo\iCal\Property;

/**
 * Implementation of the VALARM component
 */
class Alarm extends Component
{
    /**
     * Alarm ACTION property
     *
     * According to RFC 5545: 3.8.6.1. Action
     *
     * @link http://tools.ietf.org/html/rfc5545#section-3.8.6.1
     */
    const ACTION_AUDIO   = 'AUDIO';
    const ACTION_DISPLAY = 'DISPLAY';
    const ACTION_EMAIL   = 'EMAIL';

    protected $action;
    protected $repeat;
    protected $duration;
    protected $description;
    protected $attendee;
    protected $trigger;

    public function getType()
    {
        return "VALARM";
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getRepeat()
    {
        return $this->repeat;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAttendee()
    {
        return $this->attendee;
    }

    public function getTrigger()
    {
        return $this->trigger;
    }

    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    public function setRepeat($repeat)
    {
        $this->repeat = $repeat;
        return $this;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setAttendee($attendee)
    {
        $this->attendee = $attendee;
        return $this;
    }

    public function setTrigger($trigger)
    {
        $this->trigger = $trigger;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function buildPropertyBag()
    {
        $this->properties = new PropertyBag;

        if (null != $this->trigger) {
            $this->properties->set('TRIGGER', $this->trigger);
        }

        if (null != $this->action) {
            $this->properties->set('ACTION', $this->action);
        }

        if (null != $this->repeat) {
            $this->properties->set('REPEAT', $this->repeat);
        }

        if (null != $this->duration) {
            $this->properties->set('DURATION', $this->duration);
        }

        if (null != $this->description) {
            $this->properties->set('DESCRIPTION', $this->description);
        }

        if (null != $this->attendee) {
            $this->properties->set('ATTENDEE', $this->attendee);
        }
    }
}
