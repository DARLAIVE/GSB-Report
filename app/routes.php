<?php

use Symfony\Component\HttpFoundation\Request;

// Home page
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
});

// Details for a drug
$app->get('/drugs/{id}', function($id) use ($app) {
    $drug = $app['dao.drug']->find($id);
    return $app['twig']->render('drug.html.twig', array('drug' => $drug));
});

// Details for a practitionner
$app->get('/practitioners/{id}', function($id) use ($app) {
    $practitionner = $app['dao.practitionner']->find($id);
    return $app['twig']->render('practitionner.html.twig', array('practitionner' => $practitionner));
});

// List of all drugs
$app->get('/drugs/', function() use ($app) {
    $drugs = $app['dao.drug']->findAll();
    return $app['twig']->render('drugs.html.twig', array('drugs' => $drugs));
});

// List of all practitionners
$app->get('/practitionners/', function() use ($app) {
    $practitionners = $app['dao.practitionner']->findAll();
    return $app['twig']->render('practitionners.html.twig', array('practitionners' => $practitionners));
});

// Search form for drugs
$app->get('/drugs/search/', function() use ($app) {
    $families = $app['dao.family']->findAll();
    return $app['twig']->render('drugs_search.html.twig', array('families' => $families));
});

// Search form for practitionners
$app->get('/practitionners/search/', function() use ($app) {
    $families = $app['dao.family']->findAll();
    return $app['twig']->render('practitionners_search.html.twig', array('families' => $families));
});

// Results page for drugs
$app->post('/drugs/results/', function(Request $request) use ($app) {
    $familyId = $request->request->get('family');
    $drugs = $app['dao.drug']->findAllByFamily($familyId);
    return $app['twig']->render('drugs_results.html.twig', array('drugs' => $drugs));
});

// Results page for practitionners
$app->post('/practitionners/results/', function(Request $request) use ($app) {
    $familyId = $request->request->get('family');
    $practitionners = $app['dao.practitionner']->findAllByFamily($familyId);
    return $app['twig']->render('practitionners_results.html.twig', array('practitionners' => $practitionners));
});