<?php

// DB connection function

function connect() {
    return new mysqli( HOST, USERNAME, PASSWORD, DB );
}