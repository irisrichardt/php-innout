<?php

function loadModel($modelName)
{
  require_once(MODEL_PATH . "/{$modelName}.php");
}

function loadView($viewName, $params = array())
{
  if ($params > 0) {
    foreach ($params as $key => $value) {
      if (strlen($key) > 0) {
        ${$key} = $value;
      }
    }
  }

  require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplateView($viewName, $params = array())
{
  if ($params > 0) {
    foreach ($params as $key => $value) {
      if (strlen($key) > 0) {
        ${$key} = $value;
      }
    }
  }

  $user = $_SESSION['user'];
  require_once(TEMPLATE_PATH . "/header.php");
  require_once(TEMPLATE_PATH . "/menu.php");
  require_once(VIEW_PATH . "/{$viewName}.php");
  require_once(TEMPLATE_PATH . "/footer.php");
}

function renderTitle($title, $subtitle, $icon = null)
{
  require_once(TEMPLATE_PATH . "/title.php");
}
