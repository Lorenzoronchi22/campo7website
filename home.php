<?php
include('connection.php');
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/camposportivo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>La Delizia Arena</title>
</head>
<body>
    <?php include 'navbar.php';
    ?>
    <div class="container" style="padding: 10px;">
        <img src="img/title.png" srcset="">
      <div class="container">
      <h2 style="padding-top: 20px; text-align: center;">La Delizia Arena</h2>
        <div class="row" style="padding-top: 20px;">
          <div class="col">
          <p>La polisportiva comunale di Caino è un centro polivalente che nasce nel 1977 su un terreno donato al comune da Luigi Casnighi.
            Dopo la radicale ristrutturazione avvenuta negli anni 2003 e 2004, ora il rinnovato centro sportivo dispone dei seguenti impianti e strutture: Palestra polivalente, Campo da calcio a 7,
            tendone con stand gastronomico, quattro spogliatoi con docce e servizi igienici. Il campo è di dimensioni 70m x 50m inoltre il terreno sintetico è stato rifatto di recente (2014). <br> 
            Su questo sito è possibile prenotare solamente il campo da gioco per un massimo di due ore al giorno, per richiedere l'utilizzo del tendone con stand gastronomico è necessario comunicarlo direttamente la polisportiva attraverso i contatti in fondo alla pagina. <br>
            Il campo dispone inoltre di spogliatoi e docce anch'esse rinnovate recentemente il cui utilizzo è compreso nella prenotazione.
          </p>
          </div>
          <div class="col">
          <img src="img/campo.jpg" alt="" srcset="">
          </div>
        </div>
      </div>
      <div class="container" style="margin-top: 20px; background-color: rgb(138, 179, 248); border: 1px solid rgb(56, 119, 227);">
        <div class="row tablerow">
          <div class="col tablecol">
            <h4 style="padding: 10px; text-align: center;">La parola del presidente</h4>
            <p style="font-style: italic; margin: auto;">"Presiedere la Polisportiva a Caino è una forte responsabilità per ciò che rappresenta nel paese,
              per la storia di 30 anni fatta di innumerevoli 
              esempi di cittadini che hanno operato con autentico spirito di servizio a favore dei nostri giovani.
              Doveroso un pensiero affettuoso e riconoscente a GianPietro che insieme agli amministratori del tempo, 
              pensò al “Centro Sportivo” come ad un sano
              luogo aggregatore.Voglio ringraziare tutti quanti che con me, operano con grande dedizione,
              il vicepresidente Duilio, i componenti del Direttivo, i gruppi e tutti i volontari delle varie 
              attività: gli istruttori delle varie discipline sportive, gli sponsor che contribuiscono 
              all’indispensabile sostegno finanziario e a tutti iPromotori e coordinatori dei vari corsi. 
              Un cenno di riconoscenza alle Istituzioni con le quali abbiamo attivato un fattivo rapporto 
              di collaborazione, l’Amministrazione Comunale, la Parrocchia e la Scuola. 
              Siamo orgogliosi di aver riavviato la “Scuola Calcio” ed il “Mini Volley” per i giovanissimi 
              oltre a tutte le altre attività che troverete ben elencate inquesto News Informativo. 
              Non posso trascurare un richiamo agli storici MEMORIAL PEDROTTI E LASTELLA quali momenti 
              forti di attività sportiva e di intrattenimento estivo.Un grazie riconoscente al “custode” 
              Romeo sempre disponibile e collaborativo. 
              Infine desidero ribadire il mio personale impegno, per il tempo che il lavoro mi lascia, 
              affinché la Polisportiva sia e rappresenti sempre un luogo di serietà e di crescita secondo
              i valori civici e sportivi."
            </p>
            <p style="font-style: italic;">Il Presidente</p>
          </div>
          <div class="col tablecol">
            <h4 style="padding: 10px; text-align: center;">Dove siamo</h4>
            <p style="margin-top:75px;">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2634.1865114971974!2d10.319502886892762!3d45.61419138761769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478182e216dbe1fd%3A0x7f93cd7fd47e2181!2sPolisportiva!5e0!3m2!1sit!2sit!4v1671203244977!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </p>
          </div>
        </div>
      </div>
    </div>
    <?php include 'contatti.php';
    ?>
</body>
</html>