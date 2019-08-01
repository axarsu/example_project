<?php

namespace App\Controllers;


use PHPMailer\PHPMailer\PHPMailer;
use PimpleSingleton\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class Content extends Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->view->setTemplateDir(dirname(__DIR__) . '/views');
  }


  public function Index(Request $request, Response $response)
  {
    $this->view->assign('header_class', 'header_home');
    $this->view->assign('footer_class', 'footer_home');
    $this->view->assign('title', 'Home Page');
    $this->view->display('home.tpl');
  }


  public function Contacts(Request $request, Response $response)
  {
    $ok = Container::getContainer()['flash']->getFirstMessage('success');
    $error = Container::getContainer()['flash']->getFirstMessage('error');

    $this->view->assign('header_class', 'header_contacts');
    $this->view->assign('title', 'Contact Us');
    $this->view->assign('ok', $ok);
    $this->view->assign('error', $error);
    $this->view->display('contacts.tpl');
  }


  public function ContactsPost(Request $request, Response $response)
  {
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->isHTML();
    $mail->isSMTP();
    $mail->From = '';
    $mail->FromName = '';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->Subject = '';

    if (ENVIRONMENT == 'production') {
      $admin_mail = '';
    } else {
      $admin_mail = 'iskandar@axarsu.com';
    }
    $mail->addAddress($admin_mail);

    $this->view->assign('first_name', $_POST['first_name']);
    $this->view->assign('last_name', $_POST['last_name']);
    $this->view->assign('email', $_POST['email']);
    $this->view->assign('social', $_POST['social']);
    $this->view->assign('subject', $_POST['subject']);
    $this->view->assign('message', $_POST['message']);

    $mail->Body = $this->view->fetch('emails/contacts.html.tpl');
    $mail->AltBody = $this->view->fetch('emails/contacts.txt.tpl');

    $url = getRouteURL('Contacts');

    if (!empty($_FILES['attachment']['name'])) {
      if ($_FILES['attachment']['size'] > 1024 * 1024 * 10) {
        return $this->redirectWithError('Selected file size is larger than 10MB. Please try another one!', $url);
      } else {
        $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name'], PHPMailer::ENCODING_BASE64, $_FILES['attachment']['type']);
      }
    }

    if (!$mail->send()) {
      return $this->redirectWithError('Something went wrong. Please try again later!', $url);
    } else {
      return $this->redirectWithSuccess('Your message successfully sent. Thank you!', $url);
    }
  }


  public function Pricing(Request $request, Response $response)
  {
    $this->view->assign('header_class', 'header_pricing');
    $this->view->assign('title', 'Pricing');
    $this->view->display('pricing.tpl');
  }

}
