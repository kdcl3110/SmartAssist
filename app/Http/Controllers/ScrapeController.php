<?php

namespace App\Http\Controllers;

use Goutte\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Cookie\CookieJar;
use guzzlehttp\guzzle;

use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Nette\IOException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ScrapeController extends Controller
{
  public function index(Request $request)
  {
    $nationalites = [
      ['id' => 1, 'name' => 'Cameroun'],
      ['id' => 2, 'name' => 'Congo'],
      ['id' => 3, 'name' => 'Gabon'],
      ['id' => 4, 'name' => 'Guinnée-équatoriale'],
      ['id' => 5, 'name' => 'Nigeria'],
      ['id' => 6, 'name' => 'République Centraficaine'],
      ['id' => 7, 'name' => 'Tchad'],
      ['id' => 8, 'name' => 'Autre'],
    ];

    $regions = [
      ['id' => 1, 'name' => 'CENTRE'],
      ['id' => 2, 'name' => 'ADAMAOUA'],
      ['id' => 3, 'name' => 'EST'],
      ['id' => 4, 'name' => 'EXTREME-NORD'],
      ['id' => 5, 'name' => 'LITTORAL'],
      ['id' => 6, 'name' => 'NORD'],
      ['id' => 7, 'name' => 'NORD-OUEST'],
      ['id' => 8, 'name' => 'OUEST'],
      ['id' => 9, 'name' => 'SUD'],
      ['id' => 10, 'name' => 'SUD-OUEST'],
    ];

    $filieres = [
      ['id' => 26, 'name' => 'INFORMATIQUE'],
      ['id' => 27, 'name' => 'BIOCHIMIE'],
      ['id' => 28, 'name' => 'BIOLOGIE ANIMALE'],
      ['id' => 29, 'name' => 'BIOLOGIE VEGETALE'],
      ['id' => 30, 'name' => 'CHIMIE'],
      ['id' => 31, 'name' => 'MATHEMATIQUES'],
      ['id' => 32, 'name' => 'PHYSIQUE'],
      ['id' => 33, 'name' => 'SCIENCES DE LA TERRE ET DE L UNIVERS'],
      ['id' => 34, 'name' => 'MICROBIOLOGIE'],
      ['id' => 35, 'name' => 'BIOSCIENCESBIOSCIENCES'],
      ['id' => 36, 'name' => 'GEOSCIENCES'],
      ['id' => 52, 'name' => 'ICT for DEVELOPMENT'],
      ['id' => 53, 'name' => 'CHIMIE INORGANIQUE'],
      ['id' => 54, 'name' => 'CHIMIE ORGANIQUE'],
      ['id' => 103, 'name' => 'Master Pro - Réseaux et Applications Multimédia (RAM)'],
      ['id' => 104, 'name' => 'Master Pro - Systèmes d’information et Génie Logiciel (SIGL)'],
      ['id' => 105, 'name' => 'Master Pro - Sécurité des Systèmes Informatiques (SSI)'],
      ['id' => 106, 'name' => 'Licence Pro. - Information and Communication Technology for Development (ICT4D)'],
      ['id' => 107, 'name' => 'Master Pro - Sciences de l’Environnement'],
      ['id' => 108, 'name' => 'Master Pro - Sciences Forestières -Audit et Certification des Forets'],
      ['id' => 109, 'name' => 'Master Pro - Sciences Forestières -Aires Protégées'],
      ['id' => 110, 'name' => 'Master Pro - Sciences Forestières -Agroforesterie'],
      ['id' => 111, 'name' => 'Master Pro - Industrie des Semences'],
      ['id' => 112, 'name' => 'Master Pro Régional - Gestion Intégrée des Environnements Littoraux et Marins : Evaluation et Audit Environnemental'],
      ['id' => 114, 'name' => 'Master Pro - Mines, Pétrole et Métallurgie'],
      ['id' => 114, 'name' => 'Master Pro - Ingénierie Géotechnique'],
      ['id' => 115, 'name' => 'Master Pro Régional - MAREMA'],
      ['id' => 116, 'name' => 'Master Pro - Sécurité Sanitaire des Aliments'],
      ['id' => 117, 'name' => 'Master Pro - Biotechnologie de la Santé Publique'],
    ];
    // $path = public_path('python/test_finish.py');
    $python = 'c:\Users\admin\AppData\Local\Microsoft\WindowsApps\python';
    // $process = new Process([$python, $path]);
    // $process->run();

    // // error handling
    // if (!$process->isSuccessful()) {
    //   // echo 'error';
    //   throw new ProcessFailedException($process);
    // }

    // $output_data = $process->getOutput();
    // return $output_data;
    // echo public_path('python/test_finish.py');

    // // echo 'frefre';

    $nom = $request->input('lastname');
    $prenom = $request->input('firstname');
    $date_naiss = $request->input('date_naiss');
    $ismarqu = $request->input('lastname');
    $lieu_naiss = $request->input('lieu_naiss');
    $num_cni = $request->input('num_cni');
    $sexe = $request->input('sexe');
    $adress = $request->input('adress');
    $tel = $request->input('tel');
    $email = $request->input('email');
    $statutMatrimoial = $request->input('satut_mat');
    $premiere_langue = $request->input('first_lang');
    $statut_prof = $request->input('statut_prof');
    $lieu_pay = $request->input('lieu_pay');
    $num_transaction = $request->input('num_transaction');
    $nationalite = $this->findId($nationalites, $request->input('nationalite'));
    $region = $this->findId($regions, $request->input('region'));
    $departement = $request->input('departement');
    $nom_pere = $request->input('nom_pere');
    $prof_pere = $request->input('prof_pere');
    $nom_mere = $request->input('nom_mere');
    $prof_mere = $request->input('prof_mere');
    $nom_contact_urg = $request->input('nom_contact_urg');
    $tel_urg = $request->input('tel_urg');
    $ville_re = $request->input('ville_re');
    $faculte = $request->input('faculte');
    $niveau = $request->input('niveau');
    $premier_choix = $this->findId($filieres, $request->input('premier_choix'));
    $second_choix = $this->findId($filieres, $request->input('second_choix'));
    $troisieme_choix = $this->findId($filieres, $request->input('troisieme_choix'));
    $statut = $request->input('statut');
    $nom_diplome = $request->input('nom_diplome');
    $nom_serie = $request->input('nom_serie');
    $anne_obt = $request->input('annee_obt');
    $moyenne = $request->input('moyenne');
    $menstion = $request->input('mention');
    $emetteur_diplome = $request->input('emetteur_diplome');
    $date_delivrance = $request->input('date_delivrance');
    $andicape = $request->input('andicape');

    $param = str_replace(' ', '_', $nom) . " " . str_replace(' ', '_', $prenom) . " " . str_replace(' ', '_', $date_naiss) . " " . str_replace(' ', '_', $ismarqu) . " " . str_replace(' ', '_', $lieu_naiss) . " " . str_replace(' ', '_', $num_cni) . " " . str_replace(' ', '_', $sexe) . " " . str_replace(' ', '_', $adress) . " " . str_replace(' ', '_', $tel) . " " . str_replace(' ', '_', $email) . " " . str_replace(' ', '_', $statutMatrimoial) . " " . str_replace(' ', '_', $premiere_langue) . " " . str_replace(' ', '_', $statut_prof) . " " . str_replace(' ', '_', $lieu_pay) . " " . str_replace(' ', '_', $num_transaction) . " " . str_replace(' ', '_', $nationalite) . " " . str_replace(' ', '_', $region) . " " . str_replace(' ', '_', $departement) . " " . str_replace(' ', '_', $nom_pere) . " " . str_replace(' ', '_', $prof_pere) . " " . str_replace(' ', '_', $nom_mere) . " " . str_replace(' ', '_', $prof_mere) . " " . str_replace(' ', '_', $nom_contact_urg) . " " . str_replace(' ', '_', $tel_urg) . " " . str_replace(' ', '_', $ville_re) . " " . str_replace(' ', '_', $faculte) . " " . str_replace(' ', '_', $niveau) . " " . str_replace(' ', '_', $premier_choix) . " " . str_replace(' ', '_', $second_choix) . " " . str_replace(' ', '_', $troisieme_choix) . " " . str_replace(' ', '_', $statut) . " " . str_replace(' ', '_', $nom_diplome) . " " . str_replace(' ', '_', $nom_serie) . " " . str_replace(' ', '_', $anne_obt) . " " . str_replace(' ', '_', $moyenne) . " " . str_replace(' ', '_', $menstion) . " " . str_replace(' ', '_', $emetteur_diplome) . " " . str_replace(' ', '_', $date_delivrance) . " " . str_replace(' ', '_', $andicape);
    $commande = 'python ' . public_path('python/test_finish.py') . ' ' . $param;
    // echo $commande;

    // try {
    //   $output = null;
    //   $result = null;
    //   exec($commande, $output, $result);
    //   print_r($output);
    //   // return response(['fiche' => $output]);
    // } catch (\Throwable $th) {
    //   throw $th;
    // }

    $process = new Process([$python, public_path('python\test_finish.py')]);

    try {
      $process->mustRun();

      echo $process->getOutput();
    } catch (ProcessFailedException $exception) {
      echo $exception->getMessage();
    }
  }

  public function findId($array = [], $value)
  {
    foreach ($array as $item) {
      if ($item['name'] == $value) {
        return $item['id'];
      }
    }
    return 0;
  }
}
