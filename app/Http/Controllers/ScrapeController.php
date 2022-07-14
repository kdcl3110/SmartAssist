<?php

/*namespace App\Http\Controllers;

use Goutte\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Cookie\CookieJar;
use guzzlehttp\guzzle;

use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Illuminate\View\View;

class ScrapeController extends Controller
{
  public function index()
  {

    // create a new client, via Guzzle
    $client = new Client();
    $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/');
   $crawler = $client->click($crawler->selectLink('Faculté des Sciences (FS)')->link());
    // var_dump($client->getCookieJar()->get('csrftoken')->getValue());
    $form = $crawler->selectButton('Suivant')->form();
    $token = $form->get('csrfmiddlewaretoken')->getValue();
    var_dump($token)
    //return view("scrape",compact('token'));
   // echo $client->getCookieJar()->get('csrftoken');
 /$cookieJar = CookieJar::fromArray([ 
      'csrftoken' => $client->getCookieJar()->get('csrftoken')->getValue(),
      'code_fac' => 2,
      'fac' => 'Facult%C3%A9%20des%20Sciences%20(FS)' 
      // '_ga' => $client->getCookieJar()->get('_ga')->getValue(),
      // 'code_fac' => $client->getCookieJar()->get('code_fac')->getValue(),
      // '_gid' => $client->getCookieJar()->get('_gid')->getValue(),
      // 'codeUnique' => $client->getCookieJar()->get('codeUnique')->getValue(),
      // 'fac' => $client->getCookieJar()->get('fac')->getValue(),
    ], 'www.preinscriptions.uninet.cm');
  
    $clients = new \GuzzleHttp\Client([
      'base_uri' => 'https://www.preinscriptions.uninet.cm/formulaire/'
    ]);

  $body = [
      'faculte' => 2,
      'prenom' => 'aimee',
      'nom' => 'jiomo',
      'datenaissance' => '15/04/2022',
      'dateprecise' => 'Oui',
      'lieunaissance' => 'YAOUNDE',
      'numerocni' => '11043456',
      'sexe' => 'FEMININ',
      'adresse' => 'obili',
      'telephone' => '69966592',
      'email' => 'aimeejiomo@gmail.com',
      'statutmarital' => 'CELIBATAIRE',
      'premierelangue' => 'FRANÇAIS',
      'statutprofessionnel' => 'SANS EMPLOI',
      // 'profession' =>,
      'csrfmiddlewaretoken' => $token,
  ];
   try {
   

  // $response = $clients->request('POST', 'step_1/', ['cookies' => $cookieJar, 'form_params' => $body, 'headers' => [
  //   'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.5 Safari/605.1.15'
  // ]]);
  //var_dump($response->getBody());
  $response = Http::withOptions([
    'cookies' => $cookieJar,
    'headers' => [
      'X-CSRFToken' => $client->getCookieJar()->get('csrftoken')->getValue(),
      'Origin' => 'https//www.preinscriptions.uninet.cm',
      'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.5 Safari/605.1.15'
    ]
    ])-> post('https://www.preinscriptions.uninet.cm/formulaire/step_1/', [
        'faculte' => 2,
        'prenom' => 'aimee',
        'nom' => 'jiomo',
        'datenaissance' => '15/04/2022',
        'dateprecise' => 'Oui',
        'lieunaissance' => 'YAOUNDE',
        'numerocni' => '11043456',
        'sexe' => 'FEMININ',
        'adresse' => 'obili',
        'telephone' => '69966592',
        'email' => 'aimeejiomo@gmail.com',
        'statutmarital' => 'CELIBATAIRE',
        'premierelangue' => 'FRANÇAIS',
        'statutprofessionnel' => 'SANS EMPLOI',
        'csrfmiddlewaretoken' => $token,
      ]);
      echo '<pre>';
      print_r($response->body() );
      echo '</pre>';

      
    } catch (RequestException $th) {
      // print_r($th);
      throw $th;
    } 

    //   // $h2 = $crawler->filter("body > div.container.content > div > div.col-md-6 > h3")->text();
    //   //   echo($h2."\n"); 
    //     $form = $crawler->selectButton('Suivant')->form();
    //     $form->disableValidation();
    //     $token = $form->get('csrfmiddlewaretoken')->getValue();

    //     $response = Http::post('https://www.preinscriptions.uninet.cm/', [
    //       'csrfmiddlewaretoken' => $token,
    //       'nom' => 'jiomo', 
    //       'prenom' => 'aimee', 
    //         'datenaissance' => '15/04/2022',
    //        'dateprecise' => 'Oui', 
    //        'lieunaissance' => 'YAOUNDE', 
    //        'numerocni' => '11043456', 
    //        'sexe' => 'FEMININ', 
    //        'adresse' => 'obili', 
    //        'telephone' => '69966592', 
    //        'email' => 'aimeejiomo@gmail.com', 
    //        'statutmarital' => 'CELIBATAIRE', 
    //        'premierelangue' => 'FRANÇAIS',
    //        'statutprofessionnel' => 'SANS EMPLOI'
    //   ]);

    // try {
    //   //code...
    //   $crawler = $client->submit($form, [
    //     'nom' => 'jiomo', 
    //     'prenom' => 'aimee', 
    //     'datenaissance' => '15/04/2022',
    //    'dateprecise' => 'Oui', 
    //    'lieunaissance' => 'YAOUNDE', 
    //    'numerocni' => '11043456', 
    //    'sexe' => 'FEMININ', 
    //    'adresse' => 'obili', 
    //    'telephone' => '69966592', 
    //    'email' => 'aimeejiomo@gmail.com', 
    //    'statutmarital' => 'CELIBATAIRE', 
    //    'premierelangue' => 'FRANÇAIS',
    //    'statutprofessionnel' => 'SANS EMPLOI'
    //   ]);
    //   // echo 'good';
    //   // $h2 = $crawler->filter("#div_id_paiement > label")->text();
    //   echo $form->getUrl();
    // } catch (RequestException $th) {
    //   //throw $th;
    //   var_dump($th->getRequest());
    // }




    // select the form and fill in some values
    /*   $form = $crawler->selectButton('Suivant')->form();
    $form['nom'] = 'aimeejiomo';
    $form['prenom'] = 'jiomo';
    $form['datenaissance'] = '2010-06-05';
    $form['dateprecise'] = 'Oui';
    $form['lieunaissance'] = 'YAOUNDE';
    $form['numerocni'] = '11043456';
    $form['sexe'] = 'FEMININ';
    $form['adresse'] = 'obili';
    $form['telephone'] = '69966592';
    $form['email'] = 'aimeejiomo@gmail.com';
    $form['statutmarital'] = 'CELIBATAIRE';
    $form['premierelangue'] = 'FRANÇAIS';
    $form['statutprofessionnel'] = 'SANS EMPLOI';

    // submit that form
    $crawler = $client->submit($form); */
    // we are now logged in and can navigate the site
    // Click the Explore Link
    // $link = $crawler->selectLink('Informations de paiement')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Suivant')->form();
    // $form['paiement'] = 'EXPRESS UNION';
    // $form['numerotransaction'] = '12345678';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Informations de filiation')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("#div_id_paiement > label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Suivant')->form();
    // $form['nationalite'] = '1';
    // $form['regionorigine'] = '8';
    // //$form['departementorigine'] = '8';
    // $form['nompere'] = 'alain';
    // $form['professionpere'] = 'Policier';
    // $form['nommere'] = 'anne';
    // $form['professionmere'] = 'Professeur';
    // $form['nomurgence'] = 'Tagne';
    // $form['telurgence'] = '699785643';
    // $form['villeurgence'] = 'Yaoundé';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Faculté et études souhaitées')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("#div_id_faculte > label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Suivant')->form();
    // $form['faculte'] = 'Faculté des Sciences (FS)';
    // $form['niveau'] = 'L1';
    // $form['premierchoix'] = '';
    // $form['secondchoix'] = '';
    // $form['troisiemechoix'] = '';
    // $form['statutdesire'] = 'camerounais';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Diplômes présentés')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("#div_id_diplome > label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Suivant')->form();
    // $form['diplome'] = '1';
    // $form['serie'] = 'C';
    // $form['anneeobtention'] = '2021';
    // $form['moyenne'] = '11.2';
    // $form['detailjury'] = '1';
    // $form['emetteur'] = 'moi';
    // $form['date_emission'] = '01-06-2022';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Informations sportives')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("#div_id_sport > label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Terminer')->form();
    // $form['sport'] = 'volleyball';
    // $form['autresport'] = 'aucun';
    // $form['art'] = 'theatre';
    // $form['autreart'] = 'aucun';
    // $form['handicap'] = 'Non';
    // $form['numcertifmedical'] = '12345678';
    // $form['etabcertifmedical'] = 'yde';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Telecharger sa fiche')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("body > div.container.content > div > div > div:nth-child(4) > h3")->text();
    // echo($h2."\n");
  //}
