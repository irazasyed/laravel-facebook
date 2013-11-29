<?php namespace Irazasyed\LaravelFacebook;

use Config;

/**
 * @author Syed I.R <syed@lukonet.com>
 * @link http://github.com/irazasyed
 *
 * Some of the methods have been forked from {@link http://github.com/thomaswelton/laravel-facebook}
 */
class Facebook extends \Facebook {

  /**
   * Get a Login URL for use with redirects. By default, full page redirect is
   * assumed. If you are using the generated URL with a window.open() call in
   * JavaScript, you can pass in display=popup as part of the $params.
   *
   * The parameters:
   * - redirect_uri: the url to go to after a successful login
   * - scope: comma separated list of requested extended perms
   *
   * @param array $params (Optional) Provide custom parameters here or provide in config file.
   *                      Default is from config file login option.
   *
   * @return string The URL for the login flow
   */
  public function getLoginUrl( $params = null )
  {
    $loginParams = is_null($params) ? Config::get('laravel-facebook::login') : $params;
    return parent::getLoginUrl( $loginParams );
  }

  /**
   * Helper for FQL Statements, Supports single and multi queries.
   *
   * @param  string|array $query Single FQL statement or multiple FQL statements.
   *
   * @return array               Response from Facebook Graph API / Result for the FQL Query.
   *
   * @uses flattenFQL()
   */
  public function fql($query)
  {
    $params = array();
    if( is_array($query) ) {
      $params['method'] = 'fql.multiquery';
      $params['queries'] = $query;
    } else {
      $params['method'] = 'fql.query';
      $params['query'] = $query;
    }
    return $this->flattenFQL( $this->api( $params ) );
  }

  /**
   * Returns Namespace from configuration file.
   *
   * @return string Application namespace from config file, if set or empty otherwise.
   */
  public function getNamespace()
  {
    return Config::get('laravel-facebook::namespace');
  }

  /**
   * Returns Namespace from configuration file.
   *
   * @return integer Page ID from config file, if set or empty otherwise.
   */
  public function getPageId()
  {
    return Config::get('laravel-facebook::pageId');
  }

  /**
   * Helper to generate canvas URL.
   *
   * @param  string $path (Optional) Additional path / query params.
   *
   * @return string       Canvas URL.
   */
  public function getCanvasUrl($path = '')
  {
    return ($this->getNamespace()) ? 'http://apps.facebook.com/' . $this->getNamespace() . '/' . $path : null;
  }

  /**
   * Helper to generate Page Tab App URL.
   *
   * @param  integer $pageId (Optional) Page ID.
   *                         Default is from config.
   *
   * @param  integer $appId  (Optional) App ID.
   *                         Default is the current App ID.
   *
   * @return string          Page Tab App URL.
   */
  public function getTabAppUrl($pageId = null, $appId = null)
  {
    $pageId = is_null($pageId) ? $this->getPageId() : $pageId;
    $appId = is_null($appId) ? $this->getAppId() : $appId;
    return "http://www.facebook.com/pages/null/{$pageId}/app_{$appId}";
  }

  /**
   * Checks to see if the user has "liked" the page by checking a signed request.
   *
   * @return integer -1 don't know whether the user liked the page or not.
   *                 0 user has not liked the page.
   *                 1 user has liked the page.
   */
  public function hasLiked()
  {
    $signedRequest = $this->getSignedRequest();
    if(!is_array($signedRequest) || !array_key_exists('page', $signedRequest)) {
      return -1;
    } else {
      return $signedRequest['page']['liked'];
    }
  }

  /**
   * JavaScript Redirect Helper - Useful for canvas/page tab Apps.
   *
   * @param  string $location The URL to redirect.
   *
   * @return string           Responds with JavaScript code and redirects visitor.
   */
  public function jsRedirect($location)
  {
    return '<script> top.location.href = "' . $location . '"; </script>';
  }

  /**
   * Helper for uploading images if on PHP (PHP 5 >= 5.5.0).
   *
   * @param  string $filename Path to image.
   *
   * @return object           Returns a CURLFile object to be used with photo upload API call.
   */
  public function curlImgFile($filename)
  {
    $imgMimeType = '';
    $size = getimagesize($filename);
    switch ($size['mime']) {
      case 'image/gif':
        $imgMimeType = 'image/gif';
        break;
      case 'image/jpeg':
        $imgMimeType = 'image/jpeg';
        break;
      case 'image/png':
        $imgMimeType = 'image/png';
        break;
      case 'image/bmp':
        $imgMimeType = 'image/bmp';
        break;
    }
    return new CurlFile($filename, $imgMimeType);
  }

  /**
   * Laravel Session supported version of getSignedRequest.
   *
   * @param  boolean $useSession Whether to return signed_request from session or not.
   *                             Default is TRUE.
   *
   * @return array               Signed request
   */
  public function getSignedRequest($useSession = true)
  {
    $signedRequest = parent::getSignedRequest();
    if(is_array($signedRequest)) {
      \Session::put('signed_request', $signedRequest);
      return $signedRequest;
    } elseif($useSession) {
      return \Session::get('signed_request');
    }
  }

  /**
   * Flattens FQL Multi-Query Response into a good format.
   *
   * @see fql()
   * @param  array $fqlResponse The FQL response array.
   *
   * @return array              Formated array.
   */
  protected function flattenFQL($fqlResponse)
  {
    if (!is_array($fqlResponse)) return $fqlResponse;
    $result = array();
    foreach ($fqlResponse as $data) {
      $queryName = $data['name'];
      $result[$queryName] = $data['fql_result_set'];
    }
    return $result;
  }
}