<?php
class sfTwitterMelody extends sfMelody1
{
  /**
   * Concrete implementation of myUser instance update after successful connection.
   * Here you can, for example, update sfGuardUserProfile with data that can be
   * retrieved through OAuth service.
   */
  public function updatesfGuardUser(myUser $sf_user)
  {
  }
  
  protected function initialize($config)
  {
    $this->setRequestTokenUrl('https://api.twitter.com/oauth/request_token');
    $this->setRequestAuthUrl('https://api.twitter.com/oauth/authorize');
    $this->setAccessTokenUrl('https://api.twitter.com/oauth/access_token');

    $this->setNamespaces(array('default' => 'http://api.twitter.com'));
  }

  public function initializeFromToken($token)
  {
    if($token && $token->getStatus() == Token::STATUS_ACCESS)
    {
      $this->setAlias('me', 'users/show.json?user_id='.$this->getToken()->getParam('user_id'));
    }
  }

  public function getIdentifier()
  {
    return $this->getToken()->getParam('user_id');
  }
}