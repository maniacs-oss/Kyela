<?php
namespace Abienvenu\KyelaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Abienvenu\KyelaBundle\Entity\Poll;
use Abienvenu\KyelaBundle\Entity\Event;
use Abienvenu\KyelaBundle\Entity\Choice;
use Abienvenu\KyelaBundle\Entity\Participant;
use Abienvenu\KyelaBundle\Entity\Participation;

class LoadExamplePolls implements FixtureInterface
{
	protected function loadConcert(ObjectManager $manager)
	{
		$poll = (new Poll)->setUrl('concert')->setTitle('Prochaines répétitions');
		$names = ['Aretha', 'Jimmy', 'Miles', 'John', 'Paul'];
		$participantsObj = [];
		foreach ($names as $name)
		{
			$participant = (new Participant)->setName($name)->setPoll($poll);
			$manager->persist($participant);
			$participantsObj[$name] = $participant;
		}

		$events = [
			['name' => 'Répétition', 'place' => 'Studio', 'date' => new \DateTime('+10 year'), 'time' => new \DateTime('15:00')],
			['name' => 'Générale', 'place' => 'Olympia', 'date' => new \DateTime('+10 year +2 days'), 'time' => new \DateTime('20:30')],
			['name' => 'Concert', 'place' => 'Olympia', 'date' => new \DateTime('+10 year +7 days'), 'time' => new \DateTime('20:00')],
			['name' => 'Concert 2', 'place' => 'New-York', 'date' => new \DateTime('+10 year + 10 days'), 'time' => new \DateTime('20:30')],
		];
		$eventsObj = [];
		foreach ($events as $event)
		{
			$eventObj = (new Event)
				->setName($event['name'])
				->setPlace($event['place'])
				->setDate($event['date'])
				->setTime($event['time'])
				->setPoll($poll);
			$manager->persist($eventObj);
			$eventsObj[$event['name']] = $eventObj;
		}

		$choices = [
			['name' => 'Oui', 'value' => 1, 'color' => 'green', 'priority' => 0],
			['name' => 'Non', 'value' => 0, 'color' => 'red', 'priority' => 1],
			['name' => 'Peut-être', 'value' => 0, 'color' => 'gray', 'priority' => 2],
		];
		$choicesObj = [];
		foreach ($choices as $choice)
		{
			$choiceObj = (new Choice)
				->setName($choice['name'])
				->setValue($choice['value'])
				->setColor($choice['color'])
				->setPriority($choice['priority'])
				->setPoll($poll);
			$manager->persist($choiceObj);
			$choicesObj[$choice['name']] = $choiceObj;
		}

		$participations = [
			['who' => 'Aretha', 'when' => 'Répétition', 'choice' => 'Oui'],
			['who' => 'Jimmy', 'when' => 'Répétition', 'choice' => 'Oui'],
			['who' => 'Miles', 'when' => 'Répétition', 'choice' => 'Non'],
			['who' => 'John', 'when' => 'Répétition', 'choice' => 'Oui'],
			['who' => 'Paul', 'when' => 'Répétition', 'choice' => 'Oui'],
			['who' => 'Aretha', 'when' => 'Générale', 'choice' => 'Peut-être'],
			['who' => 'Jimmy', 'when' => 'Générale', 'choice' => 'Oui'],
			['who' => 'Miles', 'when' => 'Générale', 'choice' => 'Oui'],
			['who' => 'John', 'when' => 'Générale', 'choice' => 'Oui'],
			['who' => 'Paul', 'when' => 'Générale', 'choice' => 'Oui'],
			['who' => 'Aretha', 'when' => 'Concert', 'choice' => 'Oui'],
			['who' => 'Jimmy', 'when' => 'Concert', 'choice' => 'Oui'],
			['who' => 'Miles', 'when' => 'Concert', 'choice' => 'Oui'],
			['who' => 'John', 'when' => 'Concert', 'choice' => 'Oui'],
			['who' => 'Paul', 'when' => 'Concert', 'choice' => 'Non'],
			['who' => 'Aretha', 'when' => 'Concert 2', 'choice' => 'Non'],
			['who' => 'Jimmy', 'when' => 'Concert 2', 'choice' => 'Non'],
			['who' => 'John', 'when' => 'Concert 2', 'choice' => 'Oui'],
			['who' => 'Paul', 'when' => 'Concert 2', 'choice' => 'Peut-être'],
		];
		foreach ($participations as $row)
		{
			$participation = (new Participation)
				->setParticipant($participantsObj[$row['who']])
				->setEvent($eventsObj[$row['when']])
				->setChoice($choicesObj[$row['choice']]);
			$manager->persist($participation);
		}

		$manager->persist($poll);
	}

