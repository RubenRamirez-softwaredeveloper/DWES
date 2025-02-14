<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start = $_POST['start'] ?? '';
    $intervalType = $_POST['interval'] ?? '';
    
    if (!empty($start) && !empty($intervalType)) {
        $startDate = new DateTime($start);
        $endDate = (clone $startDate)->modify('+2 months');
        
        $intervalMapping = [
            'weekly' => 'P1W',
            'biweekly' => 'P2W',
            'monthly' => 'P1M'
        ];
        
        $interval = new DateInterval($intervalMapping[$intervalType]);
        $period = new DatePeriod($startDate, $interval, $endDate);
        
        $events = [];
        foreach ($period as $event) {
            $events[] = $event->format('l, M j Y');
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<form method="POST">
    <label for="start">Start Date & Time:</label>
    <input type="datetime-local" name="start" required>
    <br>
    <label for="interval">Repeat every:</label>
    <select name="interval" required>
        <option value="weekly">Every Week</option>
        <option value="biweekly">Every 2 Weeks</option>
        <option value="monthly">Every Month</option>
    </select>
    <br>
    <button type="submit">Generate Events</button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($start) && !empty($intervalType)): ?>
    <p><b>Recurring Events:</b></p>
    <ul>
        <?php foreach ($events as $event): ?>
            <li><?= $event ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
