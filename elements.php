<?php
/**
 * List of Europeana Element Set
 *
 * @see http://pro.europeana.eu/share-your-data/data-guidelines/ese-documentation
 * @version 3.4
 */

$elementSetMetadata = array(
    'name' => 'Europeana',
    'description' => 'Specific elements of the Europeana Semantic Elements.',
    'record_type' => 'Item',
);

$elements = array(
    array(
        'name' => 'country',
        'label' => 'Country',
        'description' => 'The name of the country of the data provider or “Europe” in the case of Europe-wide projects.',
    ),
    array(
        'name' => 'dataProvider',
        'label' => 'Europeana Data Provider',
        'description' => 'The name or identifier of the organisation that contributes data to Europeana.',
    ),
    array(
        'name' => 'isShownAt',
        'label' => 'Is Shown At',
        'description' => "An unambiguous URL reference to the digital object on the provider’s web site in its full information context.",
        '_refines' => 'Relation',
    ),
    array(
        'name' => 'isShownBy',
        'label' => 'Is Shown By',
        'description' => "An unambiguous URL reference to the digital object on the provider’s web site in the best available resolution/quality.",
        '_refines' => 'Relation',
    ),
    array(
        'name' => 'language',
        'label' => 'Europeana Language',
        'description' => 'A standardised representation of the name of a language used to support the language facet in the portal.',
    ),
    array(
        'name' => 'object',
        'label' => 'Object',
        'description' => 'The URL of a suitable source image in the best resolution available on the web site of the data provider from which small images could be generated for use in the portal. This will often be the same URL as given in europeana:isShownBy.',
    ),
    array(
        'name' => 'provider',
        'label' => 'Europeana Provider',
        'description' => 'Name of the organization that delivers data to Europeana.',
    ),
    array(
        'name' => 'rights',
        'label' => 'Europeana Rights',
        'description' => 'Information about copyright of the digital object that is specified in isShownBy and isShownAt and, by extension, to the preview images used in the portal.',
    ),
    array(
        'name' => 'type',
        'label' => 'Europeana Type',
        'description' => 'The Europeana material type of the resource.',
    ),
    array(
        'name' => 'ugc',
        'label' => 'UGC',
        'description' => 'This element is used to identify user generated content (also called user created content). It should be applied to all digitised or born digital content contributed by the general public or collected by Europeana through a crowdsourcing initiative or project.',
    ),
    array(
        'name' => 'unstored',
        'label' => 'Unstored',
        'description' => 'This is a container element which can include all relevant information that otherwise cannot be mapped to another element in the ESE.',
    ),
    array(
        'name' => 'uri',
        'label' => 'Europeana URI',
        'description' => "An unambiguous URI to the resource within Europeana’s context.",
    ),
    array(
        'name' => 'userTag',
        'label' => 'User Tag',
        'description' => 'This is a tag created by a user through the Europeana interface.',
    ),
    array(
        'name' => 'year',
        'label' => 'Europeana Year',
        'description' => 'A point of time associated with an event in the life of the original analog or born digital object.',
    ),
);
