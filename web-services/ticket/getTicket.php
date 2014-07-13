<?php

//-- This service will return ticket information for a specific ticket ID (NOT TRACKING ID)
header('Content-Type: application/json');
define('IN_SCRIPT',1);
define('HESK_PATH','/../../');

require(HESK_PATH . 'hesk_settings.inc.php');
include('/../repositories/ticketRepository.php');

if(isset($_GET['id']))
{
    $ticket = TicketRepository::getTicketForId($_GET['id'], $hesk_settings);
    echo json_encode($ticket);
}
elseif (isset($_GET['trackingid']))
{
    $ticket = TicketRepository::getTicketForTrackingId($_GET['trackingid'], $hesk_settings);
    echo json_encode($ticket);
}
else
{
    header(http_response_code(400));
}