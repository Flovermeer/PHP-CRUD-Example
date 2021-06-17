<?php
// execute all seeders
foreach (glob("seeders/*.php") as $filename) {
    print("Seeding... $filename \n");
    include $filename;
}
