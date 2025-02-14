<?php
class Event {
    private DateTime $dateTime;

    public function __construct($date = '2024-10-16 15:30:00') {
        $this->dateTime = new DateTime($date);
    }

    public function setDate(int $year, int $month, int $day) {
        $this->dateTime->setDate($year, $month, $day);
    }

    public function setTime(int $hour, int $minute, int $second = 0) {
        $this->dateTime->setTime($hour, $minute, $second);
    }

    public function setTimestamp(int $timestamp) {
        $this->dateTime->setTimestamp($timestamp);
    }

    public function modify(string $modification) {
        $this->dateTime->modify($modification);
    }

    public function getFormattedDate(): string {
        return $this->dateTime->format('g:i a - D, M j Y');
    }
}

$event = new Event();
$event->modify('+2 hours 15 minutes'); // Ajuste inicial para la duración del evento

$endEvent = clone $event;
$endEvent->modify('+2 hours 15 minutes');
?>

<?php include 'includes/header.php'; ?>

<p><b>Event starts:</b> <?= $event->getFormattedDate() ?></p>
<p><b>Event ends:</b> <?= $endEvent->getFormattedDate() ?></p>

<?php include 'includes/footer.php'; ?>