	protected function loadPicnic(ObjectManager $manager)
	{
		$poll = (new Poll)->setUrl('picnic')->setTitle('Pique-nique');
		$names = ['Élise', 'Jules', 'Marie', 'Romain', 'Margaux'];
		$participantsObj = [];
		foreach ($names as $name)
		{
			$participant = (new Participant)->setName($name)->setPoll($poll);
			$manager->persist($participant);
			$participantsObj[$name] = $participant;
		}

		$events = [
			['name' => 'Date 1', 'place' => 'Central Park', 'date' => new \DateTime('+10 year'), 'time' => new \DateTime('12:00')],
			['name' => 'Date 2', 'place' => 'Central Park', 'date' => new \DateTime('+10 year +1 days'), 'time' => new \DateTime('12:00')],
		];
		$eventsObj = [];
		foreach ($events as $event)
		{
			$eventObj = (new Event)
				->setName($event['name'])
				->setPlace($event['place'])
				->setDate($event['date'])
				->setTime($event['time'])
				->setPoll($poll);
			$manager->persist($eventObj);
			$eventsObj[$event['name']] = $eventObj;
		}

		$choices = [
			['name' => 'Sucré', 'value' => 1, 'color' => 'blue', 'priority' => 0],
			['name' => 'Salé', 'value' => 1, 'color' => 'cyan', 'priority' => 1],
			['name' => 'Boisson', 'value' => 1, 'color' => 'purple', 'priority' => 2],
			['name' => 'Absent', 'value' => 0, 'color' => 'gray', 'priority' => 3],
		];
		$choicesObj = [];
		foreach ($choices as $choice)
		{
			$choiceObj = (new Choice)
				->setName($choice['name'])
				->setValue($choice['value'])
				->setColor($choice['color'])
				->setPriority($choice['priority'])
				->setPoll($poll);
			$manager->persist($choiceObj);
			$choicesObj[$choice['name']] = $choiceObj;
		}

		$participations = [
			['who' => 'Élise', 'when' => 'Date 1', 'choice' => 'Sucré'],
			['who' => 'Jules', 'when' => 'Date 1', 'choice' => 'Salé'],
			['who' => 'Marie', 'when' => 'Date 1', 'choice' => 'Boisson'],
			['who' => 'Romain', 'when' => 'Date 1', 'choice' => 'Sucré'],
			['who' => 'Margaux', 'when' => 'Date 1', 'choice' => 'Salé'],
			['who' => 'Élise', 'when' => 'Date 2', 'choice' => 'Sucré'],
			['who' => 'Jules', 'when' => 'Date 2', 'choice' => 'Absent'],
			['who' => 'Marie', 'when' => 'Date 2', 'choice' => 'Boisson'],
			['who' => 'Romain', 'when' => 'Date 2', 'choice' => 'Sucré'],
			['who' => 'Margaux', 'when' => 'Date 2', 'choice' => 'Salé'],
		];
		foreach ($participations as $row)
		{
			$participation = (new Participation)
				->setParticipant($participantsObj[$row['who']])
				->setEvent($eventsObj[$row['when']])
				->setChoice($choicesObj[$row['choice']]);
			$manager->persist($participation);
		}

		$manager->persist($poll);
	}

    /**
     * {@inheritDoc}
     */
	public function load(ObjectManager $manager)
	{
		$this->loadConcert($manager);
		$this->loadPicnic($manager);
		$manager->flush();
	}
}