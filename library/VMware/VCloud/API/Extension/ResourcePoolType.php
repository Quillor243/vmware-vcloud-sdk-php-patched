<?php
class VMware_VCloud_API_Extension_ResourcePoolType extends VMware_VCloud_API_EntityType {
    protected $MoRef = null;
    protected $VimObjectType = null;
    protected $DataStoreRefs = null;
    protected $namespace = array();
    protected $namespacedef = null;
    protected $tagName = null;
    public static $defaultNS = 'http://www.vmware.com/vcloud/extension/v1.5';

   /**
    * @param array $VCloudExtension - [optional] an array of VMware_VCloud_API_VCloudExtensionType objects
    * @param anyURI $href - [optional] an attribute, 
    * @param string $type - [optional] an attribute, 
    * @param array $Link - [optional] an array of VMware_VCloud_API_LinkType objects
    * @param string $operationKey - [optional] an attribute, 
    * @param string $id - [optional] an attribute, 
    * @param string $name - [required] an attribute, 
    * @param string $Description - [optional] 
    * @param VMware_VCloud_API_TasksInProgressType $Tasks - [optional]
    * @param string $MoRef - [required] 
    * @param string $VimObjectType - [required] 
    * @param VMware_VCloud_API_Extension_VimObjectRefsType $DataStoreRefs - [optional]
    */
    public function __construct($VCloudExtension=null, $href=null, $type=null, $Link=null, $operationKey=null, $id=null, $name=null, $Description=null, $Tasks=null, $MoRef=null, $VimObjectType=null, $DataStoreRefs=null) {
        parent::__construct($VCloudExtension, $href, $type, $Link, $operationKey, $id, $name, $Description, $Tasks);
        $this->MoRef = $MoRef;
        $this->VimObjectType = $VimObjectType;
        $this->DataStoreRefs = $DataStoreRefs;
        $this->tagName = 'Entity';
        $this->namespacedef = ' xmlns:vmext="http://www.vmware.com/vcloud/extension/v1.5" xmlns:vcloud="http://www.vmware.com/vcloud/v1.5" xmlns:vmw="http://www.vmware.com/schema/ovf" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"';
    }
    public function getMoRef() {
        return $this->MoRef;
    }
    public function setMoRef($MoRef) { 
        $this->MoRef = $MoRef;
    }
    public function getVimObjectType() {
        return $this->VimObjectType;
    }
    public function setVimObjectType($VimObjectType) { 
        $this->VimObjectType = $VimObjectType;
    }
    public function getDataStoreRefs() {
        return $this->DataStoreRefs;
    }
    public function setDataStoreRefs($DataStoreRefs) { 
        $this->DataStoreRefs = $DataStoreRefs;
    }
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
            if (0 >= strpos($namespacedef, 'xsi:type')) {
                $namespacedef = $namespacedef . " xsi:type='ResourcePoolType'";
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
        $out = parent::exportAttributes($out, $level, $name, $namespace, $rootNS);
        return $out;
    }
    protected function exportChildren($out, $level, $name, $namespace, $rootNS) {
        $namespace = self::$defaultNS;
        $out = parent::exportChildren($out, $level, $name, $namespace, $rootNS);
        if (!is_null($this->MoRef)) {
            $out = VMware_VCloud_API_Helper::showIndent($out, $level);
            $ns = VMware_VCloud_API_Helper::getNamespaceTag($this->namespace, 'MoRef', self::$defaultNS, $namespace, $rootNS);
            $out = VMware_VCloud_API_Helper::addString($out, "<" . $ns . "MoRef>" . VMware_VCloud_API_Helper::quote_xml(VMware_VCloud_API_Helper::format_string(mb_convert_encoding($this->MoRef, VMware_VCloud_API_Helper::$ExternalEncoding, "auto"), $input_name='MoRef')) . "</" . $ns . "MoRef>\n");
        }
        if (!is_null($this->VimObjectType)) {
            $out = VMware_VCloud_API_Helper::showIndent($out, $level);
            $ns = VMware_VCloud_API_Helper::getNamespaceTag($this->namespace, 'VimObjectType', self::$defaultNS, $namespace, $rootNS);
            $out = VMware_VCloud_API_Helper::addString($out, "<" . $ns . "VimObjectType>" . VMware_VCloud_API_Helper::quote_xml(VMware_VCloud_API_Helper::format_string(mb_convert_encoding($this->VimObjectType, VMware_VCloud_API_Helper::$ExternalEncoding, "auto"), $input_name='VimObjectType')) . "</" . $ns . "VimObjectType>\n");
        }
        if (!is_null($this->DataStoreRefs)) {
            $out = $this->DataStoreRefs->export('DataStoreRefs', $out, $level, '', $namespace, $rootNS);
        }
        return $out;
    }
    protected function hasContent() {
        if (
            !is_null($this->MoRef) ||
            !is_null($this->VimObjectType) ||
            !is_null($this->DataStoreRefs) ||
            parent::hasContent()
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
        parent::buildAttributes($node, $namespaces);
    }
    protected function buildChildren($child, $nodeName, $namespace='') {
        if ($child->nodeType == XML_ELEMENT_NODE && $nodeName == 'MoRef') {
            $sval = $child->nodeValue;
            $this->MoRef = $sval;
            if (!empty($namespace)) {
                $this->namespace['MoRef'] = $namespace;
            }
        }
        elseif ($child->nodeType == XML_ELEMENT_NODE && $nodeName == 'VimObjectType') {
            $sval = $child->nodeValue;
            $this->VimObjectType = $sval;
            if (!empty($namespace)) {
                $this->namespace['VimObjectType'] = $namespace;
            }
        }
        elseif ($child->nodeType == XML_ELEMENT_NODE && $nodeName == 'DataStoreRefs') {
            $obj = new VMware_VCloud_API_Extension_VimObjectRefsType();
            $obj->build($child);
            $obj->set_tagName('DataStoreRefs');
            $this->setDataStoreRefs($obj);
            if (!empty($namespace)) {
                $this->namespace['DataStoreRefs'] = $namespace;
            }
        }
        parent::buildChildren($child, $nodeName, $namespace);
    }
}