//};
       /*$client = new Client();
       $url = "https://www.bbc.com/news/topics/cgdzpg5yvdvt/stock-markets";
        $crawler = $client->request('GET', $url);
        //$news = $crawler->filter("h2")->text();
        $news = $crawler->filter('p')->text(); 
        $crawler = $client->request('GET', 'https://github.com/');
        $crawler = $crawler->click($crawler->selectLink('Sign in')->link());*/
     /*   public function index()
    {


        $client = new Client();
        $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/');
        $crawler = $client->click($crawler->selectLink('Faculté des Sciences (FS)')->link());
       $h2 = $crawler->filter("body > div.container.content > div > div.col-md-6 > h3")->text();
        echo($h2."\n"); 
       $form = $crawler->selectButton('Suivant')->form();
        $crawler = $client->submit($form, [
        'nom' => 'jiomo', 
        'prenom' => 'aimee', 
        'datenaissance' => '15/04/2022',
         'dateprecise' => 'Oui', 
         'lieunaissance' => 'YAOUNDE', 
         'numerocni' => '11043456', 
         'sexe' => 'FEMININ', 
         'adresse' => 'obili', 
         'telephone' => '69966592', 
         'email' => 'aimeejiomo@gmail.com', 
         'statutmarital' => 'CELIBATAIRE', 
         'premierelangue' => 'FRANÇAIS',
         'statutprofessionnel' => 'SANS EMPLOI', ]);
        //  $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/autre/');
        $h2 = $crawler->filter("#div_id_numerotransaction > label")->text();
         echo($h2."\n"); 
        // $form = $crawler->selectButton('Suivant')->form();
        //  $crawler = $client->submit($form, [
        //     'paiement' => 'EXPRESS UNION', 
        //     'numerotransaction' => '12345678', 
        // ]);
    //   $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/filiation/');
    //    $h2 = $crawler->filter("#div_id_nationalite > label")->text();
    //     echo($h2."\n"); 
    //    $form = $crawler->selectButton('Suivant')->form();
    //    $crawler = $client->submit($form, [ 
    //     'nationalite' => '1', 
    //     'regionorigine' => '8', 
    //     //'departementorigine' => 'Menoua', 
    //     'nompere' => 'alain', 
    //     'professionpere' => 'Policier', 
    //     'nommere' => 'anne', 
    //     'professionmere' => 'Professeur', 
    //     'nomurgence' => 'Tagne', 
    //     'telurgence' => '699785643', 
    //     'villeurgence' => 'Yaoundé', 
    // ]);
    // $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/faculte/');
    // $h2 = $crawler->filter("#div_id_faculte > label")->text();
    // echo($h2."\n"); 
    //     $form = $crawler->selectButton('Suivant')->form();
    //     $crawler = $client->submit($form, [ 
    //      'faculte' => 'Faculté des Sciences (FS)', 
    //      'niveau' => 'L1', 
    //      'premierchoix' => '', 
    //      'secondchoix' => '', 
    //      'troisiemechoix' => '', 
    //      'statutdesire' => 'camerounais', 
    //     ]);   
        
    //     $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/diplome/');
    //     $h2 = $crawler->filter("#div_id_diplome > label")->text();
    //     echo($h2."\n"); 
    //     $form = $crawler->selectButton('Suivant')->form();
    //     $crawler = $client->submit($form, [ 
    //      'diplome' => '1', 
    //      'serie' => 'C', 
    //      'anneeobtention' => '2021', 
    //      'moyenne' => '11.2',
    //       'detailjury' => '1', 
    //       'emetteur' => 'moi', 
    //       'date_emission' => '01/06/2022', ]); 
    //     $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/sport/');
    //     $h2 = $crawler->filter("#div_id_sport > div > div:nth-child(2) > label")->text();
    //     echo($h2."\n"); 
    //     $form = $crawler->selectButton('Terminer')->form();
    //     $crawler = $client->submit($form, [ 
    //       'sport' => 'volleyball', 
    //       'autresport' => 'aucun', 
    //       'art' => 'theatre', 
    //       'autreart' => 'aucun', 
    //       'handicap' => 'Non', 
    //       'numcertifmedical' => '12345678', 
    //      'etabcertifmedical' => 'yde',]);
    //     $h1 = $crawler->filter("body > div.container.content")->text();
    //      echo($h1."\n");  
        /*$crawler = $client->click($crawler->selectLink('#actions > a:nth-child(3)')->link());*/


