<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link rel="icon" href="{$base_url}/assets/img/favicon.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Signika:300,400,600,700&display=swap" rel="stylesheet">
    <link href="{$base_url}/assets/fonts/proxima_nova.css" rel="stylesheet">
    <link href="{$base_url}/assets/css/style.css?v=10" rel="stylesheet">
    <title></title>
      {include "partials/gtm.top.tpl"}
  </head>
  <body{if isset($body_class)} {$body_class}{/if}>
      {include "partials/gtm.bottom.tpl"}
    <div class="header{if isset($header_class)} {$header_class}{/if}">
      <div class="header__logo">
        <a href="{$base_url}"></a>
      </div>
      <div class="header__menu">
        <ul>
          <li><a href="{$base_url}">How It works</a></li>
          <li><a href="{$base_url}">Pricing</a></li>
          <li><a href="{$base_url}">Case Studies</a></li>
          <!-- <li><a href="{$base_url}">About</a></li>
          <li><a href="{$base_url}">FAQ</a></li>
          <li><a href="{$base_url}">Blog</a></li>-->
        </ul>
      </div>
      <div class="header__price-button">
        <ul class="header__price-button__login">
          <li><a href="https://app.ighero.com/login">Log in</a></li>
        </ul>
        <a href="{$base_url}#schedule" class="button1 button1_violet get_a_price">Get a Price</a>
      </div>
    </div>
      {block "content"}{/block}
    <div class="footer{if isset($footer_class)} {$footer_class}{/if}">
      <div class="footer__bg-fill"></div>
      <div class="footer__wrapper">
        <div class="footer__copyrights">
          <div class="footer__logo">
            <a href="{$base_url}"></a>
          </div>
          <p>© Ighero, Inc. All Rights Reserved</p>
        </div>
        <div class="footer__menu1">
          <ul>
            <li><a href="{$base_url}">Home Page</a></li>
            <li><a href="">How It Works</a></li>
            <!-- <li><a href="">FAQ</a></li>-->
            <li><a href="">Case Studies</a></li>
            <li><a href="{$base_url}#schedule" class="get_a_price">Pricing</a></li>
          </ul>
        </div>
        <div class="footer__menu2">
          <ul>
            <!-- <li><a href="">Blog Main</a></li>
            <li><a href="">Single Blog</a></li>-->
            <li><a href="{getRouteURL('Contacts')}">Contact Us</a></li>
            <li><a href="https://app.ighero.com/affiliate/signup">Affiliates</a></li>
            <!-- <li><a href="">About Us</a></li>-->
          </ul>
        </div>
        <!--<div class="footer__menu3">
          <ul>
            <li><a href="">Privacy Policy</a></li>
            <li><a href="">Term of Service</a></li>
          </ul>
        </div> -->
        <div class="footer__contacts">
        </div>
        <div class="footer__price-button">
          <a href="{$base_url}#schedule" class="button1 button1_violet get_a_price">Get a Price</a>
        </div>
      </div>
      <div class="footer__disclamer">
      </div>
    </div>
    <div id="loader"></div>
      {block "scripts"}{/block}
  </body>
</html>