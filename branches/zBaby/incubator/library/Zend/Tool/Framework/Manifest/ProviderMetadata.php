<?php

class Zend_Tool_Framework_Manifest_ProviderMetadata extends Zend_Tool_Framework_Manifest_Metadata
{
    protected $_type = 'Provider';
    protected $_providerName  = null;
    protected $_actionName    = null;
    protected $_specialtyName = null;
    
    public function setProviderName($providerName)
    {
        $this->_providerName = $providerName;
        return $this;
    }
    
    public function getProviderName()
    {
        return $this->_providerName;
    }
    
    public function setActionName($actionName)
    {
        $this->_actionName = $actionName;
        return;
    }
    
    public function getActionName()
    {
        return $this->_actionName;
    }
    
    public function setSpecialtyName($specialtyName)
    {
        $this->_specialtyName = $specialtyName;
        return $this;
    }
    
    public function getSpecialtyName()
    {
        return $this->_specialtyName;
    }
    
}