/*namespace App\Http\Controllers;

use Goutte\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use guzzlehttp\guzzle;

use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;

class ScrapeController extends Controller
{
  public function index()
  {

    // create a new client, via Guzzle
    $client = new Client();
    $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/');
    $crawler = $client->click($crawler->selectLink('Faculté des Sciences (FS)')->link());
    // var_dump($client->getCookieJar()->get('csrftoken')->getValue());
    $form = $crawler->selectButton('Suivant')->form();
    $token = $form->get('csrfmiddlewaretoken')->getValue();

    // echo $token;

    try {
      $response = Http::post('https://www.preinscriptions.uninet.cm/formulaire/step_1/', [
        'faculte' => 2,
        'prenom' => 'aimee',
        'nom' => 'jiomo',
        'datenaissance' => '15/04/2022',
        'dateprecise' => 'Oui',
        'lieunaissance' => 'YAOUNDE',
        'numerocni' => '11043456',
        'sexe' => 'FEMININ',
        'adresse' => 'obili',
        'telephone' => '69966592',
        'email' => 'aimeejiomo@gmail.com',
        'statutmarital' => 'CELIBATAIRE',
        'premierelangue' => 'FRANÇAIS',
        'statutprofessionnel' => 'SANS EMPLOI',
        'csrfmiddlewaretoken' => $token,
      ]);

      var_dump($response->body() );
    } catch (RequestException $th) {
      //throw $th;
    }*/

    //   // $h2 = $crawler->filter("body > div.container.content > div > div.col-md-6 > h3")->text();
    //   //   echo($h2."\n"); 
    //     $form = $crawler->selectButton('Suivant')->form();
    //     $form->disableValidation();
    //     $token = $form->get('csrfmiddlewaretoken')->getValue();

    //     $response = Http::post('https://www.preinscriptions.uninet.cm/', [
    //       'csrfmiddlewaretoken' => $token,
    //       'nom' => 'jiomo', 
    //       'prenom' => 'aimee', 
    //         'datenaissance' => '15/04/2022',
    //        'dateprecise' => 'Oui', 
    //        'lieunaissance' => 'YAOUNDE', 
    //        'numerocni' => '11043456', 
    //        'sexe' => 'FEMININ', 
    //        'adresse' => 'obili', 
    //        'telephone' => '69966592', 
    //        'email' => 'aimeejiomo@gmail.com', 
    //        'statutmarital' => 'CELIBATAIRE', 
    //        'premierelangue' => 'FRANÇAIS',
    //        'statutprofessionnel' => 'SANS EMPLOI'
    //   ]);

    // try {
    //   //code...
    //   $crawler = $client->submit($form, [
    //     'nom' => 'jiomo', 
    //     'prenom' => 'aimee', 
    //     'datenaissance' => '15/04/2022',
    //    'dateprecise' => 'Oui', 
    //    'lieunaissance' => 'YAOUNDE', 
    //    'numerocni' => '11043456', 
    //    'sexe' => 'FEMININ', 
    //    'adresse' => 'obili', 
    //    'telephone' => '69966592', 
    //    'email' => 'aimeejiomo@gmail.com', 
    //    'statutmarital' => 'CELIBATAIRE', 
    //    'premierelangue' => 'FRANÇAIS',
    //    'statutprofessionnel' => 'SANS EMPLOI'
    //   ]);
    //   // echo 'good';
    //   // $h2 = $crawler->filter("#div_id_paiement > label")->text();
    //   echo $form->getUrl();
    // } catch (RequestException $th) {
    //   //throw $th;
    //   var_dump($th->getRequest());
    // }




    // select the form and fill in some values
    /*   $form = $crawler->selectButton('Suivant')->form();
    $form['nom'] = 'aimeejiomo';
    $form['prenom'] = 'jiomo';
    $form['datenaissance'] = '2010-06-05';
    $form['dateprecise'] = 'Oui';
    $form['lieunaissance'] = 'YAOUNDE';
    $form['numerocni'] = '11043456';
    $form['sexe'] = 'FEMININ';
    $form['adresse'] = 'obili';
    $form['telephone'] = '69966592';
    $form['email'] = 'aimeejiomo@gmail.com';
    $form['statutmarital'] = 'CELIBATAIRE';
    $form['premierelangue'] = 'FRANÇAIS';
    $form['statutprofessionnel'] = 'SANS EMPLOI';

    // submit that form
    $crawler = $client->submit($form); */
    // we are now logged in and can navigate the site
    // Click the Explore Link
    // $link = $crawler->selectLink('Informations de paiement')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Suivant')->form();
    // $form['paiement'] = 'EXPRESS UNION';
    // $form['numerotransaction'] = '12345678';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Informations de filiation')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("#div_id_paiement > label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Suivant')->form();
    // $form['nationalite'] = '1';
    // $form['regionorigine'] = '8';
    // //$form['departementorigine'] = '8';
    // $form['nompere'] = 'alain';
    // $form['professionpere'] = 'Policier';
    // $form['nommere'] = 'anne';
    // $form['professionmere'] = 'Professeur';
    // $form['nomurgence'] = 'Tagne';
    // $form['telurgence'] = '699785643';
    // $form['villeurgence'] = 'Yaoundé';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Faculté et études souhaitées')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("#div_id_faculte > label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Suivant')->form();
    // $form['faculte'] = 'Faculté des Sciences (FS)';
    // $form['niveau'] = 'L1';
    // $form['premierchoix'] = '';
    // $form['secondchoix'] = '';
    // $form['troisiemechoix'] = '';
    // $form['statutdesire'] = 'camerounais';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Diplômes présentés')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("#div_id_diplome > label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Suivant')->form();
    // $form['diplome'] = '1';
    // $form['serie'] = 'C';
    // $form['anneeobtention'] = '2021';
    // $form['moyenne'] = '11.2';
    // $form['detailjury'] = '1';
    // $form['emetteur'] = 'moi';
    // $form['date_emission'] = '01-06-2022';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Informations sportives')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("#div_id_sport > label")->text();
    // echo($h2."\n");

    // $form = $crawler->selectButton('Terminer')->form();
    // $form['sport'] = 'volleyball';
    // $form['autresport'] = 'aucun';
    // $form['art'] = 'theatre';
    // $form['autreart'] = 'aucun';
    // $form['handicap'] = 'Non';
    // $form['numcertifmedical'] = '12345678';
    // $form['etabcertifmedical'] = 'yde';
    // $crawler = $client->submit($form);

    // $link = $crawler->selectLink('Telecharger sa fiche')->link();
    // $crawler = $client->click($link);
    // $h2 = $crawler->filter("body > div.container.content > div > div > div:nth-child(4) > h3")->text();
    // echo($h2."\n");
  //}
