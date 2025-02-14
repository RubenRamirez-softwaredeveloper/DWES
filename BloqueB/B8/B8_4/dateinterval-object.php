<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start = $_POST['start'] ?? '';
    $end = $_POST['end'] ?? '';
    
    if (!empty($start) && !empty($end)) {
        $startDate = new DateTime($start);
        $endDate = new DateTime($end);
        
        $interval = $startDate->diff($endDate);
        $duration = $interval->format('%d days, %h hours, %i minutes');
        
        $totalInterval = new DateInterval('P' . $interval->d . 'DT' . $interval->h . 'H' . $interval->i . 'M');
        $totalMinutes = ($totalInterval->d * 24 * 60) + ($totalInterval->h * 60) + $totalInterval->i;
        $totalHours = intdiv($totalMinutes, 60);
        $remainingMinutes = $totalMinutes % 60;
        
        $totalTime = "$totalHours hours, $remainingMinutes minutes";
        
        $startFormatted = $startDate->format('D d M Y, g:i a');
        $endFormatted = $endDate->format('D d M Y, g:i a');
    }
}
?>

<?php include 'includes/header.php'; ?>

<form method="POST">
    <label for="start">Start Date & Time:</label>
    <input type="datetime-local" name="start" required>
    <br>
    <label for="end">End Date & Time:</label>
    <input type="datetime-local" name="end" required>
    <br>
    <button type="submit">Calculate Duration</button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($start) && !empty($end)): ?>
    <p><b>Event starts:</b><br> <?= $startFormatted ?> </p>
    <p><b>Event ends:</b><br> <?= $endFormatted ?> </p>
    <p><b>Duration:</b><br> <?= $duration ?> </p>
    <p><b>Total time in hours and minutes:</b><br> <?= $totalTime ?> </p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
