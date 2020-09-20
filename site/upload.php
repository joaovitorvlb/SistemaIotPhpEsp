<html>
    <body>
        <?php
        if(isset($_POST['enviar-formulario'])):
            $formatosPermitidos = array("png", "jpeg", "jpg", "gif");
            $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
            if(array($extensao, $formatosPermitidos)):
                $pasta = "arquivos/";
                $temporario = $_FILES['arquivo']['tmp_name'];
                $novoNome = uniqid().".$extensao";
                echo $extensao;

                if(move_uploaded_file($temporario, $pasta.$novoNome)):
                    $mensagem = "Upload Feito com sicesso!";
                else:
                    $mensagem = "Erro, não  foi possivel fazer o upload";
                endif;
            else:
                $mensagem = "Formato invalido";
            endif;
            echo $mensagem;
        endif;
        ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="arquivo"><br>
            <input type="submit" name="enviar-formulario">
        </form>
    </body>
</html>