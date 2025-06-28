<?php
include ' ../conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $aluno_id = $_POST['aluno_id'];
    $disciplina_id = $_POST['disciplina_id'];
    $av1 = $_POST['avaliacao1'];
    $av2 = $_POST['avaliacao2'];
    $av3 = $_POST['avaliacao3'];
    $prova = $_POST['prova_bimestral'];

    $sql = "INSERT INTO notas ( aluno_id, disciplina_id, avaliacao1, avaliacao2, avaliacao3, prova_bimestral)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$aluno_id, $disciplina_id, $av1, $av2, $av3, $prova]);

    echo "Notas registradas com sucesso!";
}
?>