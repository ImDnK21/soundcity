<?php
require_once('models/account.php');
require_once('models/address.php');
require_once('models/region.php');

class AccountController {
  public function login() {
    require_once('views/account/login.php');
    Utils::title('Iniciar sesión');
  }

  // public function register() {
    // require_once('views/account/register.php');
  // }

  public function profile() {
    Utils::isAuth();
    require_once('views/account/profile.php');
    Utils::title('Perfil');
  }

  public function addresses() {
    Utils::isAuth();

    $region = new Region();
    $regions = $region->getAll();

    $address = new Address();
    $address->setUser($_SESSION['logged']->id);
    $addresses = $address->getAll();

    require_once('views/account/addresses.php');
    Utils::title('Mis direcciones');
  }

  public function orders() {
    Utils::isAuth();
    require_once('views/account/orders.php');
    Utils::title('Perfil');
  }

  public function signup() {
    if (isset($_POST) && !empty($_POST)) {
      $rut = isset($_POST['rut']) ? trim($_POST['rut']) : false;
      $firstname = isset($_POST['firstname']) ? ucwords(trim($_POST['firstname'])) : false;
      $lastname = isset($_POST['lastname']) ? ucwords(trim($_POST['lastname'])) : false;
      $email = isset($_POST['email']) ? trim($_POST['email']) : false;
      $password = isset($_POST['password']) ? trim($_POST['password']) : false;
      $confirmPassword = isset($_POST['confirm-password']) ? trim($_POST['confirm-password']) : false;

      if ($rut && $firstname && $lastname && $email && $password && $confirmPassword) {
        if ($password === $confirmPassword) {
          $account = new Account();
          $account->setRut($rut);
          $account->setFirstname($firstname);
          $account->setLastname($lastname);
          $account->setEmail($email);
          $account->setPassword($password);

          if ($account->save()) {
            $_SESSION['signup_message'] = 'Usuario creado correctamente';
            $_SESSION['signup_message_type'] = 'success';
          } else {
            $_SESSION['signup_message'] = 'Error al crear la cuenta. Por favor intente nuevamente.';
            $_SESSION['signup_message_type'] = 'warning';
          }
        } else {
          $_SESSION['signup_message'] = 'Las contraseñas no coinciden.';
          $_SESSION['signup_message_type'] = 'warning';
        }
      } else {
        $_SESSION['signup_message'] = 'Rellena todos los campos necesarios.';
        $_SESSION['signup_message_type'] = 'warning';
      }
    }
    header('Location:' . APP_URL . 'account/login');
  }

  public function signin() {
    if (isset($_POST) && !empty($_POST)) {
      $account = new Account();
      $account->setEmail($_POST['email']);
      $account->setPassword($_POST['password']);

      $auth = $account->login();

      if ($auth && is_object($auth)) {
        $_SESSION['logged'] = $auth;

        if ($auth->role == 'admin') {
          $_SESSION['admin'] = true;
        }

        header('Location:' . APP_URL);
      } else {
        $_SESSION['login_message'] = 'Usuario o contraseña incorrectos';
        $_SESSION['login_message_type'] = 'warning';

        header('Location:' . APP_URL . 'account/login');
      }
    }
  }

  public function logout() {
    if (isset($_SESSION['logged'])) {
      unset($_SESSION['logged']);
    }

    if (isset($_SESSION['admin'])) {
      unset($_SESSION['admin']);
    }

    header('Location:' . APP_URL . 'account/login');
  }

  public function update() {
    Utils::isAuth();
    if (isset($_POST) && isset($_GET['id'])) {
      $firstname = isset($_POST['firstname']) ? ucwords(trim($_POST['firstname'])) : false;
      $lastname = isset($_POST['lastname']) ? ucwords(trim($_POST['lastname'])) : false;

      if ($firstname && $lastname) {
        $account = new Account();
        $account->setId($_GET['id']);
        $account->setFirstname($firstname);
        $account->setLastname($lastname);

        if ($account->update()) {
          $_SESSION['profile'] = 'Perfil actualizado correctamente';
          $_SESSION['logged']->firstname = $firstname;
          $_SESSION['logged']->lastname = $lastname;
        } else {
          $_SESSION['profile'] = 'Error al actualizar el perfil. Por favor intente nuevamente.';
        }
      }
    }
    header('Location:' . APP_URL . 'account/profile');
  }

  public function saveAddress() {
    Utils::isAuth();
    if (isset($_POST) && !empty($_POST)) {
      $street = isset($_POST['street']) ? trim($_POST['street']) : false;
      $number = isset($_POST['number']) ? trim($_POST['number']) : false;
      $extra = isset($_POST['extra']) ? trim($_POST['extra']) : false;
      $zipcode = isset($_POST['zipcode']) ? trim($_POST['zipcode']) : false;
      $region = isset($_POST['region']) ? trim($_POST['region']) : false;
      $commune = isset($_POST['commune']) ? trim($_POST['commune']) : false;

      if ($street && $number && $zipcode && $region && $commune) {
        $address = new Address();
        $address->setUser($_SESSION['logged']->id);
        $address->setStreet($street);
        $address->setNumber($number);
        $address->setExtra($extra);
        $address->setZipcode($zipcode);
        $address->setRegion($region);
        $address->setCommune($commune);

        if ($address->save()) {
          $_SESSION['address'] = 'Dirección guardada correctamente';
        } else {
          $_SESSION['address'] = 'Error al guardar la dirección. Por favor intente nuevamente.';
        }
      } else {
        $_SESSION['address'] = 'Rellena todos los campos necesarios.';
      }
    }
    header('Location:' . APP_URL . 'account/addresses');
  }

  public function deleteAddress() {
    Utils::isAuth();
    if (isset($_GET['id'])) {
      $address = new Address();
      $address->setId($_GET['id']);
      if ($address->delete()) {
        $_SESSION['address'] = 'Dirección eliminada correctamente';
      } else {
        $_SESSION['address'] = 'Error al eliminar la dirección. Por favor intente nuevamente.';
      }
    }
    header('Location:' . APP_URL . 'account/addresses');
  }
}
