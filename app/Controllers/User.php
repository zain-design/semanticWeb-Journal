<?php

namespace App\Controllers;

use Kint\Parser\ToStringPlugin;

class User extends BaseController
{
    public function index()
    {
        echo view('v_home');
    }

    public function search()
    {
        \EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        \EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
        \EasyRdf\RdfNamespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');
        \EasyRdf\RdfNamespace::set('wd', 'http://www.wikidata.org/entity/');
        \EasyRdf\RdfNamespace::set('wdt', 'http://www.wikidata.org/prop/direct/');
        \EasyRdf\RdfNamespace::set('wikibase', 'http://wikiba.se/ontology#');
        \EasyRdf\RdfNamespace::set('bd', 'http://www.bigdata.com/rdf#');
        $sparql = new \EasyRdf\Sparql\Client('https://query.wikidata.org/sparql');
        $data = [];
        $data['type'] = '';
        $Year = '';
        $nextYear = '';

        $keywords = $this->request->getVar('query');
        if ($keywords == null or $keywords == 'All') {
            $keyword = '';
        } else {
            $keyword = $keywords;
        };
        $Years = $this->request->getVar('Year');
        if ($Years == null or $Years == 'All') {
            $Year = '1980';
            $nextYear = '2030';
        } else {
            $Year = $Years;
            $nextYear = $Years + 1;
        };


        $data['recordPublication'] = $sparql->query(
            'SELECT DISTINCT ?ID ?title ?date WHERE {' .
                '?ID wdt:P31 wd:Q13442814. ' .
                '?ID wdt:P1476 ?title; ' .
                'wdt:P577 ?date. ' .
                'FILTER (?date > "' . $Year . '-01-01T00:00:00+00:00"^^xsd:dateTime && ?date < "' . $nextYear . '-01-01T00:00:00+00:00"^^xsd:dateTime) ' .
                'FILTER(regex(?title,"' . $keyword . '" )) ' .
                'SERVICE wikibase:label { bd:serviceParam wikibase:language "[AUTO_LANGUAGE],en". }' .
                '}limit 100'
        );


        echo view('v_user_header', $data);
        echo view('v_search', $data);
        echo view('v_user_footer', $data);
    }
    public function publication($ID)
    {
        \EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        \EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
        \EasyRdf\RdfNamespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');
        \EasyRdf\RdfNamespace::set('wd', 'http://www.wikidata.org/entity/');
        \EasyRdf\RdfNamespace::set('wdt', 'http://www.wikidata.org/prop/direct/');
        \EasyRdf\RdfNamespace::set('wikibase', 'http://wikiba.se/ontology#');
        \EasyRdf\RdfNamespace::set('bd', 'http://www.bigdata.com/rdf#');
        $sparql = new \EasyRdf\Sparql\Client('https://query.wikidata.org/sparql');
        $data = [];
        $data['type']  = 'Publications';

        $data['recordPublication'] = $sparql->query(
            'SELECT distinct *' .
                'WHERE {' .
                '<http://www.wikidata.org/entity/' . $ID . '> wdt:P1476 ?title;' .
                'wdt:P577 ?date;' .
                'wdt:P1433 ?publisherID;' .
                'wdt:P356 ?DOI.' .
                '?publisherID wdt:P1476 ?publisher.' .
                'SERVICE wikibase:label { bd:serviceParam wikibase:language "[AUTO_LANGUAGE],en". } ' .
                '}'
        );
        $data['recordPerson'] = $sparql->query(
            'SELECT distinct *' .
                'WHERE {' .
                '{<http://www.wikidata.org/entity/' . $ID . '>  wdt:P2093 ?name.}' .
                'UNION' .
                '{<http://www.wikidata.org/entity/' . $ID . '>  wdt:P50 ?nameID.' .
                '?nameID rdfs:label ?name.' .
                'FILTER(langMatches(lang(?name), "en")).}' .
                'SERVICE wikibase:label { bd:serviceParam wikibase:language "[AUTO_LANGUAGE],en". } ' .
                '}'
        );
        $data['recordAnotherPublication'] = $sparql->query(
            'SELECT distinct *' .
                'WHERE {' .
                '<http://www.wikidata.org/entity/' . $ID . '> wdt:P2860 ?anotherID.' .
                '?anotherID wdt:P1476 ?title;' .
                'wdt:P577 ?date.' .
                'SERVICE wikibase:label { bd:serviceParam wikibase:language "[AUTO_LANGUAGE],en". } ' .
                '}'
        );

        echo view('v_user_header', $data);
        echo view('v_publication', $data);
        echo view('v_user_footer', $data);
    }

    public function person($person)
    {
        \EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        \EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
        \EasyRdf\RdfNamespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');
        \EasyRdf\RdfNamespace::set('wd', 'http://www.wikidata.org/entity/');
        \EasyRdf\RdfNamespace::set('wdt', 'http://www.wikidata.org/prop/direct/');
        \EasyRdf\RdfNamespace::set('wikibase', 'http://wikiba.se/ontology#');
        \EasyRdf\RdfNamespace::set('bd', 'http://www.bigdata.com/rdf#');
        $sparql = new \EasyRdf\Sparql\Client('https://query.wikidata.org/sparql');
        $data = [];
        $data['type']  = 'Persons';

        $data['recordPerson'] = $sparql->query(
            'SELECT DISTINCT ?ID ?name ?organization ?association WHERE {' .
                '?Person d:ID "' . $person . '";' .
                'd:name ?name;' .
                'd:organization ?organization;' .
                'd:association ?association.' .
                '}'
        );
        $data['recordPublication'] = $sparql->query(
            'SELECT DISTINCT ?DOI ?title ?type  WHERE {' .
                '?Publication d:writenBy ?Person.' .
                '?Person d:ID "' . $person . '".' .
                '?Publication d:title ?title;' .
                'd:DOI ?DOI;' .
                'd:type ?type;' .
                '}'
        );
        $data['listTopic'] = $sparql->query(
            'SELECT DISTINCT ?topic ?idTopic WHERE {' .
                '?Topics d:idTopic ?idTopic.' .
                '?Topics d:topic ?topic.' .
                '}'
        );



        echo view('v_user_header', $data);
        echo view('v_person', $data);
        echo view('v_user_footer', $data);
    }

    public function about()
    {
        \EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        \EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
        \EasyRdf\RdfNamespace::set('d', 'http://www.semanticweb.org/zainuzzuha/ontologies/2022/11/karya-ilmiah#');
        \EasyRdf\RdfNamespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');
        $sparql = new \EasyRdf\Sparql\Client('https://query.wikidata.org/sparql');

        $data = [];
        $data['type']  = 'about';
        $data['listTopic'] = $sparql->query(
            'SELECT DISTINCT ?topic ?idTopic WHERE {' .
                '?Topics d:idTopic ?idTopic.' .
                '?Topics d:topic ?topic.' .
                '}'
        );

        echo view('v_user_header', $data);
        echo view('v_about', $data);
        echo view('v_user_footer', $data);
    }
};
