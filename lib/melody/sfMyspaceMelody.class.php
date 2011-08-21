<?php
class sfMyspaceMelody extends sfMelody1
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
    $this->setRequestTokenUrl('http://api.myspace.com/request_token');
    $this->setRequestAuthUrl('http://api.myspace.com/authorize');
    $this->setAccessTokenUrl('http://api.myspace.com/access_token');

    $this->setNamespace('default', 'http://api.myspace.com/v1');

    $this->setAlias('me', 'user.json');
  }

  public function getIdentifier()
  {
    $me = $this->getMe();

    if($me)
    {
      return $me->userId;
    }
    else
    {
      return parent::getIdentifier();
    }
  }

}