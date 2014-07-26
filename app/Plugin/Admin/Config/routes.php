<?php

Router::connect('/admin', array('plugin' => 'admin', 'controller' => 'entry', 'action' => 'index'));
Router::connect('/admin/:controller', array('plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/:controller/:action/*', array('plugin' => 'admin'));