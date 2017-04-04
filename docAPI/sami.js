
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">CSDT</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">CSR4</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Metadata</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:CSDT_CSR4_Metadata_Loader" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/Loader.html">Loader</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:CSDT_CSR4_Metadata_Loader_Abstracts" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/Loader/Abstracts.html">Abstracts</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_Loader_Abstracts_AbstractMetadataLoader" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/Abstracts/AbstractMetadataLoader.html">AbstractMetadataLoader</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR4_Metadata_Loader_Parser" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/Loader/Parser.html">Parser</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:CSDT_CSR4_Metadata_Loader_Parser_php" >                    <div style="padding-left:90px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/Loader/Parser/php.html">php</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:CSDT_CSR4_Metadata_Loader_Parser_php_Factory" >                    <div style="padding-left:108px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/Loader/Parser/php/Factory.html">Factory</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_Loader_Parser_php_Factory_ResolverFactory" >                    <div style="padding-left:134px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/Parser/php/Factory/ResolverFactory.html">ResolverFactory</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR4_Metadata_Loader_Parser_php_Validator" >                    <div style="padding-left:108px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/Loader/Parser/php/Validator.html">Validator</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_Loader_Parser_php_Validator_GroupValidator" >                    <div style="padding-left:134px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/Parser/php/Validator/GroupValidator.html">GroupValidator</a>                    </div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_Loader_Parser_php_Validator_ObjectOptionValidator" >                    <div style="padding-left:134px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/Parser/php/Validator/ObjectOptionValidator.html">ObjectOptionValidator</a>                    </div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_Loader_Parser_php_Validator_PropertyOptionValidator" >                    <div style="padding-left:134px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/Parser/php/Validator/PropertyOptionValidator.html">PropertyOptionValidator</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_Loader_Parser_php_PhpMetadataParser" >                    <div style="padding-left:116px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/Parser/php/PhpMetadataParser.html">PhpMetadataParser</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_Loader_Parser_MetadataFormatParserInterface" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html">MetadataFormatParserInterface</a>                    </div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_Loader_Parser_UnsupportedMetadataException" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/Parser/UnsupportedMetadataException.html">UnsupportedMetadataException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR4_Metadata_Loader_Traits" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/Loader/Traits.html">Traits</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_Loader_Traits_MetadataLoaderTrait" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html">MetadataLoaderTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_Loader_MetadataLoader" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/MetadataLoader.html">MetadataLoader</a>                    </div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_Loader_MetadataLoaderInterface" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html">MetadataLoaderInterface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR4_Metadata_ObjectMetadata" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/ObjectMetadata.html">ObjectMetadata</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:CSDT_CSR4_Metadata_ObjectMetadata_Abstracts" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/ObjectMetadata/Abstracts.html">Abstracts</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_ObjectMetadata_Abstracts_AbstractObjectMetadata" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/ObjectMetadata/Abstracts/AbstractObjectMetadata.html">AbstractObjectMetadata</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR4_Metadata_ObjectMetadata_Filter" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/ObjectMetadata/Filter.html">Filter</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_ObjectMetadata_Filter_MappedPropertyFilter" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/ObjectMetadata/Filter/MappedPropertyFilter.html">MappedPropertyFilter</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR4_Metadata_ObjectMetadata_Traits" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/ObjectMetadata/Traits.html">Traits</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_ObjectMetadata_Traits_ObjectMetadataTrait" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html">ObjectMetadataTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_ObjectMetadata_ObjectMetadata" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadata.html">ObjectMetadata</a>                    </div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_ObjectMetadata_ObjectMetadataInterface" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html">ObjectMetadataInterface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR4_Metadata_PropertyMetadata" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/PropertyMetadata.html">PropertyMetadata</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:CSDT_CSR4_Metadata_PropertyMetadata_Abstracts" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/PropertyMetadata/Abstracts.html">Abstracts</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_PropertyMetadata_Abstracts_AbstractObjectPropertyMetadata" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/PropertyMetadata/Abstracts/AbstractObjectPropertyMetadata.html">AbstractObjectPropertyMetadata</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR4_Metadata_PropertyMetadata_Traits" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/PropertyMetadata/Traits.html">Traits</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_PropertyMetadata_Traits_ObjectPropertyMetadataTrait" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/PropertyMetadata/Traits/ObjectPropertyMetadataTrait.html">ObjectPropertyMetadataTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_PropertyMetadata_ObjectPropertyMetadata" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadata.html">ObjectPropertyMetadata</a>                    </div>                </li>                            <li data-name="class:CSDT_CSR4_Metadata_PropertyMetadata_ObjectPropertyMetadataInterface" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html">ObjectPropertyMetadataInterface</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "CSDT.html", "name": "CSDT", "doc": "Namespace CSDT"},{"type": "Namespace", "link": "CSDT/CSR4.html", "name": "CSDT\\CSR4", "doc": "Namespace CSDT\\CSR4"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata.html", "name": "CSDT\\CSR4\\Metadata", "doc": "Namespace CSDT\\CSR4\\Metadata"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/Loader.html", "name": "CSDT\\CSR4\\Metadata\\Loader", "doc": "Namespace CSDT\\CSR4\\Metadata\\Loader"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/Loader/Abstracts.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Abstracts", "doc": "Namespace CSDT\\CSR4\\Metadata\\Loader\\Abstracts"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/Loader/Parser.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser", "doc": "Namespace CSDT\\CSR4\\Metadata\\Loader\\Parser"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/Loader/Parser/php.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php", "doc": "Namespace CSDT\\CSR4\\Metadata\\Loader\\Parser\\php"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Factory.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Factory", "doc": "Namespace CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Factory"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator", "doc": "Namespace CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/Loader/Traits.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Traits", "doc": "Namespace CSDT\\CSR4\\Metadata\\Loader\\Traits"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/ObjectMetadata.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata", "doc": "Namespace CSDT\\CSR4\\Metadata\\ObjectMetadata"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Abstracts.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Abstracts", "doc": "Namespace CSDT\\CSR4\\Metadata\\ObjectMetadata\\Abstracts"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Filter.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Filter", "doc": "Namespace CSDT\\CSR4\\Metadata\\ObjectMetadata\\Filter"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits", "doc": "Namespace CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/PropertyMetadata.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata", "doc": "Namespace CSDT\\CSR4\\Metadata\\PropertyMetadata"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/PropertyMetadata/Abstracts.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Abstracts", "doc": "Namespace CSDT\\CSR4\\Metadata\\PropertyMetadata\\Abstracts"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/PropertyMetadata/Traits.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits", "doc": "Namespace CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits"},
            {"type": "Interface", "fromName": "CSDT\\CSR4\\Metadata\\Loader", "fromLink": "CSDT/CSR4/Metadata/Loader.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "doc": "&quot;MetadataLoaderInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_setDebug", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::setDebug", "doc": "&quot;Set debug&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_setCache", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::setCache", "doc": "&quot;Set cache&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_addParser", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::addParser", "doc": "&quot;Add parser&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_load", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::load", "doc": "&quot;Load&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_getMetadata", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::getMetadata", "doc": "&quot;Get metadata&quot;"},
            
            {"type": "Interface", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface", "doc": "&quot;MetadataFormatParserInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html#method_support", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface::support", "doc": "&quot;Support&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html#method_parse", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface::parse", "doc": "&quot;Parse&quot;"},
            
            {"type": "Interface", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "doc": "&quot;ObjectMetadataInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getMappedClass", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getMappedClass", "doc": "&quot;Get mapped class&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getObjectProperties", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getObjectProperties", "doc": "&quot;Get object properties&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getObjectFactory", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getObjectFactory", "doc": "&quot;Get object factory&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getByMappedProperty", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getByMappedProperty", "doc": "&quot;Get by mapped property&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getDtoMapper", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getDtoMapper", "doc": "&quot;Get dto mapper&quot;"},
            
            {"type": "Interface", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "doc": "&quot;ObjectPropertyMetadataInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getMappedTransformer", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getMappedTransformer", "doc": "&quot;Get mapped transformer&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getMappingGroup", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getMappingGroup", "doc": "&quot;Get mapping group&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getTargetProperty", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getTargetProperty", "doc": "&quot;Get target property&quot;"},
            
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Abstracts", "fromLink": "CSDT/CSR4/Metadata/Loader/Abstracts.html", "link": "CSDT/CSR4/Metadata/Loader/Abstracts/AbstractMetadataLoader.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Abstracts\\AbstractMetadataLoader", "doc": "&quot;AbstractMetadataLoader.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Abstracts\\AbstractMetadataLoader", "fromLink": "CSDT/CSR4/Metadata/Loader/Abstracts/AbstractMetadataLoader.html", "link": "CSDT/CSR4/Metadata/Loader/Abstracts/AbstractMetadataLoader.html#method___construct", "name": "CSDT\\CSR4\\Metadata\\Loader\\Abstracts\\AbstractMetadataLoader::__construct", "doc": "&quot;Construct&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Abstracts\\AbstractMetadataLoader", "fromLink": "CSDT/CSR4/Metadata/Loader/Abstracts/AbstractMetadataLoader.html", "link": "CSDT/CSR4/Metadata/Loader/Abstracts/AbstractMetadataLoader.html#method_addParser", "name": "CSDT\\CSR4\\Metadata\\Loader\\Abstracts\\AbstractMetadataLoader::addParser", "doc": "&quot;Add parser&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Abstracts\\AbstractMetadataLoader", "fromLink": "CSDT/CSR4/Metadata/Loader/Abstracts/AbstractMetadataLoader.html", "link": "CSDT/CSR4/Metadata/Loader/Abstracts/AbstractMetadataLoader.html#method_load", "name": "CSDT\\CSR4\\Metadata\\Loader\\Abstracts\\AbstractMetadataLoader::load", "doc": "&quot;Load&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader", "fromLink": "CSDT/CSR4/Metadata/Loader.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoader.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoader", "doc": "&quot;MetadataLoader.php&quot;"},
                    
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader", "fromLink": "CSDT/CSR4/Metadata/Loader.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "doc": "&quot;MetadataLoaderInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_setDebug", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::setDebug", "doc": "&quot;Set debug&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_setCache", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::setCache", "doc": "&quot;Set cache&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_addParser", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::addParser", "doc": "&quot;Add parser&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_load", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::load", "doc": "&quot;Load&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html", "link": "CSDT/CSR4/Metadata/Loader/MetadataLoaderInterface.html#method_getMetadata", "name": "CSDT\\CSR4\\Metadata\\Loader\\MetadataLoaderInterface::getMetadata", "doc": "&quot;Get metadata&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface", "doc": "&quot;MetadataFormatParserInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html#method_support", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface::support", "doc": "&quot;Support&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/MetadataFormatParserInterface.html#method_parse", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\MetadataFormatParserInterface::parse", "doc": "&quot;Parse&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/UnsupportedMetadataException.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\UnsupportedMetadataException", "doc": "&quot;UnsupportedMetadataException.php&quot;"},
                    
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Factory", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Factory.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Factory/ResolverFactory.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Factory\\ResolverFactory", "doc": "&quot;ResolverFactory.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Factory\\ResolverFactory", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Factory/ResolverFactory.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Factory/ResolverFactory.html#method_getPropertyOptionResolver", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Factory\\ResolverFactory::getPropertyOptionResolver", "doc": "&quot;Get property option resolver&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Factory\\ResolverFactory", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Factory/ResolverFactory.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Factory/ResolverFactory.html#method_getObjectOptionResolver", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Factory\\ResolverFactory::getObjectOptionResolver", "doc": "&quot;Get object option resolver&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/PhpMetadataParser.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\PhpMetadataParser", "doc": "&quot;PhpMetadataParser.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\PhpMetadataParser", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/PhpMetadataParser.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/PhpMetadataParser.html#method___construct", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\PhpMetadataParser::__construct", "doc": "&quot;Construct&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\PhpMetadataParser", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/PhpMetadataParser.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/PhpMetadataParser.html#method_parse", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\PhpMetadataParser::parse", "doc": "&quot;Parse&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\PhpMetadataParser", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/PhpMetadataParser.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/PhpMetadataParser.html#method_support", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\PhpMetadataParser::support", "doc": "&quot;Support&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/GroupValidator.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\GroupValidator", "doc": "&quot;GroupValidator.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\GroupValidator", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/GroupValidator.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/GroupValidator.html#method_isValid", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\GroupValidator::isValid", "doc": "&quot;Is valid&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/ObjectOptionValidator.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\ObjectOptionValidator", "doc": "&quot;ObjectOptionValidator.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\ObjectOptionValidator", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/ObjectOptionValidator.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/ObjectOptionValidator.html#method___construct", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\ObjectOptionValidator::__construct", "doc": "&quot;Construct&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\ObjectOptionValidator", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/ObjectOptionValidator.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/ObjectOptionValidator.html#method_isValid", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\ObjectOptionValidator::isValid", "doc": "&quot;Is valid&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/PropertyOptionValidator.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\PropertyOptionValidator", "doc": "&quot;PropertyOptionValidator.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\PropertyOptionValidator", "fromLink": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/PropertyOptionValidator.html", "link": "CSDT/CSR4/Metadata/Loader/Parser/php/Validator/PropertyOptionValidator.html#method_isValid", "name": "CSDT\\CSR4\\Metadata\\Loader\\Parser\\php\\Validator\\PropertyOptionValidator::isValid", "doc": "&quot;Is valid&quot;"},
            
            {"type": "Trait", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Traits", "fromLink": "CSDT/CSR4/Metadata/Loader/Traits.html", "link": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html", "name": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait", "doc": "&quot;MetadataLoaderTrait.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait", "fromLink": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html", "link": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html#method_addParser", "name": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait::addParser", "doc": "&quot;Add parser&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait", "fromLink": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html", "link": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html#method_getMetadata", "name": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait::getMetadata", "doc": "&quot;Get metadata&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait", "fromLink": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html", "link": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html#method_load", "name": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait::load", "doc": "&quot;Load&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait", "fromLink": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html", "link": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html#method_setCache", "name": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait::setCache", "doc": "&quot;Set cache&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait", "fromLink": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html", "link": "CSDT/CSR4/Metadata/Loader/Traits/MetadataLoaderTrait.html#method_setDebug", "name": "CSDT\\CSR4\\Metadata\\Loader\\Traits\\MetadataLoaderTrait::setDebug", "doc": "&quot;Set debug&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Abstracts", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Abstracts.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Abstracts/AbstractObjectMetadata.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Abstracts\\AbstractObjectMetadata", "doc": "&quot;AbstractObjectMetadata.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Abstracts\\AbstractObjectMetadata", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Abstracts/AbstractObjectMetadata.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Abstracts/AbstractObjectMetadata.html#method___construct", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Abstracts\\AbstractObjectMetadata::__construct", "doc": "&quot;Construct&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Filter", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Filter.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Filter/MappedPropertyFilter.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Filter\\MappedPropertyFilter", "doc": "&quot;MappedPropertyFilter.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Filter\\MappedPropertyFilter", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Filter/MappedPropertyFilter.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Filter/MappedPropertyFilter.html#method___construct", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Filter\\MappedPropertyFilter::__construct", "doc": "&quot;Constructor&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Filter\\MappedPropertyFilter", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Filter/MappedPropertyFilter.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Filter/MappedPropertyFilter.html#method_isAvailable", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Filter\\MappedPropertyFilter::isAvailable", "doc": "&quot;Is available&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadata.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadata", "doc": "&quot;ObjectMetadata.php&quot;"},
                    
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "doc": "&quot;ObjectMetadataInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getMappedClass", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getMappedClass", "doc": "&quot;Get mapped class&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getObjectProperties", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getObjectProperties", "doc": "&quot;Get object properties&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getObjectFactory", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getObjectFactory", "doc": "&quot;Get object factory&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getByMappedProperty", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getByMappedProperty", "doc": "&quot;Get by mapped property&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getDtoMapper", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getDtoMapper", "doc": "&quot;Get dto mapper&quot;"},
            
            {"type": "Trait", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "doc": "&quot;ObjectMetadataTrait.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_getDtoClass", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::getDtoClass", "doc": "&quot;Get dto class&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_getMappedClass", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::getMappedClass", "doc": "&quot;Get mapped class&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_getByMappedProperty", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::getByMappedProperty", "doc": "&quot;Get by mapped property&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_getObjectProperties", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::getObjectProperties", "doc": "&quot;Get object properties&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_getObjectFactory", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::getObjectFactory", "doc": "&quot;Get object factory&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_getDtoMapper", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::getDtoMapper", "doc": "&quot;Get dto mapper&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_current", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::current", "doc": "&quot;Current&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_next", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::next", "doc": "&quot;Next&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_key", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::key", "doc": "&quot;Key&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_valid", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::valid", "doc": "&quot;Valid&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/Traits/ObjectMetadataTrait.html#method_rewind", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\Traits\\ObjectMetadataTrait::rewind", "doc": "&quot;Rewind&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Abstracts", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/Abstracts.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/Abstracts/AbstractObjectPropertyMetadata.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Abstracts\\AbstractObjectPropertyMetadata", "doc": "&quot;AbstractObjectPropertyMetadata.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Abstracts\\AbstractObjectPropertyMetadata", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/Abstracts/AbstractObjectPropertyMetadata.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/Abstracts/AbstractObjectPropertyMetadata.html#method___construct", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Abstracts\\AbstractObjectPropertyMetadata::__construct", "doc": "&quot;Construct&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadata.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadata", "doc": "&quot;ObjectPropertyMetadata.php&quot;"},
                    
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "doc": "&quot;ObjectPropertyMetadataInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getMappedTransformer", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getMappedTransformer", "doc": "&quot;Get mapped transformer&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getMappingGroup", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getMappingGroup", "doc": "&quot;Get mapping group&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getTargetProperty", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getTargetProperty", "doc": "&quot;Get target property&quot;"},
            
            {"type": "Trait", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/Traits.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/Traits/ObjectPropertyMetadataTrait.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits\\ObjectPropertyMetadataTrait", "doc": "&quot;ObjectPropertyMetadataTrait.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits\\ObjectPropertyMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/Traits/ObjectPropertyMetadataTrait.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/Traits/ObjectPropertyMetadataTrait.html#method_getMappedTransformer", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits\\ObjectPropertyMetadataTrait::getMappedTransformer", "doc": "&quot;Get mapped transformer&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits\\ObjectPropertyMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/Traits/ObjectPropertyMetadataTrait.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/Traits/ObjectPropertyMetadataTrait.html#method_getMappingGroup", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits\\ObjectPropertyMetadataTrait::getMappingGroup", "doc": "&quot;Get mapping group&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits\\ObjectPropertyMetadataTrait", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/Traits/ObjectPropertyMetadataTrait.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/Traits/ObjectPropertyMetadataTrait.html#method_getTargetProperty", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\Traits\\ObjectPropertyMetadataTrait::getTargetProperty", "doc": "&quot;Get target property&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


