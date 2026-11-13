<?php

define('BASE_URL', 'http://localhost/kematif/');

function validate(array $inputData, array $rules)
{
  $data_valid = filter_var_array($inputData, $rules);

  $errors = [];
  foreach ($rules as $key => $ruleConfig) {
    $value = $data_valid[$key] ?? null;

    if ($value === false || $value === null || (is_string($value) && trim($value) === '')) {
      if (is_array($ruleConfig) and isset($ruleConfig['pesan'])) {
        $errors[$key] = $ruleConfig['pesan'];
      } else {
        $errors[$key] = "Input Kolom " . ucwords(str_replace('_', ' ', $key)) . " tidak valid atau kosong.";
      }
    }
  }

  return
    [
      'success' => empty($errors),
      'errors' => $errors,
      'data' => $data_valid,
    ];
}

function setSession(array $sessions)
{
  foreach ($sessions as $key => $value) {
    $_SESSION[$key] = $value;
  }
}

function unsetSession(array $sessions)
{
  foreach ($sessions as $key) {
    unset($_SESSION[$key]);
  }
}

function showErrorMessage(?string $error, string $default)
{
  if (!empty($error)) {
    return "<span class='field-error' role='alert'><span class='field-error-icon' aria-hidden='true'>!</span>{$error}</span>";
  }

  return $default;
}

function redirectTo(string $url)
{
  header("Location:" . BASE_URL . $url . ".php");
  exit();
}

function getSessionByKey(array $sessions)
{
  $data = [];
  foreach ($sessions as $session) {
    $data[$session] = $_SESSION[$session] ?? [];
  }

  return $data;
}

function isLoggedIn()
{
  return isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true;
}

function Logout()
{
  session_unset();
  session_destroy();
  redirectTo("login");
}

function dd(string $data)
{
  echo '<pre style="background: #1e1e1e; color: #dcdcdc; padding: 15px; border-radius: 5px; font-family: monospace; font-size: 14px; line-height: 1.5; z-index: 9999; position: relative;">';
  var_dump($data);
  echo '</pre>';
  die(); // Menghentikan eksekusi kode setelahnya
}

function getInitial(string $nama_lengkap)
{
  $arrNama = explode(" ", $nama_lengkap);
  return strtoupper($arrNama[0][0] . ($arrNama[1][0] ?? ''));
}
