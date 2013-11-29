<?php

return array(
  /*
  |--------------------------------------------------------------------------
  | Initialize a Facebook Application (Required)
  |--------------------------------------------------------------------------
  |
  | The configuration:
  | - appId:              the application ID
  |
  | - secret:             the application secret
  |
  | - fileUpload:         (optional) boolean indicating if file uploads are enabled
  |
  | - allowSignedRequest: (optional) boolean indicating if signed_request is
  |                       allowed in query parameters or POST body.  Should be
  |                       false for non-canvas apps. Defaults to true.
  */
  'init' => array(
    'appId'      => 'APP_ID',
    'secret'     => 'APP_SECRET'
  ),

  /*
  |--------------------------------------------------------------------------
  | Login Parameters (Optional)
  |--------------------------------------------------------------------------
  |
  | The parameters:
  | - scope:        (optional) A string with a comma-separated list of permissions
  |                 to request from the user. If this property is not specified,
  |                 basic permissions will be requested from the user.
  |
  | - redirect_uri: (optional) The URL to redirect the user to once the login/authorization process is complete.
  |                 If this property is not specified, the user will be redirected to the current URL.
  |
  | - display:      (optional) The display mode in which to render the dialog. The default is page, read the
  |                 Login dialog parameters page (http://developers.facebook.com/docs/reference/dialogs/oauth/#params)
  |                 for other values
  |
  */
  'login' => array(
    'display' => 'page',
  ),

  /*
  |--------------------------------------------------------------------------
  | Application Namespace (Optional)
  |--------------------------------------------------------------------------
  |
  | Your facebook application namespace.
  |
  | Example: http://apps.facebook.com/<your_app_namespace>/
  |
  */
  'namespace' => 'APP_NAMESPACE',

  /*
  |--------------------------------------------------------------------------
  | Facebook Page ID (Optional)
  |--------------------------------------------------------------------------
  |
  | Your facebook page ID.
  |
  | Example: http://www.facebook.com/pages/facebook/20531316728/
  |          20531316728 - Is the page ID in the above example URL.
  */
  'pageId'    => 'PAGE_ID',

  /*
  |--------------------------------------------------------------------------
  | Locale (Optional)
  |--------------------------------------------------------------------------
  |
  | Leave this unchanged if not sure.
  | Refer for more details:
  | https://developers.facebook.com/docs/internationalization/#locales
  |
  */
  'locale'    => 'en_US'
);