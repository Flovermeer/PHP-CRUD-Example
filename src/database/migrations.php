<?php
// execute all migrations
foreach (glob("migrations/*.php") as $filename) {
    print("Migrating... $filename \n");
    include $filename;
}
