<?php namespace Api;
use Family\Family;

trait Render
{

    public function printResults($heirName, $heritageByName, Family $family)
    {
        $html = '<html>
                <head>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                </head>
                <body>
                <h1>Family before:</h1>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>is Alive</th>
                      <th>Age</th>
                      <th>Children</th>
                      <th>Parent</th>
                      <th>heritage</th>
                    </tr>
                  </thead>
                  <tbody>
                ';
        foreach ($this->familyBefore as $member) {
//                $timeNow = new DateTime();
//                var_dump($timeNow);
//                $age = DateTime::createFromFormat('j-M-Y','now')->diff($member->birthDate);
//                die;
            $html .= '<tr>
                        <td></td>
                        <td>' . $member->name() . '</td>
                        <td>' . $member->isAlive() . '</td>
                        <td></td>
                        <td>' . implode($member->children(),' | ') . '</td>
                        <td>' . $member->parent() . '</td>
                        <td> '.$member->calculateGoodMonetaryValue().'</td>
                        </tr>';
        }
        $html .='</tbody>
            </table>
        <h1>Family after:</h1>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>is Alive</th>
                      <th>Age</th>
                      <th>Children</th>
                      <th>Parent</th>
                      <th>heritage</th>
                    </tr>
                  </thead>
                  <tbody>
    ';
        foreach ($this->familyAfter as $member) {
//                $timeNow = new DateTime();
//                var_dump($timeNow);
//                $age = DateTime::createFromFormat('j-M-Y','now')->diff($member->birthDate);
//                die;
            $html .= '<tr>
                        <td></td>
                        <td>' . $member->name() . '</td>
                        <td>' . $member->isAlive() . '</td>
                        <td></td>
                        <td>' . implode($member->children(),' | ') . '</td>
                        <td>' . $member->parent() . '</td>
                        <td> '.$member->calculateGoodMonetaryValue().'</td>
                        </tr>';
        }
        $html .= '</tbody>
            </table>
            </body>
        </html>';
        echo $html;
    }

}