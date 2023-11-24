<?php
const QUARTER = 60 * 15;

function hasActiveSession(): bool
{
  return isset($_SESSION["valid_until"]) && $_SESSION["valid_until"] > time();
}

function extendSessionTimer()
{
  $_SESSION["valid_until"] = time() + QUARTER;
}

function setSession(int $id)
{
  $_SESSION["id"] = $id;
  extendSessionTimer();
}
