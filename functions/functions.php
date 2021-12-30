<?php
function formatTime(int $time, ?int $time2 = 0): string{
	$dt1 = new DateTime("@$time2");
	$dt2 = new DateTime("@$time");
	$diff = $dt1->diff($dt2);

	$diffSeconds = (int)$diff->format("%s");
	$diffMinutes = (int)$diff->format("%i");
	$diffHours = (int)$diff->format("%h");
	$diffDays = (int)$diff->format("%d");
	$diffMonths = (int)$diff->format("%m");
	$diffYears = (int)$diff->format("%y");
	$str = "";

	if ($diffYears > 0) {
		$str .= "{$diffYears}y";
	}
	if ($diffMonths > 0) {
		if ($diffYears > 0) {
			$str .= ", ";
		}
		$str .= "{$diffMonths}m";
	}
	if ($diffDays > 0) {
		if ($diffYears > 0 || $diffMonths > 0) {
			$str .= ", ";
		}
		$str .= "{$diffDays}d";
	}
	if ($diffHours > 0) {
		if ($diffYears > 0 || $diffMonths > 0 || $diffDays > 0) {
			$str .= ", ";
		}
		$str .= "{$diffHours}h";
	}
	if ($diffMinutes > 0) {
		if ($diffYears > 0 || $diffMonths > 0 || $diffDays > 0 || $diffHours > 0) {
			$str .= ", ";
		}
		$str .= "{$diffMinutes}min";
	}
	if ($diffSeconds < 61 && $str == "") {
		$str = "now";
	}
	return $str;
}
