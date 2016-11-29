<?php

function retrieveAllEvents() {
    return [new Event('Fancy', date_create("2016-12-1")),
        new Event('Super fancy', date_create("2016-12-3")),
        new Event('Super fancy', date_create("2017-12-3"))];
}