//};
       /*$client = new Client();
       $url = "https://www.bbc.com/news/topics/cgdzpg5yvdvt/stock-markets";
        $crawler = $client->request('GET', $url);
        //$news = $crawler->filter("h2")->text();
        $news = $crawler->filter('p')->text(); 
        $crawler = $client->request('GET', 'https://github.com/');
        $crawler = $crawler->click($crawler->selectLink('Sign in')->link());*/
     /*   public function index()
    {


        $client = new Client();
        $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/');
        $crawler = $client->click($crawler->selectLink('Faculté des Sciences (FS)')->link());
       $h2 = $crawler->filter("body > div.container.content > div > div.col-md-6 > h3")->text();
        echo($h2."\n"); 
       $form = $crawler->selectButton('Suivant')->form();
        $crawler = $client->submit($form, [
        'nom' => 'jiomo', 
        'prenom' => 'aimee', 
        'datenaissance' => '15/04/2022',
         'dateprecise' => 'Oui', 
         'lieunaissance' => 'YAOUNDE', 
         'numerocni' => '11043456', 
         'sexe' => 'FEMININ', 
         'adresse' => 'obili', 
         'telephone' => '69966592', 
         'email' => 'aimeejiomo@gmail.com', 
         'statutmarital' => 'CELIBATAIRE', 
         'premierelangue' => 'FRANÇAIS',
         'statutprofessionnel' => 'SANS EMPLOI', ]);
        //  $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/autre/');
        $h2 = $crawler->filter("#div_id_numerotransaction > label")->text();
         echo($h2."\n"); 
        // $form = $crawler->selectButton('Suivant')->form();
        //  $crawler = $client->submit($form, [
        //     'paiement' => 'EXPRESS UNION', 
        //     'numerotransaction' => '12345678', 
        // ]);
    //   $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/filiation/');
    //    $h2 = $crawler->filter("#div_id_nationalite > label")->text();
    //     echo($h2."\n"); 
    //    $form = $crawler->selectButton('Suivant')->form();
    //    $crawler = $client->submit($form, [ 
    //     'nationalite' => '1', 
    //     'regionorigine' => '8', 
    //     //'departementorigine' => 'Menoua', 
    //     'nompere' => 'alain', 
    //     'professionpere' => 'Policier', 
    //     'nommere' => 'anne', 
    //     'professionmere' => 'Professeur', 
    //     'nomurgence' => 'Tagne', 
    //     'telurgence' => '699785643', 
    //     'villeurgence' => 'Yaoundé', 
    // ]);
    // $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/faculte/');
    // $h2 = $crawler->filter("#div_id_faculte > label")->text();
    // echo($h2."\n"); 
    //     $form = $crawler->selectButton('Suivant')->form();
    //     $crawler = $client->submit($form, [ 
    //      'faculte' => 'Faculté des Sciences (FS)', 
    //      'niveau' => 'L1', 
    //      'premierchoix' => '', 
    //      'secondchoix' => '', 
    //      'troisiemechoix' => '', 
    //      'statutdesire' => 'camerounais', 
    //     ]);   
        
    //     $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/diplome/');
    //     $h2 = $crawler->filter("#div_id_diplome > label")->text();
    //     echo($h2."\n"); 
    //     $form = $crawler->selectButton('Suivant')->form();
    //     $crawler = $client->submit($form, [ 
    //      'diplome' => '1', 
    //      'serie' => 'C', 
    //      'anneeobtention' => '2021', 
    //      'moyenne' => '11.2',
    //       'detailjury' => '1', 
    //       'emetteur' => 'moi', 
    //       'date_emission' => '01/06/2022', ]); 
    //     $crawler = $client->request('GET', 'https://www.preinscriptions.uninet.cm/formulaire/sport/');
    //     $h2 = $crawler->filter("#div_id_sport > div > div:nth-child(2) > label")->text();
    //     echo($h2."\n"); 
    //     $form = $crawler->selectButton('Terminer')->form();
    //     $crawler = $client->submit($form, [ 
    //       'sport' => 'volleyball', 
    //       'autresport' => 'aucun', 
    //       'art' => 'theatre', 
    //       'autreart' => 'aucun', 
    //       'handicap' => 'Non', 
    //       'numcertifmedical' => '12345678', 
    //      'etabcertifmedical' => 'yde',]);
    //     $h1 = $crawler->filter("body > div.container.content")->text();
    //      echo($h1."\n");  
        /*$crawler = $client->click($crawler->selectLink('#actions > a:nth-child(3)')->link());*/
// SbLoS8Mn1e2lCFCaMKBgVyrBuh1fxVAUqrt1fD7/e40=