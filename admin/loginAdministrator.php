<?php
// inainte de a distruge sesiunile, creeaza alta noua
session_start();

//distruge toate sesiunile
session_destroy();

// redirectioneaza catre acasa dupa logout
header("location: /index.html");
