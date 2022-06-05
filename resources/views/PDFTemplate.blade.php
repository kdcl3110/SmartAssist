<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Generate PDF From View</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            font-size: 8px;
        }

        table {
            width: 100%;
            margin: auto;
        }

        tr {
            margin: auto;
        }

        .title {
            font-weight: bold;
            border-bottom: 1px solid;
        }

        .pb-5 {
            padding-bottom: 5px;
        }

        p {
            margin-top: 3px;
            margin-bottom: 3px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .header-title {
            font-weight: bold;
            font-size: 12px;
        }

        .photo {
            width: 150px;
            height: 150px;
            border: 1px solid;
        }

        .p {
            margin: 0;
        }

        .left {
            width: 85%;
        }

        .rigth {
            width: 15%;
        }

        .al-center {
            align-items: center;
        }

        .border {
            padding-left: 50px;
            padding-left: 50px;
            border-top: 1px;
            border-bottom: 0;
            border-style: dashed;
        }

        .tr1 {
            width: 33%;
        }

        .tr3 {
            width: 50%;
            padding-right: 20px;
        }

        img {
            width: 40px;
            height: 60px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td colspan="2" class="tr1">
                <div class="header">
                    <center>
                        <p>République du cameroun</p>
                        <p>Paix-Travail-Patrie</p>
                        <p>--------------</p>
                        <p>Ministère de l'Enseignement Supérieur</p>
                        <p>--------------</p>
                        <p>Université de Yaoundé I (UYI)</p>
                        <p>--------------</p>
                    </center>
                </div>
            </td>
            <td colspan="2" class="tr1">
                <center>
                    <img src="data:image/png;base64,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" alt="">
                </center>
            </td>
            <td colspan="2" class="tr1" style="float: right;">
                <div class="header">
                    <center>
                        <p>Republic of Cameroon</p>
                        <p>Peace-Work-Fatherland</p>
                        <p>--------------</p>
                        <p>Ministry of Higher Education</p>
                        <p>--------------</p>
                        <p>The University of Yaounde I (UYI)</p>
                        <p>--------------</p>
                        <center>
                </div>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="2">
                <div class="header">
                    <center>
                        <p class="header-title p">FICHE DE PREINSCRIPTION ET QUITUS DE L'UNIVERSITE DE YAOUNDE I</p>
                        <p class="header-title p">ANNEE ACADEMIQUE 2021/2022</p>
                        <p style="font-weight: bold; font-size: 20px; margin-top: 5px; margin-bottom: 5px">Code :  </p>
                        <p class="header-title p">
                            Ce code unique permet de <u>voir sa fiche</u>, completer ou corriger ses informations de
                        </p>
                        <p class="header-title p">préinscrption</p>
                        <p class="header-title p">Vous avez actuellement le quitus pour payer vos droits de pré-inscription dans les</p>
                        <p class="header-title p"> agences SGC, EU ou YUP contre reçu de paiement</p>
                    </center>
                </div>
            </td>
            <td colspan="1" class="photo">
                <div>
                    <center>
                        <i>PHOTO</i>
                    </center>
                </div>
            </td>
        </tr>
    </table>
    <table class="mt-10">
        <tr>
            <td class="tr3 ">
                <div>
                    <p class="title pb-5">
                        Etat-Civil
                    </p>
                    <div class="content">
                        <table>
                            <tr>
                                <td style="width: 120px;"> Code préinscription :</td>
                                <td > vgdfvfhjd</td> </td>
                            </tr>
                            <tr>
                                <td style="width: 120px;"> Nom(s) et Prénom(s) : </td>
                                <td> {{$nom}} {{$prenom}}</td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Date de Naissance : </td>
                                <td> {{$date_naiss}}</td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Date précise? : </td>
                                <td> {{$datePrécise}}</td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Lieu de Naissance : </td>
                                <td>{{$lieu_naiss}} </td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Sexe : </td>
                                <td>{{$sexe}} </td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Statut matrimonial : </td>
                                <td>{{$statut_matrimonial}} </td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Situation professionnelle : </td>
                                <td>{{$situation_pro}} </td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Première langue : </td>
                                <td>{{$premiere_langue}} </td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Email : </td>
                                <td>{{$email}} </td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Téléphone : </td>
                                <td>{{$telephone}} </td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">N° CNI : </td>
                                <td>{{$num_cni}} </td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Adresse : </td>
                                <td>{{$adresse}} </td>      
                            </tr>
                            <tr>
                                <td style="width: 120px;">Date de rendez-vous : </td>
                                <td>{{$date_rdv}} </td>      
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mt-10">
                    <p class="title pb-5">
                        Filiation et infos. Urgence
                    </p>
                    <p>Nationalité :</p>
                    <p>Région d'Origine :</p>
                    <p>Département d'Origine :</p>
                    <p>Nom du Père : </p>
                    <p>Profession du Père :</p>
                    <p>Nom de la Mère :</p>
                    <p>Profession de la Mère :</p>
                    <p><span class="title">Personne à contacter :</span></p>
                    <p>* Nom :</p>
                    <p>* Téléphone :</p>
                    <p>* Ville :</p>
                </div>
            </td>
            <td class="tr3">
                <div>
                    <p class="title pb-5">Faculté et Filières</p>
                    <p> <span class="title">Filières :</span> </p>
                    <p>Etablissement :</p>
                    <p>* 1er Choix :</p>
                    <p>* 2ème Choix </p>
                    <p>* 3ème Choix :</p>
                    <p>Niveau :</p>
                    <p>Statut</p>
                </div>
                <div class="mt-10">
                    <p class="title pb-5">Diplôme</p>
                    <p>Type Diplôme :</p>
                    <p>Série :</p>
                    <p>Année d'obtention :</p>
                    <p>Moyenne :</p>
                    <p>Infos. Jury/Mention :</p>
                    <p>Diplôme délivré par :</p>
                    <p>Date de délivrance :</p>
                </div>
                <div class="mt-10">
                    <p class="title pb-5">Autres Détails</p>
                    <p><span class="title">Infos de Paiement :</span></p>
                    <p>* N° Transaction :</p>
                    <p>* Agence de Paiement :</p>
                    <p>* Frais de préinscriiption :</p>
                    <p> <span class="title">Informations Diverses : </span></p>
                    <p>* Pratique Sport :</p>
                    <p>* Pratique Art :</p>
                    <p>Numéro du certificat médical : </p>
                    <p>Lieu du certificat médical :</p>
                </div>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="tr3">
                <div class="header">
                    <center>
                        <p> <span class="title">Partie réservée à l'Administration :</span> </p>
                        <p class="mt-10"><strong>Avis: </strong></p>
                        <p><strong>Signature</strong></p>
                    </center>
                </div>
            </td>
            <td class="tr3">
                <div>
                    <p> <i>Je déclare sur l'honneur que les informations saisies sont exactes</i> </p>
                </div>
            </td>
        </tr>
    </table>

    <div class="border mt-10"></div>

    <table>
        <tr>
            <td colspan="2">
                <center>
                    <p class="header-title header" style="margin-top: 50px;">RECEPISSE DE DEPÔT</p>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <div class="wd-50">
                    <p class="pb-5">Code :</p>
                    <p class="pb-5">Filière :</p>
                    <p class="pb-5">Etablissement :</p>
                </div>
            </td>
            <td>
                <div class="wd-50">
                    <p>Nom(s) et Prénom(s) :</p>
                    <p>Niveau :</p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class=" wd-50">
                    <p> <span class="title">Infos de Paiement :</span></p>
                    <p>* N° Transaction :</p>
                    <p>* Agence de Paiement :</p>
                </div>
            </td>
            <td>
                <div class="header">
                    <center>
                        <p>Avis :</p>
                        <p>Signature</p>
                    </center>
                </div>
            </td>
        </tr>
    </table>

</body