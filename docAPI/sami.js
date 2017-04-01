
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">CSDT</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">CSR4</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Metadata</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:CSDT_CSR4_Metadata_ObjectMetadata" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/ObjectMetadata.html">ObjectMetadata</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_ObjectMetadata_ObjectMetadataInterface" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html">ObjectMetadataInterface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR4_Metadata_PropertyMetadata" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR4/Metadata/PropertyMetadata.html">PropertyMetadata</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR4_Metadata_PropertyMetadata_ObjectPropertyMetadataInterface" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html">ObjectPropertyMetadataInterface</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "CSDT.html", "name": "CSDT", "doc": "Namespace CSDT"},{"type": "Namespace", "link": "CSDT/CSR4.html", "name": "CSDT\\CSR4", "doc": "Namespace CSDT\\CSR4"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata.html", "name": "CSDT\\CSR4\\Metadata", "doc": "Namespace CSDT\\CSR4\\Metadata"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/ObjectMetadata.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata", "doc": "Namespace CSDT\\CSR4\\Metadata\\ObjectMetadata"},{"type": "Namespace", "link": "CSDT/CSR4/Metadata/PropertyMetadata.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata", "doc": "Namespace CSDT\\CSR4\\Metadata\\PropertyMetadata"},
            {"type": "Interface", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "doc": "&quot;ObjectMetadataInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getMappedClass", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getMappedClass", "doc": "&quot;Get mapped class&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getObjectProperties", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getObjectProperties", "doc": "&quot;Get object properties&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getObjectFactory", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getObjectFactory", "doc": "&quot;Get object factory&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getByMappedProperty", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getByMappedProperty", "doc": "&quot;Get by mapped property&quot;"},
            
            {"type": "Interface", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "doc": "&quot;ObjectPropertyMetadataInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getMappedTransformer", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getMappedTransformer", "doc": "&quot;Get mapped transformer&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getMappingGroup", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getMappingGroup", "doc": "&quot;Get mapping group&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getTargetProperty", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getTargetProperty", "doc": "&quot;Get target property&quot;"},
            
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "doc": "&quot;ObjectMetadataInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getMappedClass", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getMappedClass", "doc": "&quot;Get mapped class&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getObjectProperties", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getObjectProperties", "doc": "&quot;Get object properties&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getObjectFactory", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getObjectFactory", "doc": "&quot;Get object factory&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html", "link": "CSDT/CSR4/Metadata/ObjectMetadata/ObjectMetadataInterface.html#method_getByMappedProperty", "name": "CSDT\\CSR4\\Metadata\\ObjectMetadata\\ObjectMetadataInterface::getByMappedProperty", "doc": "&quot;Get by mapped property&quot;"},
            
            {"type": "Class", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "doc": "&quot;ObjectPropertyMetadataInterface.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getMappedTransformer", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getMappedTransformer", "doc": "&quot;Get mapped transformer&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getMappingGroup", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getMappingGroup", "doc": "&quot;Get mapping group&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface", "fromLink": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html", "link": "CSDT/CSR4/Metadata/PropertyMetadata/ObjectPropertyMetadataInterface.html#method_getTargetProperty", "name": "CSDT\\CSR4\\Metadata\\PropertyMetadata\\ObjectPropertyMetadataInterface::getTargetProperty", "doc": "&quot;Get target property&quot;"},
            
            
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


