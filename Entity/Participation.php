<?php
/*
 * Copyright 2014-2016 Arnaud Bienvenu
 *
 * This file is part of Kyela.

 * Kyela is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * Kyela is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.

 * You should have received a copy of the GNU Affero General Public License
 * along with Kyela.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Abienvenu\KyelaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Participation
 *
 * @ORM\Table(uniqueConstraints={
 *     @ORM\UniqueConstraint(name="participant_event_unicity", columns={"participant_id", "event_id"})
 * })
 * @ORM\Entity
 * @UniqueEntity(fields={"participant", "event"})
 */
class Participation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Participant", inversedBy="participations")
     */
    private $participant;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="participations")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="Choice", inversedBy="participations")
     */
    private $choice;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set participant
     *
     * @param Participant $participant
     * @return Participation
     */
    public function setParticipant(Participant $participant = null)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get participant
     *
     * @return Participant
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set event
     *
     * @param Event $event
     * @return Participation
     */
    public function setEvent(Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set choice
     *
     * @param Choice $choice
     * @return Participation
     */
    public function setChoice(Choice $choice = null)
    {
        $this->choice = $choice;

        return $this;
    }

    /**
     * Get choice
     *
     * @return Choice
     */
    public function getChoice()
    {
        return $this->choice;
    }
}
