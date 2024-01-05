<?php
//1. POSTデータ取得
$title   = $_POST['title'];
$summary  = $_POST['summary'];
$ingre = $_POST['ingre'];
$steps    = $_POST['steps']; 

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_an_table(title,summary,ingre,steps)VALUES(:title,:summary,:ingre,:steps);');
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':summary', $summary, PDO::PARAM_STR);
$stmt->bindValue(':ingre', $ingre, PDO::PARAM_STR);
$stmt->bindValue(':steps', $steps, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
