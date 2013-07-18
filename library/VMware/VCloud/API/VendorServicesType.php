<?php
class VMware_VCloud_API_VendorServicesType {
    protected $NetworkServices = array();
    protected $EdgeGatewayServices = array();
    protected $namespace = array();
    protected $namespacedef = null;
    protected $tagName = null;
    public static $defaultNS = 'http://www.vmware.com/vcloud/v1.5';

   /**
    * @param array $NetworkServices - [optional] an array of VMware_VCloud_API_NetworkServiceInsertionType objects
    * @param array $EdgeGatewayServices - [optional] an array of VMware_VCloud_API_NetworkServiceInsertionType objects
    */
    public function __construct($NetworkServices=null, $EdgeGatewayServices=null) {
        if (!is_null($NetworkServices)) {
            $this->NetworkServices = $NetworkServices;
        }
        if (!is_null($EdgeGatewayServices)) {
            $this->EdgeGatewayServices = $EdgeGatewayServices;
        }
        $this->tagName = 'VendorServices';
        $this->namespacedef = ' xmlns:vcloud="http://www.vmware.com/vcloud/v1.5" xmlns:ns12="http://www.vmware.com/vcloud/v1.5" xmlns:ovf="http://schemas.dmtf.org/ovf/envelope/1" xmlns:ovfenv="http://schemas.dmtf.org/ovf/environment/1" xmlns:vmext="http://www.vmware.com/vcloud/extension/v1.5" xmlns:cim="http://schemas.dmtf.org/wbem/wscim/1/common" xmlns:rasd="http://schemas.dmtf.org/wbem/wscim/1/cim-schema/2/CIM_ResourceAllocationSettingData" xmlns:vssd="http://schemas.dmtf.org/wbem/wscim/1/cim-schema/2/CIM_VirtualSystemSettingData" xmlns:vmw="http://www.vmware.com/schema/ovf" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"';
    }
    public function getNetworkServices() {
        return $this->NetworkServices;
    }
    public function setNetworkServices($NetworkServices) { 
        $this->NetworkServices = $NetworkServices;
    }
    public function addNetworkServices($value) { array_push($this->NetworkServices, $value); }
    public function getEdgeGatewayServices() {
        return $this->EdgeGatewayServices;
    }
    public function setEdgeGatewayServices($EdgeGatewayServices) { 
        $this->EdgeGatewayServices = $EdgeGatewayServices;
    }
    public function addEdgeGatewayServices($value) { array_push($this->EdgeGatewayServices, $value); }
    public function get_tagName() { return $this->tagName; }
    public function set_tagName($tagName) { $this->tagName = $tagName; }
    public function export($name=null, $out='', $level=0, $namespacedef=null, $namespace=null, $rootNS=null) {
        if (!isset($name)) {
            $name = $this->tagName;
        }
        $out = VMware_VCloud_API_Helper::showIndent($out, $level);
        if (is_null($namespace)) {
            $namespace = self::$defaultNS;
        }
        if (is_null($rootNS)) {
            $rootNS = self::$defaultNS;
        }
        if (NULL === $namespacedef) {
            $namespacedef = $this->namespacedef;
            if (0 >= strpos($namespacedef, 'xmlns=')) {
                $namespacedef = ' xmlns="' . self::$defaultNS . '"' . $namespacedef;
            }
        }
        $ns = VMware_VCloud_API_Helper::getNamespaceTag($this->namespace, $name, self::$defaultNS, $namespace, $rootNS);
        $out = VMware_VCloud_API_Helper::addString($out, '<' . $ns . $name . $namespacedef);
        $out = $this->exportAttributes($out, $level, $name, $namespacedef, $namespace, $rootNS);
        if ($this->hasContent()) {
            $out = VMware_VCloud_API_Helper::addString($out, ">\n");
            $out = $this->exportChildren($out, $level + 1, $name, $namespace, $rootNS);
            $out = VMware_VCloud_API_Helper::showIndent($out, $level);
            $out = VMware_VCloud_API_Helper::addString($out, "</" . $ns . $name . ">\n");
        } else {
            $out = VMware_VCloud_API_Helper::addString($out, "/>\n");
        }
        return $out;
    }
    protected function exportAttributes($out, $level, $name, $namespace, $rootNS) {
        $namespace = self::$defaultNS;
        return $out;
    }
    protected function exportChildren($out, $level, $name, $namespace, $rootNS) {
        $namespace = self::$defaultNS;
        if (isset($this->NetworkServices)) {
            foreach ($this->NetworkServices as $NetworkServices) {
                $out = $NetworkServices->export('NetworkServices', $out, $level, '', $namespace, $rootNS);
            }
        }
        if (isset($this->EdgeGatewayServices)) {
            foreach ($this->EdgeGatewayServices as $EdgeGatewayServices) {
                $out = $EdgeGatewayServices->export('EdgeGatewayServices', $out, $level, '', $namespace, $rootNS);
            }
        }
        return $out;
    }
    protected function hasContent() {
        if (
            !empty($this->NetworkServices) ||
            !empty($this->EdgeGatewayServices)
            ) {
            return true;
        } else {
            return false;
        }
    }
    public function build($node, $namespaces='') {
        $tagName = $node->tagName;
        $this->tagName = $tagName;
        if (strpos($tagName, ':') > 0) {
            list($namespace, $tagName) = explode(':', $tagName);
            $this->tagName = $tagName;
            $this->namespace[$tagName] = $namespace;
        }
        $this->buildAttributes($node, $namespaces);
        $children = $node->childNodes;
        foreach ($children as $child) {
            if ($child->nodeType == XML_ELEMENT_NODE || $child->nodeType == XML_TEXT_NODE) {
                $namespace = '';
                $nodeName = $child->nodeName;
                if (strpos($nodeName, ':') > 0) {
                    list($namespace, $nodeName) = explode(':', $nodeName);
                }
                $this->buildChildren($child, $nodeName, $namespace);
            }
        }
    }
    protected function buildAttributes($node, $namespaces='') {
        $attrs = $node->attributes;
        if (!empty($namespaces)) {
            $this->namespacedef = VMware_VCloud_API_Helper::constructNS($attrs, $namespaces, $this->namespacedef) . $this->namespacedef;
        }
        $nsUri = self::$defaultNS;
    }
    protected function buildChildren($child, $nodeName, $namespace='') {
        if ($child->nodeType == XML_ELEMENT_NODE && $nodeName == 'NetworkServices') {
            $obj = new VMware_VCloud_API_NetworkServiceInsertionType();
            $obj->build($child);
            $obj->set_tagName('NetworkServices');
            array_push($this->NetworkServices, $obj);
            if (!empty($namespace)) {
                $this->namespace['NetworkServices'] = $namespace;
            }
        }
        elseif ($child->nodeType == XML_ELEMENT_NODE && $nodeName == 'EdgeGatewayServices') {
            $obj = new VMware_VCloud_API_NetworkServiceInsertionType();
            $obj->build($child);
            $obj->set_tagName('EdgeGatewayServices');
            array_push($this->EdgeGatewayServices, $obj);
            if (!empty($namespace)) {
                $this->namespace['EdgeGatewayServices'] = $namespace;
            }
        }
    }
}