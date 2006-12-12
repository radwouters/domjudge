<?php

require('init.php');

$refresh = '15;url='.getBaseURI().'team/menu.php';

header("Refresh: " . $refresh);

echo '<?xml version="1.0" encoding="iso-8859-1" ?>' . "\n";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
	<!-- DOMjudge version <?= DOMJUDGE_VERSION ?> -->
	<meta http-equiv="refresh" content="<?=$refresh?>" />
<link rel="stylesheet" href="style.css" type="text/css" />
<title>DOMjudge menu</title>
</head>
<body>
<?


/* (new) clarification info */
$res = $DB->q('KEYTABLE SELECT type AS ARRAYKEY, COUNT(*) AS count FROM team_unread
               WHERE team = %s GROUP BY type', $login);

?>
<div id="menutop">
<?	if ( isset($res['submission']) ) { ?>
<a target="content" class="new" href="submissions.php">submissions (<?=$res['submission']['count']?>)</a>
<?	} else { ?>
<a target="content" href="submissions.php">submissions</a>
<?	}
	if ( isset($res['clarification']) ) {
?><a target="content" class="new" href="clarifications.php">clarifications (<?=$res['clarification']['count']?> new)</a>
<?	} else { ?>
<a target="content" href="clarifications.php">
clarifications</a>
<?	} ?>
<a target="content" href="scoreboard.php">scoreboard</a>
<? if ( ENABLEWEBSUBMIT ) { ?>
<a target="content" href="websubmit.php">submit</a>
<? } ?>
</div>

<?

putClock();

require('../footer.php');
