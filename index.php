<?php

include "classes/dbconn.php";

if (isset($_GET["import"])) {
  include "classes/import.php";
  $import = new Import;
  $import->importCsvFile();
}

if (isset($_GET["search"])) {
  include "classes/search.php";
  $search = new Search;
  $search_results = $search->searchRows();
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Land Registry Database</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<form action="index.php?search" method="post">

<div class="container">

<br>

<h1>Welcome to my Land Registry Database</h1>

<?php

if (isset($_GET["created_rows"])) {

  echo "<b style='color:red;'>" . $_GET["created_rows"] . " records created";

  if (isset($_GET["deleted_rows"])) {
    echo " and " . $_GET["deleted_rows"] . " rows deleted";
  }

  echo ".</b>";
}




?>


<br>

This database contains a list of all the company-owned properties in the UK and the name and address of the company that owns each property.

<br><br>

<?php

if (isset($search_results)) {

?>

<div style="overflow-x:scroll">

<table class="table">
<thead>
<tr>
<th>[title no.]</th>
<th>[tenure]</th>
<th>[property_address]</th>
<th>[district]</th>
<th>[county]</th>
<th>[region]</th>
<th>[postcode]</th>
<th>[multi<br>address<br>indicator]</th>
<th>[price paid]</th>
<th>[date added]</th>
<th>[more proprietors]</th>

<th>[proprietor name 1]</th>
<th>[company reg no 1]</th>
<th>[proprietorship<br>cat 1]</th>
<th>[country 1]</th>
<th>[proprietor 1<br>address 1]</th>
<th>[proprietor 1<br>address 2]</th>
<th>[proprietor 1<br>address 3]</th>

<th>[proprietor name 2]</th>
<th>[company reg no 2]</th>
<th>[proprietorship<br>cat 2]</th>
<th>[country 2]</th>
<th>[proprietor 2<br>address 1]</th>
<th>[proprietor 2<br>address 2]</th>
<th>[proprietor 2<br>address 3]</th>
<th>[proprietor<br>name 3]</th>
<th>[company reg no 3]</th>

<th>[proprietorship<br>cat 3]</th>
<th>[country 3]</th>
<th>[proprietor 3<br>address 1]</th>
<th>[proprietor 3<br>address 2]</th>
<th>[proprietor 3<br>address 3]</th>

<th>[proprietor name 4]</th>
<th>[company reg no 4]</th>
<th>[proprietorship<br>cat 4]</th>
<th>[country 4]</th>
<th>[proprietor 4<br>address 1]</th>
<th>[proprietor 4<br>address 2]</th>
<th>[proprietor 4<br>address 3]</th>
</tr>
</thead>


<?php
for ($i = 0; $i < count($search_results); $i++) {
?>

<tr><td>
<?php echo $search_results[$i]["title_no"]; ?>
</td>
<td>
<?php echo $search_results[$i]["tenure"]; ?>
</td>
<td>
<?php echo $search_results[$i]["property_address"]; ?>
</td>
<td>
<?php echo $search_results[$i]["district"]; ?>
</td>
<td>
<?php echo $search_results[$i]["county"]; ?>
</td>
<td>
<?php echo $search_results[$i]["region"]; ?>
</td>
<td>
<?php
if ($search_results[$i]["postcode"] != "") {
  echo "<a href='https://maps.google.com/maps?q=" . $search_results[$i]["postcode"] . "' target='_blank'>" . $search_results[$i]["postcode"] . "</a>";
}
?>
</td>
<td>
<?php echo $search_results[$i]["multi_address_indicator"]; ?>
</td>
<td>
<?php echo $search_results[$i]["price_paid"]; ?>
</td>
<td>
<?php echo $search_results[$i]["date_added"]; ?>
</td>
<td>
<?php echo $search_results[$i]["more_proprietors"]; ?>
</td>

<td>
<?php echo $search_results[$i]["proprietor_name_1"];

if ($search_results[$i]["proprietor_name_1"] != "") {
  echo "<br>[<a href='https://www.google.com/search?q=" . $search_results[$i]["proprietor_name_1"] . "' target='_blank'>google</a>]";
}

?>
</td>
<td>
<?php echo $search_results[$i]["company_reg_no_1"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietorship_cat_1"]; ?>
</td>
<td>
<?php echo $search_results[$i]["country_1"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_1_add_1"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_1_add_2"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_1_add_3"]; ?>
</td>

<td>
<?php echo $search_results[$i]["proprietor_name_2"]; ?>
</td>
<td>
<?php echo $search_results[$i]["company_reg_no_2"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietorship_cat_2"]; ?>
</td>
<td>
<?php echo $search_results[$i]["country_2"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_2_add_1"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_2_add_2"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_2_add_3"]; ?>
</td>

<td>
<?php echo $search_results[$i]["proprietor_name_3"]; ?>
</td>
<td>
<?php echo $search_results[$i]["company_reg_no_3"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietorship_cat_3"]; ?>
</td>
<td>
<?php echo $search_results[$i]["country_3"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_3_add_1"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_3_add_2"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_3_add_3"]; ?>
</td>

<td>
<?php echo $search_results[$i]["proprietor_name_4"]; ?>
</td>
<td>
<?php echo $search_results[$i]["company_reg_no_4"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietorship_cat_4"]; ?>
</td>
<td>
<?php echo $search_results[$i]["country_4"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_4_add_1"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_4_add_2"]; ?>
</td>
<td>
<?php echo $search_results[$i]["proprietor_4_add_3"]; ?>
</td>
</tr>
<?php
}
 ?>
</table>

</div>



<br><br>
<?php
}
 ?>

<h4>Search:</h4>

<br>

<input type="text" name="title_no" class="form-control" maxlength="16" placeholder="Title No">

<br>

<label>Freehold <input type="radio" name="tenure" value="Freehold"></label> or <label>Leasehold <input type="radio" name="tenure" value="Leasehold"></label>

<br>

<input type="text" name="property_address" class="form-control" maxlength="255" placeholder="Property address">

<br>

<input type="text" name="postcode" class="form-control" maxlength="12" placeholder="Postcode">

<br>

<select class="form-control" name="district">
<option value="">District:</option>
<option value='ADUR'>ADUR</option><option value='ALLERDALE'>ALLERDALE</option><option value='AMBER VALLEY'>AMBER VALLEY</option><option value='ARUN'>ARUN</option><option value='ASHFIELD'>ASHFIELD</option><option value='ASHFORD'>ASHFORD</option><option value='AYLESBURY VALE'>AYLESBURY VALE</option><option value='BABERGH'>BABERGH</option><option value='BARKING AND DAGENHAM'>BARKING AND DAGENHAM</option><option value='BARNET'>BARNET</option><option value='BARNSLEY'>BARNSLEY</option><option value='BARROW-IN-FURNESS'>BARROW-IN-FURNESS</option><option value='BASILDON'>BASILDON</option><option value='BASINGSTOKE AND DEANE'>BASINGSTOKE AND DEANE</option><option value='BASSETLAW'>BASSETLAW</option><option value='BATH AND NORTH EAST SOMERSET'>BATH AND NORTH EAST SOMERSET</option><option value='BEDFORD'>BEDFORD</option><option value='BEXLEY'>BEXLEY</option><option value='BIRMINGHAM'>BIRMINGHAM</option><option value='BLABY'>BLABY</option><option value='BLACKBURN WITH DARWEN'>BLACKBURN WITH DARWEN</option><option value='BLACKPOOL'>BLACKPOOL</option><option value='BLAENAU GWENT'>BLAENAU GWENT</option><option value='BOLSOVER'>BOLSOVER</option><option value='BOLTON'>BOLTON</option><option value='BOSTON'>BOSTON</option><option value='BOURNEMOUTH'>BOURNEMOUTH</option><option value='BRACKNELL FOREST'>BRACKNELL FOREST</option><option value='BRADFORD'>BRADFORD</option><option value='BRAINTREE'>BRAINTREE</option><option value='BRECKLAND'>BRECKLAND</option><option value='BRENT'>BRENT</option><option value='BRENTWOOD'>BRENTWOOD</option><option value='BRIDGEND'>BRIDGEND</option><option value='BRIGHTON AND HOVE'>BRIGHTON AND HOVE</option><option value='BROADLAND'>BROADLAND</option><option value='BROMLEY'>BROMLEY</option><option value='BROMSGROVE'>BROMSGROVE</option><option value='BROXBOURNE'>BROXBOURNE</option><option value='BROXTOWE'>BROXTOWE</option><option value='BURNLEY'>BURNLEY</option><option value='BURY'>BURY</option><option value='CAERPHILLY'>CAERPHILLY</option><option value='CALDERDALE'>CALDERDALE</option><option value='CAMBRIDGE'>CAMBRIDGE</option><option value='CAMDEN'>CAMDEN</option><option value='CANNOCK CHASE'>CANNOCK CHASE</option><option value='CANTERBURY'>CANTERBURY</option><option value='CARDIFF'>CARDIFF</option><option value='CARLISLE'>CARLISLE</option><option value='CARMARTHENSHIRE'>CARMARTHENSHIRE</option><option value='CASTLE POINT'>CASTLE POINT</option><option value='CENTRAL BEDFORDSHIRE'>CENTRAL BEDFORDSHIRE</option><option value='CEREDIGION'>CEREDIGION</option><option value='CHARNWOOD'>CHARNWOOD</option><option value='CHELMSFORD'>CHELMSFORD</option><option value='CHELTENHAM'>CHELTENHAM</option><option value='CHERWELL'>CHERWELL</option><option value='CHESHIRE EAST'>CHESHIRE EAST</option><option value='CHESHIRE WEST AND CHESTER'>CHESHIRE WEST AND CHESTER</option><option value='CHESTERFIELD'>CHESTERFIELD</option><option value='CHICHESTER'>CHICHESTER</option><option value='CHILTERN'>CHILTERN</option><option value='CHORLEY'>CHORLEY</option><option value='CHRISTCHURCH'>CHRISTCHURCH</option><option value='CITY OF BRISTOL'>CITY OF BRISTOL</option><option value='CITY OF DERBY'>CITY OF DERBY</option><option value='CITY OF KINGSTON UPON HULL'>CITY OF KINGSTON UPON HULL</option><option value='CITY OF LONDON'>CITY OF LONDON</option><option value='CITY OF NOTTINGHAM'>CITY OF NOTTINGHAM</option><option value='CITY OF PETERBOROUGH'>CITY OF PETERBOROUGH</option><option value='CITY OF PLYMOUTH'>CITY OF PLYMOUTH</option><option value='CITY OF WESTMINSTER'>CITY OF WESTMINSTER</option><option value='COLCHESTER'>COLCHESTER</option><option value='CONWY'>CONWY</option><option value='COPELAND'>COPELAND</option><option value='CORBY'>CORBY</option><option value='CORNWALL'>CORNWALL</option><option value='COTSWOLD'>COTSWOLD</option><option value='COUNTY DURHAM'>COUNTY DURHAM</option><option value='COVENTRY'>COVENTRY</option><option value='CRAVEN'>CRAVEN</option><option value='CRAWLEY'>CRAWLEY</option><option value='CROYDON'>CROYDON</option><option value='DACORUM'>DACORUM</option><option value='DARLINGTON'>DARLINGTON</option><option value='DARTFORD'>DARTFORD</option><option value='DAVENTRY'>DAVENTRY</option><option value='DENBIGHSHIRE'>DENBIGHSHIRE</option><option value='DERBYSHIRE DALES'>DERBYSHIRE DALES</option><option value='DONCASTER'>DONCASTER</option><option value='DOVER'>DOVER</option><option value='DUDLEY'>DUDLEY</option><option value='EALING'>EALING</option><option value='EAST CAMBRIDGESHIRE'>EAST CAMBRIDGESHIRE</option><option value='EAST DEVON'>EAST DEVON</option><option value='EAST DORSET'>EAST DORSET</option><option value='EAST HAMPSHIRE'>EAST HAMPSHIRE</option><option value='EAST HERTFORDSHIRE'>EAST HERTFORDSHIRE</option><option value='EAST LINDSEY'>EAST LINDSEY</option><option value='EAST NORTHAMPTONSHIRE'>EAST NORTHAMPTONSHIRE</option><option value='EAST RIDING OF YORKSHIRE'>EAST RIDING OF YORKSHIRE</option><option value='EAST STAFFORDSHIRE'>EAST STAFFORDSHIRE</option><option value='EASTBOURNE'>EASTBOURNE</option><option value='EASTLEIGH'>EASTLEIGH</option><option value='EDEN'>EDEN</option><option value='ELMBRIDGE'>ELMBRIDGE</option><option value='ENFIELD'>ENFIELD</option><option value='EPPING FOREST'>EPPING FOREST</option><option value='EPSOM AND EWELL'>EPSOM AND EWELL</option><option value='EREWASH'>EREWASH</option><option value='EXETER'>EXETER</option><option value='FAREHAM'>FAREHAM</option><option value='FENLAND'>FENLAND</option><option value='FLINTSHIRE'>FLINTSHIRE</option><option value='FOREST HEATH'>FOREST HEATH</option><option value='FOREST OF DEAN'>FOREST OF DEAN</option><option value='FYLDE'>FYLDE</option><option value='GATESHEAD'>GATESHEAD</option><option value='GEDLING'>GEDLING</option><option value='GLOUCESTER'>GLOUCESTER</option><option value='GOSPORT'>GOSPORT</option><option value='GRAVESHAM'>GRAVESHAM</option><option value='GREAT YARMOUTH'>GREAT YARMOUTH</option><option value='GREENWICH'>GREENWICH</option><option value='GUILDFORD'>GUILDFORD</option><option value='GWYNEDD'>GWYNEDD</option><option value='HACKNEY'>HACKNEY</option><option value='HALTON'>HALTON</option><option value='HAMBLETON'>HAMBLETON</option><option value='HAMMERSMITH AND FULHAM'>HAMMERSMITH AND FULHAM</option><option value='HARBOROUGH'>HARBOROUGH</option><option value='HARINGEY'>HARINGEY</option><option value='HARLOW'>HARLOW</option><option value='HARROGATE'>HARROGATE</option><option value='HARROW'>HARROW</option><option value='HART'>HART</option><option value='HARTLEPOOL'>HARTLEPOOL</option><option value='HASTINGS'>HASTINGS</option><option value='HAVANT'>HAVANT</option><option value='HAVERING'>HAVERING</option><option value='HEREFORDSHIRE'>HEREFORDSHIRE</option><option value='HERTSMERE'>HERTSMERE</option><option value='HIGH PEAK'>HIGH PEAK</option><option value='HILLINGDON'>HILLINGDON</option><option value='HINCKLEY AND BOSWORTH'>HINCKLEY AND BOSWORTH</option><option value='HORSHAM'>HORSHAM</option><option value='HOUNSLOW'>HOUNSLOW</option><option value='HUNTINGDONSHIRE'>HUNTINGDONSHIRE</option><option value='HYNDBURN'>HYNDBURN</option><option value='IPSWICH'>IPSWICH</option><option value='ISLE OF ANGLESEY'>ISLE OF ANGLESEY</option><option value='ISLE OF WIGHT'>ISLE OF WIGHT</option><option value='ISLES OF SCILLY'>ISLES OF SCILLY</option><option value='ISLINGTON'>ISLINGTON</option><option value='KENSINGTON AND CHELSEA'>KENSINGTON AND CHELSEA</option><option value='KETTERING'>KETTERING</option><option value='KING'S LYNN AND WEST NORFOLK'>KING'S LYNN AND WEST NORFOLK</option><option value='KINGSTON UPON THAMES'>KINGSTON UPON THAMES</option><option value='KIRKLEES'>KIRKLEES</option><option value='KNOWSLEY'>KNOWSLEY</option><option value='LAMBETH'>LAMBETH</option><option value='LANCASTER'>LANCASTER</option><option value='LEEDS'>LEEDS</option><option value='LEICESTER'>LEICESTER</option><option value='LEWES'>LEWES</option><option value='LEWISHAM'>LEWISHAM</option><option value='LICHFIELD'>LICHFIELD</option><option value='LINCOLN'>LINCOLN</option><option value='LIVERPOOL'>LIVERPOOL</option><option value='LUTON'>LUTON</option><option value='MAIDSTONE'>MAIDSTONE</option><option value='MALDON'>MALDON</option><option value='MALVERN HILLS'>MALVERN HILLS</option><option value='MANCHESTER'>MANCHESTER</option><option value='MANSFIELD'>MANSFIELD</option><option value='MEDWAY'>MEDWAY</option><option value='MELTON'>MELTON</option><option value='MENDIP'>MENDIP</option><option value='MERTHYR TYDFIL'>MERTHYR TYDFIL</option><option value='MERTON'>MERTON</option><option value='MID DEVON'>MID DEVON</option><option value='MID SUFFOLK'>MID SUFFOLK</option><option value='MID SUSSEX'>MID SUSSEX</option><option value='MIDDLESBROUGH'>MIDDLESBROUGH</option><option value='MILTON KEYNES'>MILTON KEYNES</option><option value='MOLE VALLEY'>MOLE VALLEY</option><option value='MONMOUTHSHIRE'>MONMOUTHSHIRE</option><option value='NEATH PORT TALBOT'>NEATH PORT TALBOT</option><option value='NEW FOREST'>NEW FOREST</option><option value='NEWARK AND SHERWOOD'>NEWARK AND SHERWOOD</option><option value='NEWCASTLE UPON TYNE'>NEWCASTLE UPON TYNE</option><option value='NEWCASTLE-UNDER-LYME'>NEWCASTLE-UNDER-LYME</option><option value='NEWHAM'>NEWHAM</option><option value='NEWPORT'>NEWPORT</option><option value='NORTH DEVON'>NORTH DEVON</option><option value='NORTH DORSET'>NORTH DORSET</option><option value='NORTH EAST DERBYSHIRE'>NORTH EAST DERBYSHIRE</option><option value='NORTH EAST LINCOLNSHIRE'>NORTH EAST LINCOLNSHIRE</option><option value='NORTH HERTFORDSHIRE'>NORTH HERTFORDSHIRE</option><option value='NORTH KESTEVEN'>NORTH KESTEVEN</option><option value='NORTH LINCOLNSHIRE'>NORTH LINCOLNSHIRE</option><option value='NORTH NORFOLK'>NORTH NORFOLK</option><option value='NORTH SOMERSET'>NORTH SOMERSET</option><option value='NORTH TYNESIDE'>NORTH TYNESIDE</option><option value='NORTH WARWICKSHIRE'>NORTH WARWICKSHIRE</option><option value='NORTH WEST LEICESTERSHIRE'>NORTH WEST LEICESTERSHIRE</option><option value='NORTHAMPTON'>NORTHAMPTON</option><option value='NORTHUMBERLAND'>NORTHUMBERLAND</option><option value='NORWICH'>NORWICH</option><option value='NUNEATON AND BEDWORTH'>NUNEATON AND BEDWORTH</option><option value='OADBY AND WIGSTON'>OADBY AND WIGSTON</option><option value='OLDHAM'>OLDHAM</option><option value='OXFORD'>OXFORD</option><option value='PEMBROKESHIRE'>PEMBROKESHIRE</option><option value='PENDLE'>PENDLE</option><option value='POOLE'>POOLE</option><option value='PORTSMOUTH'>PORTSMOUTH</option><option value='POWYS'>POWYS</option><option value='PRESTON'>PRESTON</option><option value='PURBECK'>PURBECK</option><option value='READING'>READING</option><option value='REDBRIDGE'>REDBRIDGE</option><option value='REDCAR AND CLEVELAND'>REDCAR AND CLEVELAND</option><option value='REDDITCH'>REDDITCH</option><option value='REIGATE AND BANSTEAD'>REIGATE AND BANSTEAD</option><option value='RHONDDA CYNON TAFF'>RHONDDA CYNON TAFF</option><option value='RIBBLE VALLEY'>RIBBLE VALLEY</option><option value='RICHMOND UPON THAMES'>RICHMOND UPON THAMES</option><option value='RICHMONDSHIRE'>RICHMONDSHIRE</option><option value='ROCHDALE'>ROCHDALE</option><option value='ROCHFORD'>ROCHFORD</option><option value='ROSSENDALE'>ROSSENDALE</option><option value='ROTHER'>ROTHER</option><option value='ROTHERHAM'>ROTHERHAM</option><option value='RUGBY'>RUGBY</option><option value='RUNNYMEDE'>RUNNYMEDE</option><option value='RUSHCLIFFE'>RUSHCLIFFE</option><option value='RUSHMOOR'>RUSHMOOR</option><option value='RUTLAND'>RUTLAND</option><option value='RYEDALE'>RYEDALE</option><option value='SALFORD'>SALFORD</option><option value='SANDWELL'>SANDWELL</option><option value='SCARBOROUGH'>SCARBOROUGH</option><option value='SEDGEMOOR'>SEDGEMOOR</option><option value='SEFTON'>SEFTON</option><option value='SELBY'>SELBY</option><option value='SEVENOAKS'>SEVENOAKS</option><option value='SHEFFIELD'>SHEFFIELD</option><option value='SHEPWAY'>SHEPWAY</option><option value='SHROPSHIRE'>SHROPSHIRE</option><option value='SLOUGH'>SLOUGH</option><option value='SOLIHULL'>SOLIHULL</option><option value='SOUTH BUCKS'>SOUTH BUCKS</option><option value='SOUTH CAMBRIDGESHIRE'>SOUTH CAMBRIDGESHIRE</option><option value='SOUTH DERBYSHIRE'>SOUTH DERBYSHIRE</option><option value='SOUTH GLOUCESTERSHIRE'>SOUTH GLOUCESTERSHIRE</option><option value='SOUTH HAMS'>SOUTH HAMS</option><option value='SOUTH HOLLAND'>SOUTH HOLLAND</option><option value='SOUTH KESTEVEN'>SOUTH KESTEVEN</option><option value='SOUTH LAKELAND'>SOUTH LAKELAND</option><option value='SOUTH NORFOLK'>SOUTH NORFOLK</option><option value='SOUTH NORTHAMPTONSHIRE'>SOUTH NORTHAMPTONSHIRE</option><option value='SOUTH OXFORDSHIRE'>SOUTH OXFORDSHIRE</option><option value='SOUTH RIBBLE'>SOUTH RIBBLE</option><option value='SOUTH SOMERSET'>SOUTH SOMERSET</option><option value='SOUTH STAFFORDSHIRE'>SOUTH STAFFORDSHIRE</option><option value='SOUTH TYNESIDE'>SOUTH TYNESIDE</option><option value='SOUTHAMPTON'>SOUTHAMPTON</option><option value='SOUTHEND-ON-SEA'>SOUTHEND-ON-SEA</option><option value='SOUTHWARK'>SOUTHWARK</option><option value='SPELTHORNE'>SPELTHORNE</option><option value='ST ALBANS'>ST ALBANS</option><option value='ST EDMUNDSBURY'>ST EDMUNDSBURY</option><option value='ST HELENS'>ST HELENS</option><option value='STAFFORD'>STAFFORD</option><option value='STAFFORDSHIRE MOORLANDS'>STAFFORDSHIRE MOORLANDS</option><option value='STEVENAGE'>STEVENAGE</option><option value='STOCKPORT'>STOCKPORT</option><option value='STOCKTON-ON-TEES'>STOCKTON-ON-TEES</option><option value='STOKE-ON-TRENT'>STOKE-ON-TRENT</option><option value='STRATFORD-ON-AVON'>STRATFORD-ON-AVON</option><option value='STROUD'>STROUD</option><option value='SUFFOLK COASTAL'>SUFFOLK COASTAL</option><option value='SUNDERLAND'>SUNDERLAND</option><option value='SURREY HEATH'>SURREY HEATH</option><option value='SUTTON'>SUTTON</option><option value='SWALE'>SWALE</option><option value='SWANSEA'>SWANSEA</option><option value='SWINDON'>SWINDON</option><option value='TAMESIDE'>TAMESIDE</option><option value='TAMWORTH'>TAMWORTH</option><option value='TANDRIDGE'>TANDRIDGE</option><option value='TAUNTON DEANE'>TAUNTON DEANE</option><option value='TEIGNBRIDGE'>TEIGNBRIDGE</option><option value='TENDRING'>TENDRING</option><option value='TEST VALLEY'>TEST VALLEY</option><option value='TEWKESBURY'>TEWKESBURY</option><option value='THANET'>THANET</option><option value='THE VALE OF GLAMORGAN'>THE VALE OF GLAMORGAN</option><option value='THREE RIVERS'>THREE RIVERS</option><option value='THURROCK'>THURROCK</option><option value='TONBRIDGE AND MALLING'>TONBRIDGE AND MALLING</option><option value='TORBAY'>TORBAY</option><option value='TORFAEN'>TORFAEN</option><option value='TORRIDGE'>TORRIDGE</option><option value='TOWER HAMLETS'>TOWER HAMLETS</option><option value='TRAFFORD'>TRAFFORD</option><option value='TUNBRIDGE WELLS'>TUNBRIDGE WELLS</option><option value='UTTLESFORD'>UTTLESFORD</option><option value='VALE OF WHITE HORSE'>VALE OF WHITE HORSE</option><option value='WAKEFIELD'>WAKEFIELD</option><option value='WALSALL'>WALSALL</option><option value='WALTHAM FOREST'>WALTHAM FOREST</option><option value='WANDSWORTH'>WANDSWORTH</option><option value='WARRINGTON'>WARRINGTON</option><option value='WARWICK'>WARWICK</option><option value='WATFORD'>WATFORD</option><option value='WAVENEY'>WAVENEY</option><option value='WAVERLEY'>WAVERLEY</option><option value='WEALDEN'>WEALDEN</option><option value='WELLINGBOROUGH'>WELLINGBOROUGH</option><option value='WELWYN HATFIELD'>WELWYN HATFIELD</option><option value='WEST BERKSHIRE'>WEST BERKSHIRE</option><option value='WEST DEVON'>WEST DEVON</option><option value='WEST DORSET'>WEST DORSET</option><option value='WEST LANCASHIRE'>WEST LANCASHIRE</option><option value='WEST LINDSEY'>WEST LINDSEY</option><option value='WEST OXFORDSHIRE'>WEST OXFORDSHIRE</option><option value='WEST SOMERSET'>WEST SOMERSET</option><option value='WEYMOUTH AND PORTLAND'>WEYMOUTH AND PORTLAND</option><option value='WIGAN'>WIGAN</option><option value='WILTSHIRE'>WILTSHIRE</option><option value='WINCHESTER'>WINCHESTER</option><option value='WINDSOR AND MAIDENHEAD'>WINDSOR AND MAIDENHEAD</option><option value='WIRRAL'>WIRRAL</option><option value='WOKING'>WOKING</option><option value='WOKINGHAM'>WOKINGHAM</option><option value='WOLVERHAMPTON'>WOLVERHAMPTON</option><option value='WORCESTER'>WORCESTER</option><option value='WORTHING'>WORTHING</option><option value='WREKIN'>WREKIN</option><option value='WREXHAM'>WREXHAM</option><option value='WYCHAVON'>WYCHAVON</option><option value='WYCOMBE'>WYCOMBE</option><option value='WYRE'>WYRE</option><option value='WYRE FOREST'>WYRE FOREST</option><option value='YORK'>YORK</option>
</select>

<br>

<select class="form-control" name="county">
<option value="">County:</option>
<option value='BATH AND NORTH EAST SOMERSET'>BATH AND NORTH EAST SOMERSET</option><option value='BEDFORD'>BEDFORD</option><option value='BLACKBURN WITH DARWEN'>BLACKBURN WITH DARWEN</option><option value='BLACKPOOL'>BLACKPOOL</option><option value='BLAENAU GWENT'>BLAENAU GWENT</option><option value='BOURNEMOUTH'>BOURNEMOUTH</option><option value='BRACKNELL FOREST'>BRACKNELL FOREST</option><option value='BRIDGEND'>BRIDGEND</option><option value='BRIGHTON AND HOVE'>BRIGHTON AND HOVE</option><option value='BUCKINGHAMSHIRE'>BUCKINGHAMSHIRE</option><option value='CAERPHILLY'>CAERPHILLY</option><option value='CAMBRIDGESHIRE'>CAMBRIDGESHIRE</option><option value='CARDIFF'>CARDIFF</option><option value='CARMARTHENSHIRE'>CARMARTHENSHIRE</option><option value='CENTRAL BEDFORDSHIRE'>CENTRAL BEDFORDSHIRE</option><option value='CEREDIGION'>CEREDIGION</option><option value='CHESHIRE EAST'>CHESHIRE EAST</option><option value='CHESHIRE WEST AND CHESTER'>CHESHIRE WEST AND CHESTER</option><option value='CITY OF BRISTOL'>CITY OF BRISTOL</option><option value='CITY OF DERBY'>CITY OF DERBY</option><option value='CITY OF KINGSTON UPON HULL'>CITY OF KINGSTON UPON HULL</option><option value='CITY OF NOTTINGHAM'>CITY OF NOTTINGHAM</option><option value='CITY OF PETERBOROUGH'>CITY OF PETERBOROUGH</option><option value='CITY OF PLYMOUTH'>CITY OF PLYMOUTH</option><option value='CONWY'>CONWY</option><option value='CORNWALL'>CORNWALL</option><option value='COUNTY DURHAM'>COUNTY DURHAM</option><option value='CUMBRIA'>CUMBRIA</option><option value='DARLINGTON'>DARLINGTON</option><option value='DENBIGHSHIRE'>DENBIGHSHIRE</option><option value='DERBYSHIRE'>DERBYSHIRE</option><option value='DEVON'>DEVON</option><option value='DORSET'>DORSET</option><option value='EAST RIDING OF YORKSHIRE'>EAST RIDING OF YORKSHIRE</option><option value='EAST SUSSEX'>EAST SUSSEX</option><option value='ESSEX'>ESSEX</option><option value='FLINTSHIRE'>FLINTSHIRE</option><option value='GLOUCESTERSHIRE'>GLOUCESTERSHIRE</option><option value='GREATER LONDON'>GREATER LONDON</option><option value='GREATER MANCHESTER'>GREATER MANCHESTER</option><option value='GWYNEDD'>GWYNEDD</option><option value='HALTON'>HALTON</option><option value='HAMPSHIRE'>HAMPSHIRE</option><option value='HARTLEPOOL'>HARTLEPOOL</option><option value='HEREFORDSHIRE'>HEREFORDSHIRE</option><option value='HERTFORDSHIRE'>HERTFORDSHIRE</option><option value='ISLE OF ANGLESEY'>ISLE OF ANGLESEY</option><option value='ISLE OF WIGHT'>ISLE OF WIGHT</option><option value='ISLES OF SCILLY'>ISLES OF SCILLY</option><option value='KENT'>KENT</option><option value='LANCASHIRE'>LANCASHIRE</option><option value='LEICESTER'>LEICESTER</option><option value='LEICESTERSHIRE'>LEICESTERSHIRE</option><option value='LINCOLNSHIRE'>LINCOLNSHIRE</option><option value='LUTON'>LUTON</option><option value='MEDWAY'>MEDWAY</option><option value='MERSEYSIDE'>MERSEYSIDE</option><option value='MERTHYR TYDFIL'>MERTHYR TYDFIL</option><option value='MIDDLESBROUGH'>MIDDLESBROUGH</option><option value='MILTON KEYNES'>MILTON KEYNES</option><option value='MONMOUTHSHIRE'>MONMOUTHSHIRE</option><option value='NEATH PORT TALBOT'>NEATH PORT TALBOT</option><option value='NEWPORT'>NEWPORT</option><option value='NORFOLK'>NORFOLK</option><option value='NORTH EAST LINCOLNSHIRE'>NORTH EAST LINCOLNSHIRE</option><option value='NORTH LINCOLNSHIRE'>NORTH LINCOLNSHIRE</option><option value='NORTH SOMERSET'>NORTH SOMERSET</option><option value='NORTH YORKSHIRE'>NORTH YORKSHIRE</option><option value='NORTHAMPTONSHIRE'>NORTHAMPTONSHIRE</option><option value='NORTHUMBERLAND'>NORTHUMBERLAND</option><option value='NOTTINGHAMSHIRE'>NOTTINGHAMSHIRE</option><option value='OXFORDSHIRE'>OXFORDSHIRE</option><option value='PEMBROKESHIRE'>PEMBROKESHIRE</option><option value='POOLE'>POOLE</option><option value='PORTSMOUTH'>PORTSMOUTH</option><option value='POWYS'>POWYS</option><option value='READING'>READING</option><option value='REDCAR AND CLEVELAND'>REDCAR AND CLEVELAND</option><option value='RHONDDA CYNON TAFF'>RHONDDA CYNON TAFF</option><option value='RUTLAND'>RUTLAND</option><option value='SHROPSHIRE'>SHROPSHIRE</option><option value='SLOUGH'>SLOUGH</option><option value='SOMERSET'>SOMERSET</option><option value='SOUTH GLOUCESTERSHIRE'>SOUTH GLOUCESTERSHIRE</option><option value='SOUTH YORKSHIRE'>SOUTH YORKSHIRE</option><option value='SOUTHAMPTON'>SOUTHAMPTON</option><option value='SOUTHEND-ON-SEA'>SOUTHEND-ON-SEA</option><option value='STAFFORDSHIRE'>STAFFORDSHIRE</option><option value='STOCKTON-ON-TEES'>STOCKTON-ON-TEES</option><option value='STOKE-ON-TRENT'>STOKE-ON-TRENT</option><option value='SUFFOLK'>SUFFOLK</option><option value='SURREY'>SURREY</option><option value='SWANSEA'>SWANSEA</option><option value='SWINDON'>SWINDON</option><option value='THE VALE OF GLAMORGAN'>THE VALE OF GLAMORGAN</option><option value='THURROCK'>THURROCK</option><option value='TORBAY'>TORBAY</option><option value='TORFAEN'>TORFAEN</option><option value='TYNE AND WEAR'>TYNE AND WEAR</option><option value='WARRINGTON'>WARRINGTON</option><option value='WARWICKSHIRE'>WARWICKSHIRE</option><option value='WEST BERKSHIRE'>WEST BERKSHIRE</option><option value='WEST MIDLANDS'>WEST MIDLANDS</option><option value='WEST SUSSEX'>WEST SUSSEX</option><option value='WEST YORKSHIRE'>WEST YORKSHIRE</option><option value='WILTSHIRE'>WILTSHIRE</option><option value='WINDSOR AND MAIDENHEAD'>WINDSOR AND MAIDENHEAD</option><option value='WOKINGHAM'>WOKINGHAM</option><option value='WORCESTERSHIRE'>WORCESTERSHIRE</option><option value='WREKIN'>WREKIN</option><option value='WREXHAM'>WREXHAM</option><option value='YORK'>YORK</option>
</select>

<br>

<select class="form-control" name="region">
<option value="">Region:</option>
<option value='EAST ANGLIA'>EAST ANGLIA</option><option value='EAST MIDLANDS'>EAST MIDLANDS</option><option value='GREATER LONDON'>GREATER LONDON</option><option value='NORTH'>NORTH</option><option value='NORTH WEST'>NORTH WEST</option><option value='SOUTH EAST'>SOUTH EAST</option><option value='SOUTH WEST'>SOUTH WEST</option><option value='WALES'>WALES</option><option value='WEST MIDLANDS'>WEST MIDLANDS</option><option value='YORKS AND HUMBER'>YORKS AND HUMBER</option>
</select>

<br>

<input type="text" name="proprietor_name_1" class="form-control" maxlength="64" placeholder="Proprietor Name">

<br>

<button type="submit" class="form-control btn btn-primary">SEARCH Land Registry</button>

<br><br><br>

<a href="import.php">Import .csv into the database</a>


</div>

</form>

</body>
</html>
