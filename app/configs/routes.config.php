<?php

return [
  /**
   * Index
   */
  [
    // method(s)
    ['GET'],
    // pattern
    '/',
    // controller class
    'Content',
    // function (action)
    'Index',
    // route name (optional)
    'Index',
  ],
  /**
   * Contact Us
   */
  [
    ['GET'],
    '/contacts',
    'Content',
    'Contacts',
    'Contacts',
  ],
  [
    ['POST'],
    '/contacts',
    'Content',
    'ContactsPost',
  ],
  /**
   * Pricing
   */
  [
    ['GET'],
    '/pricing',
    'Content',
    'Pricing',
    'Pricing',
  ],
];
