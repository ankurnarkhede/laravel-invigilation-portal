<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 3/4/18
 * Time: 6:44 AM
 */




?>

<html>
<head>
    <style>
        table, th, tr, td{
            border:1px solid black;
            border-collapse: collapse;
        }




    </style>
</head>
    <body>



<table >
    <thead>
    <tr >
        <th rowspan="2">Sr.No.</th>
        <th style="width: 10%" rowspan="2">Hall No.</th>
        <th style="width: 15%" rowspan="2">DEPT</th>
        <th style="width: 25%" rowspan="2">Name of Invigilator</th>
        <th style="width: 25%" >Date: {{ $date }}</th>
        <th  colspan="2">Time: {{ $time }}</th>
    </tr>

    <tr >
        <th >Alternate</th>
        <th >Mobile</th>
        <th style="width: 15%">Sign</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $count=0;
    ?>

    @foreach($schedule as $sch)
        <tr>
            <td>{{ ++$count }}</td>
            <td></td>
            <td>{{$sch->dept}}</td>
            <td>{{$sch->fac_name}}</td>
            <td></td>
            <td>{{$sch->fac_phone}}</td>
            <td></td>
        </tr>

    @endforeach



    </tbody>
</table>



<?php
die();

?>

    </body>
</html>
