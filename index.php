<?
require_once 'app/DirectoryScanner.php';

if (isset($_GET['update'])){
    DbConnect::clear();
}

$scan = new DirectoryScanner($_SERVER['DOCUMENT_ROOT']);

//$tree = $scan->getTree($_SERVER['DOCUMENT_ROOT']);

echo '<table>
        <tbody>
            <tr>
                <th>NAME</th><th>SIZE</th><th>EXTENSION</th><th>MODIFICATION</th>
            </tr>';
foreach ($scan->tree as $row){
    echo '<tr>
            <td>'.$row['name'].'</td><td>'.$row['size'].'</td><td>'.$row['extension'].'</td><td>'.$row['modification'].'</td>
         </tr>';
}
echo '</tbody></table>';

echo '<form action="?update">';
echo '<button name="update">Обновить</button>';
echo '</form>';
