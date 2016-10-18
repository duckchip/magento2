<?php
/**
 * Application configuration object. Used to access configuration when application is installed.
 *
 * @copyright {}
 */

namespace Magento\Framework\App;

use Magento\Framework\App\Config\MutableScopeConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * @inheritdoc
 */
class MutableScopeConfig extends Config implements MutableScopeConfigInterface
{
    /**
     * Set config value in the corresponding config scope
     *
     * @param string $path
     * @param mixed $value
     * @param string $scope
     * @param null|string $scopeCode
     * @return void
     */
    public function setValue(
        $path,
        $value,
        $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        $scopeCode = null
    ) {
        if (empty($scopeCode)) {
            $scopeCode = null;
        }
        $this->_scopePool->getScope($scope, $scopeCode)->setValue($path, $value);
    }
}
