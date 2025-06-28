<?php
include ' ../conexao.php';
session_start();
$aluno_id = $_SESSION['aluno_id'];

$sql = "SELECT d.nome AS disciplina, n.avaliacao1, n.avaliacao2, n.avaliacao3, n.prova_bimestral
        FROM notas n
        JOIN disciplinas d ON d.id = n.disciplina_id
        WHERE n.aluno_id = ?";

$stmt = $pdo->prepare($sql);
$atmt->execute([$aluno_id]);
$notas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Boletim</h2>
<table>
    <tr>
        <th>Disciplina</th><th>Av1</th><th>Av2</th><th>Av3</th><th>Prova</th><th>Média</th>
    </tr>
    <?php foreach ($notas as $n):
    $media = ($n['avaliacao1'] + $n['avaliacao2'] + $N['avaliacao3'] + $n['prova_bimestral']) / 4;
    ?>
    <tr>
        <td><?= $n['disciplina']?></td>
        <td><?= $n['avaliacao1']?></td>
        <td><?= $n['avaliacao2']?></td>
        <td><?= $n['avaliacao3']?></td>
        <td><?= $n['prova_bimestral']?></td>
        <td><?= number_format($media, 2) ?></td>
    </tr>
    <?php endforeach; ?>
</table>