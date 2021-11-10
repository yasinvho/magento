<?php
namespace Magento\Backend\Model\Menu\Item;

/**
 * Interceptor class for @see \Magento\Backend\Model\Menu\Item
 */
class Interceptor extends \Magento\Backend\Model\Menu\Item implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Model\Menu\Item\Validator $validator, \Magento\Framework\AuthorizationInterface $authorization, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Backend\Model\MenuFactory $menuFactory, \Magento\Backend\Model\UrlInterface $urlModel, \Magento\Framework\Module\ModuleListInterface $moduleList, \Magento\Framework\Module\Manager $moduleManager, array $data = [])
    {
        $this->___init();
        parent::__construct($validator, $authorization, $scopeConfig, $menuFactory, $urlModel, $moduleList, $moduleManager, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getId');
        return $pluginInfo ? $this->___callPlugins('getId', func_get_args(), $pluginInfo) : parent::getId();
    }

    /**
     * {@inheritdoc}
     */
    public function getTarget()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTarget');
        return $pluginInfo ? $this->___callPlugins('getTarget', func_get_args(), $pluginInfo) : parent::getTarget();
    }

    /**
     * {@inheritdoc}
     */
    public function hasChildren()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasChildren');
        return $pluginInfo ? $this->___callPlugins('hasChildren', func_get_args(), $pluginInfo) : parent::hasChildren();
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getChildren');
        return $pluginInfo ? $this->___callPlugins('getChildren', func_get_args(), $pluginInfo) : parent::getChildren();
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUrl');
        return $pluginInfo ? $this->___callPlugins('getUrl', func_get_args(), $pluginInfo) : parent::getUrl();
    }

    /**
     * {@inheritdoc}
     */
    public function getAction()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAction');
        return $pluginInfo ? $this->___callPlugins('getAction', func_get_args(), $pluginInfo) : parent::getAction();
    }

    /**
     * {@inheritdoc}
     */
    public function setAction($action)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAction');
        return $pluginInfo ? $this->___callPlugins('setAction', func_get_args(), $pluginInfo) : parent::setAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function hasClickCallback()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasClickCallback');
        return $pluginInfo ? $this->___callPlugins('hasClickCallback', func_get_args(), $pluginInfo) : parent::hasClickCallback();
    }

    /**
     * {@inheritdoc}
     */
    public function getClickCallback()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getClickCallback');
        return $pluginInfo ? $this->___callPlugins('getClickCallback', func_get_args(), $pluginInfo) : parent::getClickCallback();
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTitle');
        return $pluginInfo ? $this->___callPlugins('getTitle', func_get_args(), $pluginInfo) : parent::getTitle();
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTitle');
        return $pluginInfo ? $this->___callPlugins('setTitle', func_get_args(), $pluginInfo) : parent::setTitle($title);
    }

    /**
     * {@inheritdoc}
     */
    public function hasTooltip()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasTooltip');
        return $pluginInfo ? $this->___callPlugins('hasTooltip', func_get_args(), $pluginInfo) : parent::hasTooltip();
    }

    /**
     * {@inheritdoc}
     */
    public function getTooltip()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTooltip');
        return $pluginInfo ? $this->___callPlugins('getTooltip', func_get_args(), $pluginInfo) : parent::getTooltip();
    }

    /**
     * {@inheritdoc}
     */
    public function setTooltip($tooltip)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTooltip');
        return $pluginInfo ? $this->___callPlugins('setTooltip', func_get_args(), $pluginInfo) : parent::setTooltip($tooltip);
    }

    /**
     * {@inheritdoc}
     */
    public function setModule($module)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setModule');
        return $pluginInfo ? $this->___callPlugins('setModule', func_get_args(), $pluginInfo) : parent::setModule($module);
    }

    /**
     * {@inheritdoc}
     */
    public function setModuleDependency($moduleName)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setModuleDependency');
        return $pluginInfo ? $this->___callPlugins('setModuleDependency', func_get_args(), $pluginInfo) : parent::setModuleDependency($moduleName);
    }

    /**
     * {@inheritdoc}
     */
    public function setConfigDependency($configPath)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setConfigDependency');
        return $pluginInfo ? $this->___callPlugins('setConfigDependency', func_get_args(), $pluginInfo) : parent::setConfigDependency($configPath);
    }

    /**
     * {@inheritdoc}
     */
    public function isDisabled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isDisabled');
        return $pluginInfo ? $this->___callPlugins('isDisabled', func_get_args(), $pluginInfo) : parent::isDisabled();
    }

    /**
     * {@inheritdoc}
     */
    public function isAllowed()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isAllowed');
        return $pluginInfo ? $this->___callPlugins('isAllowed', func_get_args(), $pluginInfo) : parent::isAllowed();
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toArray');
        return $pluginInfo ? $this->___callPlugins('toArray', func_get_args(), $pluginInfo) : parent::toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function populateFromArray(array $data)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'populateFromArray');
        return $pluginInfo ? $this->___callPlugins('populateFromArray', func_get_args(), $pluginInfo) : parent::populateFromArray($data);
    }
}
