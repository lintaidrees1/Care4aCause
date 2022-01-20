<?php
session_start();
unset($_SESSION['fund_id']);
unset($_SESSION['fund_name']);
unset($_SESSION['fund_raise']);
unset($_SESSION['fund_total']);
session_destroy();
