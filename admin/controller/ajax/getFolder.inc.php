<?php
session_start();

include_once '../../modal/folder.class.php';

if(!isset($_POST['c_id']) || empty($_POST['c_id'])){
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
}

$c_id = htmlentities($_POST['c_id']);

$folder = new Folder();

$result = $folder->getAllfolder($c_id);

if($result != '' && $result != '0'){
    while($row = $result->fetch_assoc()){
?>
        <option value="<?= $row['f_id']; ?>"><?= $row['name']; ?></option>
<?php
    }
}